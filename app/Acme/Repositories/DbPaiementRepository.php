<?php namespace Acme\Repositories;

use Paiement;
use Client;
use DB;

class DbPaiementRepository implements PaiementRepositoryInterface
{
    protected $client_uid;
    protected $montant;
    protected $credits;

    /**
     * @return mixed
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * @return mixed
     */
    public function getCredits()
    {
        return $this->credits;
    }

    public function byClient($id)
    {
        $client_id = Client::findOrFail($id)->id;

        return Paiement::where('client_id','=',$client_id)->orderBy('date', 'desc')->get();
    }

    public function find($id)
    {
        // TODO: Implement find() method.
        return $id;
    }

    public function comptabilisePaiement($client_id, $montant)
    {
        $this->montant = $montant;
    }

    public function convertirMontantEnCredits($montant)
    {
        $credits = '0';
        switch ($montant)
        {
            case '95':
                $credits = 1;
                break;
            case '190':
                $credits = 2;
                break;
            case '460':
                $credits = 5;
                break;
            case '900':
                $credits = 10;
                break;
            default:
                $credits = 0;
                break;
        }
        return $credits;
    }

    public function getCreditsForClient($client_id)
    {
        return $client_id;
    }

}