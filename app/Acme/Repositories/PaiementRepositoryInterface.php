<?php namespace Acme\Repositories;

use Paiement;

interface PaiementRepositoryInterface
{
    public function find($id);
    public function comptabilisePaiement($client_id, $montant);
    public function convertirMontantEnCredits($montant);
    public function getCreditsForClient($client_id);
}