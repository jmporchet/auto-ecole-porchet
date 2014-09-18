<?php

class LeconsController extends \BaseController {

	/**
	 * Display a listing of lecon
	 *
	 * @return Response
	 */
	public function index()
	{
		$lecons = Lecon::all();
		return View::make('lecons.index', compact('lecons'));
	}

	/**
	 * Show the form for creating a new lecon
	 *
	 * @return Response
	 */
	public function create($client_id)
	{
        $client = Client::find($client_id);
		return View::make('lecons.create', compact('client'));
	}

	/**
	 * Store a newly created lecon in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), lecon::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		if ( Lecon::create($data) )
            Notification::success('Leçon ajoutée');

		return Redirect::route('clients.show', $data["client_id"]);
	}

	/**
	 * Display the specified lecon.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$lecon = Lecon::findOrFail($id);

		return View::make('lecons.show', compact('lecon'));
	}

	/**
	 * Show the form for editing the specified lecon.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$lecon = Lecon::find($id);

        $client = Client::where('id', '=', $lecon->client_id)->first();

		return View::make('lecons.edit', compact('lecon', 'client'));
	}

	/**
	 * Update the specified lecon in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$lecon = Lecon::findOrFail($id);

		$validator = Validator::make($data = Input::all(), lecon::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		if ( $lecon->update($data) )
            Notification::success('Leçon mise à jour');

		return Redirect::route('clients.show', $lecon->client_id);
	}

	/**
	 * Remove the specified lecon from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $lecon = Lecon::findOrFail($id);
		if ( Lecon::destroy($id) )
            Notification::success('Leçon effacée');

		return Redirect::route('clients.show', $lecon->client_id);
	}

}
