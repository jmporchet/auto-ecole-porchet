<?php namespace Acme\Repositories;

use Paiement;

interface PaiementRepositoryInterface
{
    public function find($id);
    public function comptabilisePaiement($montant);
    public function getCredits($client_id);
}