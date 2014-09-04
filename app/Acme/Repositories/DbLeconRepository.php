<?php namespace Acme\Repositories;

use Lecon;
use Client;
use DB;

class DbLeconRepository implements LeconRepositoryInterface
{
    protected $client_uid;
    public function byClient($id)
    {
        $client_uid = Client::findOrFail($id)->uid;

        return Lecon::where('client_uid','=',$client_uid)->orderBy('date', 'desc')->get();
    }
}