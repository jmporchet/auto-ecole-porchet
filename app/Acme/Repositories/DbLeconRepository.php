<?php namespace Acme\Repositories;

use Lecon;

class DbLeconRepository implements LeconRepositoryInterface
{
    public function byClient($id)
    {
        return Lecon::where('client_id','=',$id)->orderBy('date', 'desc')->get();
    }
}