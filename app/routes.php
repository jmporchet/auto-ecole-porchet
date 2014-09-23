<?php

//App::bind('Acme\Repositories\ClientRepositoryInterface', 'Acme\Repositories\DbClientRepository');
Route::get('/', 'ClientsController@index');

Route::get('clients/old', ['as'=> 'clients.old', 'uses' => 'ClientsController@old']);
Route::get('clients/last_seen', ['as'=> 'clients.last_seen', 'uses' => 'ClientsController@lastSeen']);
Route::get('clients/anniversaires', ['as'=> 'clients.anniversaires', 'uses' => 'ClientsController@anniversaires']);
Route::get('clients/archiver/{user_id}', ['as'=> 'clients.archiver', 'uses' => 'ClientsController@archiver']);
Route::get('clients/desarchiver/{user_id}', ['as'=> 'clients.desarchiver', 'uses' => 'ClientsController@desarchiver']);
Route::get('clients/{user_id}/lecons', ['as'=> 'clients.lecons', 'uses' => 'ClientsController@lecons']);
Route::get('clients/{user_id}/paiements', ['as'=> 'clients.paiements', 'uses' => 'ClientsController@paiements']);
Route::resource('clients', 'ClientsController');

Route::resource('adresses', 'AdressesController');

Route::get('lecons/create/{user_id}', 'LeconsController@create');
Route::resource('lecons', 'LeconsController');

Route::get('paiements/create/{user_id}', 'PaiementsController@create');
Route::resource('paiements', 'PaiementsController');

Route::resource('exampaths', 'ExamPathsController');

Route::post('exampathsender/send', array('as' => 'sendexam', 'uses' => 'ExamPathSender@send'));

Route::resource('pages', 'PagesController');

