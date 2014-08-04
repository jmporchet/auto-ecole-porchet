<?php

class PaiementsController extends \BaseController {

	/**
	 * Display a listing of paiements
	 *
	 * @return Response
	 */
	public function index()
	{
		$paiements = Paiement::all();

		return View::make('paiements.index', compact('paiements'));
	}

	/**
	 * Show the form for creating a new paiement
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('paiements.create');
	}

	/**
	 * Store a newly created paiement in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Paiement::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Paiement::create($data);

		return Redirect::route('paiements.index');
	}

	/**
	 * Display the specified paiement.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$paiement = Paiement::findOrFail($id);

		return View::make('paiements.show', compact('paiement'));
	}

	/**
	 * Show the form for editing the specified paiement.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$paiement = Paiement::find($id);

		return View::make('paiements.edit', compact('paiement'));
	}

	/**
	 * Update the specified paiement in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$paiement = Paiement::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Paiement::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$paiement->update($data);

		return Redirect::route('paiements.index');
	}

	/**
	 * Remove the specified paiement from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Paiement::destroy($id);

		return Redirect::route('paiements.index');
	}

}
