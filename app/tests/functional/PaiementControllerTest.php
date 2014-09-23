<?php

use Acme\Repositories\DbPaiementRepository;

class PaiementsControllerTest extends TestCase {

    public function setUp()
    {
        $this->paiement = new DbPaiementRepository;
    }

    public function test_it_works()
    {
        $this->assertNotEmpty($this->paiement);
    }

    public function test_it_comptabilises_paiement()
    {
        $client_id = 1;
        $this->paiement->comptabilisePaiement($client_id, 200);

        $this->assertEquals(200, $this->paiement->getMontant());
    }

    public function test_it_gets_correct_credits()
    {
        $this->paiement->convertirMontantEnCredits(95);

        $this->assertEquals(1, $this->paiement->getCredits());
    }

    public function test_it_gets_wrong_credits()
    {
        $this->paiement->convertirMontantEnCredits(1);

        $this->assertEquals(0, $this->paiement->getCredits());
    }
}