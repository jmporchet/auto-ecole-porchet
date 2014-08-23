<?php
Route::resource('clients', 'ClientsController');
Route::resource('adresses', 'AdressesController');
Route::get('lecons/create/{user_id}', 'LeconsController@create');
Route::resource('lecons', 'LeconsController');
Route::resource('paiements', 'PaiementsController');
Route::resource('exampaths', 'ExamPathsController');
Route::post('exampathsender/send', array('as' => 'sendexam', 'uses' => 'ExamPathSender@send'));