<?php

// 0039 33 85 91 52 37 fiorenza

use Acme\Repositories\ClientRepositoryInterface;
use Acme\Repositories\LeconRepositoryInterface;

class ClientsController extends \BaseController {

    protected $client;

    public function __construct(ClientRepositoryInterface $client, LeconRepositoryInterface $lecon)
    {
        $this->client = $client;
        $this->lecon = $lecon;
    }

	/**
	 * Display a listing of clients
	 *
	 * @return Response
	 */
	public function index()
	{
		$clients = $this->client->getCurrentClients();
        $lecons = $this->lecon->all();

		return View::make('clients.index', compact('clients', 'econs'));
	}

	/**
	 * Show the form for creating a new client
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('clients.create');
	}

	/**
	 * Store a newly created client in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Client::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Client::create($data);

		return Redirect::route('clients.index');
	}

	/**
	 * Display the specified client.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        /* Select c.contenu, c.heures from cours as c, eleves_cours as ec, table_eleves as e where e.prenom LIKE "%galyna%" and e.client_uid= ec.client_uid and c.cours_uid = ec.cours_uid; */
		$client = $this->client->find($id);
        $lecons = $this->lecon->byClient($client->id);
        $exampaths = ExamPath::all();

		return View::make('clients.show', compact('client', 'lecons', 'exampaths'));
	}

	/**
	 * Show the form for editing the specified client.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$client = $this->client->find($id);

		return View::make('clients.edit', compact('client'));
	}

	/**
	 * Update the specified client in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$client = $this->client->find($id);

		$validator = Validator::make($data = Input::all(), Client::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

        if (Input::hasFile('permis')) {
            try {
                $destination_path = public_path() . '/uploads/';
                $destination_filename = $client->id.'_'.$client->prenom . '_'.date('Ymd_His').'.'.Input::file('permis')->getClientOriginalExtension();
                $file = Input::file('permis')->move($destination_path, $destination_filename);
                Notification::success('fichier téléchargé avec succès');
            } catch(Exception $e) {
                // Handle your error here.
                // You might want to log $e->getMessage() as that will tell you why the file failed to move.
                Notification::error($e->getMessage());
            }
            $data['permis'] = $destination_filename;
        }
		$client->update($data);

		return Redirect::route('clients.show', $id);
	}

	/**
	 * Remove the specified client from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Client::destroy($id);

		return Redirect::route('clients.index');
	}

    public function old()
    {
        $clients = $this->client->getOldClients();

        return View::make('clients.old_clients', compact('clients'));
    }

    public function lastSeen()
    {
        $clients = $this->client->getByLastSeen();

        return View::make('clients.last_seen', compact('clients'));
    }

    public function anniversaires()
    {
        $anniversaires = $this->client->getAnniversaires();
        return View::make('clients.anniversaires', compact('anniversaires'));
    }

    public function archiver($id)
    {
        $this->client->archiver($id);

        return Redirect::route('clients.index');
    }

    public function desarchiver($id)
    {
        $this->client->desarchiver($id);

        return Redirect::route('clients.index');
    }

}