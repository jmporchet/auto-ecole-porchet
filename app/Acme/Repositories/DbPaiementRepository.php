<?php namespace Acme\Repositories;

use Paiement;
use Client;
use DB;

class DbPaiementRepository implements PaiementRepositoryInterface
{
    protected $client_uid;

    public function find($id)
    {
        // TODO: Implement find() method.
        return $id;
    }

    public function comptabilisePaiement($montant)
    {
        // TODO: Implement comptabilisePaiement() method.
        return $montant;
    }

    public function getCredits($client_id)
    {
        // TODO: Implement getCredits() method.
        return $client_id;
    }


}