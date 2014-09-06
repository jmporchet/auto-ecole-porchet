<?php namespace Acme\Repositories;

use Lecon;
use Client;
use DB;

class DbLeconRepository implements LeconRepositoryInterface
{
    protected $client_uid;

    public function byClient($id)
    {
        $client_id = Client::findOrFail($id)->id;

        return Lecon::where('client_id','=',$client_id)->orderBy('date', 'desc')->get();
    }

    public function all()
    {
        return Lecon::all();
    }
}