<?php namespace Acme\Repositories;

use Client;
use DB;

class DbClientRepository implements ClientRepositoryInterface
{
    public function getCurrentClients()
    {
        // return Client::where('status', '=','courants')->orderBy('prenom', 'asc')->get();
        //DB::select(DB::raw("SELECT clients.*, MAX(cours.created_at), contenu, prochaine_fois FROM cours, clients WHERE clients.uid=cours.client_uid AND status='courants' GROUP BY prenom ASC"));
        return DB::select(DB::raw("
SELECT
  clients.id, nom, prenom, prochaine_fois, lecons.id as lecons
FROM
  clients
LEFT JOIN
  lecons
    ON  lecons.client_id = clients.id
    AND lecons.updated_at = (SELECT MAX(lookup.updated_at) FROM lecons AS lookup WHERE lookup.client_id = clients.id)
    WHERE clients.status='courants'
    ORDER BY prenom, lecons.id desc"));

    }

    public function find($id)
    {
        return Client::findOrFail($id);
    }

    public function getOldClients()
    {
        return Client::with(array(
            'lecons' => function ($query) {
                    $query->orderBy('date', 'asc');
                }
        ))
            ->where('status','!=','courants')
            ->orderBy('prenom', 'asc')
            ->get();
    }

    public function getAnniversaires()
    {
        return Client::where('date_naissance', '<>', '0000-00-00')->orderByRaw('MONTH(date_naissance), DAY(date_naissance)')->get();
    }

    public function archiver($id)
    {
        $client = Client::findOrFail($id);
        $client->status = "réussis";
        $client->save();
    }

    public function desarchiver($id)
    {
        $client = Client::findOrFail($id);
        $client->status = "courants";
        $client->save();
    }



}