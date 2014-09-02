<?php namespace Acme\Repositories;

use Client;

class DbClientRepository implements ClientRepositoryInterface
{
    public function getCurrentClients()
    {
        return Client::with(array(
            'lecons' => function ($query) {
                    $query->orderBy('date', 'asc');
                }
        ))
            ->where('status','=','courants')
            ->orderBy('prenom', 'asc')
            ->get();
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