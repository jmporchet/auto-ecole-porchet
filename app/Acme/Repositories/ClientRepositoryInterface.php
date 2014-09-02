<?php namespace Acme\Repositories;

use Client;

interface ClientRepositoryInterface
{
    public function getCurrentClients();
    public function find($id);
    public function getOldClients();
    public function getAnniversaires();
    public function archiver($id);
    public function desarchiver($id);
}