<?php namespace Acme\Repositories;

use Client;
use DB;

class DbClientRepository implements ClientRepositoryInterface
{
    public function getCurrentClients()
    {
        // return Client::where('status', '=','courants')->orderBy('prenom', 'asc')->get();

        return DB::select(DB::raw("SELECT clients.*, cours.* from clients LEFT JOIN (select max(created_at), contenu, client_uid FROM cours GROUP BY client_uid) as cours ON clients.uid = cours.client_uid WHERE status='courants' ORDER BY prenom asc"));

        /* Client::with(array(
            'lecons' => function ($query) {
                    $query->where('client_uid', '=', 'client.uid');
                    $query->orderBy('date', 'asc');
                }
        ))
            ->where('status','=','courants')
            ->orderBy('prenom', 'asc')
            ->get();*/
        dd(DB::getQueryLog());
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