<?php

class Client extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	//protected $fillable = [];
    protected $guarded = [];

    public function lecons()
    {
        return $this->hasMany('Lecon');
    }

    public function paiements()
    {
        return $this->hasMany('Paiement');
    }

}