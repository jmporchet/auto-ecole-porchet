<?php namespace Acme\Repositories;

interface LeconRepositoryInterface
{
    public function byClient($id);
    public function all();
}