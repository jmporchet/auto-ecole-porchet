<?php

class ExamPathsController extends \BaseController {

	/**
	 * Display a listing of exampaths
	 *
	 * @return Response
	 */
	public function index()
	{
		$exampaths = ExamPath::all();

		return View::make('exampaths.index', compact('exampaths'));
	}

	/**
	 * Show the form for creating a new exampath
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('exampaths.create');
	}

	/**
	 * Store a newly created exampath in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), ExamPath::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		ExamPath::create($data);

		return Redirect::route('exampaths.index');
	}

	/**
	 * Display the specified exampath.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$exampath = ExamPath::findOrFail($id);

		return View::make('exampaths.show', compact('exampath'));
	}

	/**
	 * Show the form for editing the specified exampath.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$exampath = ExamPath::find($id);

		return View::make('exampaths.edit', compact('exampath'));
	}

	/**
	 * Update the specified exampath in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$exampath = ExamPath::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Exampath::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$exampath->update($data);

		return Redirect::route('exampaths.index');
	}

	/**
	 * Remove the specified exampath from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		ExamPath::destroy($id);

		return Redirect::route('exampaths.index');
	}

}
