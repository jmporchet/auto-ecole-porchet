<?php

class AdressesController extends \BaseController {

	/**
	 * Display a listing of adresses
	 *
	 * @return Response
	 */
	public function index()
	{
		$adresses = Adress::all();

		return View::make('adresses.index', compact('adresses'));
	}

	/**
	 * Show the form for creating a new adress
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('adresses.create');
	}

	/**
	 * Store a newly created adress in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Adress::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Adress::create($data);

		return Redirect::route('adresses.index');
	}

	/**
	 * Display the specified adress.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$adress = Adress::findOrFail($id);

		return View::make('adresses.show', compact('adress'));
	}

	/**
	 * Show the form for editing the specified adress.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$adress = Adress::find($id);

		return View::make('adresses.edit', compact('adress'));
	}

	/**
	 * Update the specified adress in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$adress = Adress::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Adress::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$adress->update($data);

		return Redirect::route('adresses.index');
	}

	/**
	 * Remove the specified adress from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Adress::destroy($id);

		return Redirect::route('adresses.index');
	}

}
