<?php

class ExamPath extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	//protected $fillable = [];

    protected $guarded = [];

    protected $table = "ExamPaths";

}