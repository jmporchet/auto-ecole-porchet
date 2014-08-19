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

		lecon::create($data);

		return Redirect::route('lecons.index');
	}

	/**
	 * Display the specified lecon.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$lecon = lecon::findOrFail($id);

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
		$lecon = lecon::find($id);

		return View::make('lecons.edit', compact('lecon'));
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

		$lecon->update($data);

		return Redirect::route('lecons.index');
	}

	/**
	 * Remove the specified lecon from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		lecon::destroy($id);

		return Redirect::route('lecons.index');
	}

}
