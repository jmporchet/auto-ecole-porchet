<?php
Route::get('clients/old', ['as'=> 'clients.old', 'uses' => 'ClientsController@old']);
Route::get('clients/anniversaires', ['as'=> 'clients.anniversaires', 'uses' => 'ClientsController@anniversaires']);
Route::get('clients/archiver/{user_id}', ['as'=> 'clients.archiver', 'uses' => 'ClientsController@archiver']);
Route::resource('clients', 'ClientsController');
Route::resource('adresses', 'AdressesController');
Route::get('lecons/create/{user_id}', 'LeconsController@create');
Route::resource('lecons', 'LeconsController');
Route::resource('paiements', 'PaiementsController');
Route::resource('exampaths', 'ExamPathsController');
Route::post('exampathsender/send', array('as' => 'sendexam', 'uses' => 'ExamPathSender@send'));