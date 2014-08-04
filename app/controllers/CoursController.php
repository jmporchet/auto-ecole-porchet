<?php

class CoursController extends \BaseController {

	/**
	 * Display a listing of cours
	 *
	 * @return Response
	 */
	public function index()
	{
		$cours = Cour::all();

		return View::make('cours.index', compact('cours'));
	}

	/**
	 * Show the form for creating a new cour
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('cours.create');
	}

	/**
	 * Store a newly created cour in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Cour::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Cour::create($data);

		return Redirect::route('cours.index');
	}

	/**
	 * Display the specified cour.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$cour = Cour::findOrFail($id);

		return View::make('cours.show', compact('cour'));
	}

	/**
	 * Show the form for editing the specified cour.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$cour = Cour::find($id);

		return View::make('cours.edit', compact('cour'));
	}

	/**
	 * Update the specified cour in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$cour = Cour::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Cour::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$cour->update($data);

		return Redirect::route('cours.index');
	}

	/**
	 * Remove the specified cour from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Cour::destroy($id);

		return Redirect::route('cours.index');
	}

}
