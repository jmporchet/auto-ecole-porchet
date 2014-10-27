<?php

class StatistiquesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /statistiques
	 *
	 * @return Response
	 */
	public function index()
	{
        $daysOfTheWeek = DB::select(DB::raw(
            "SELECT SUM(heures) as qte_heures FROM lecons WHERE heures > 0 AND YEAR(created_at) = 2014 GROUP BY WEEKDAY(created_at)"
        ));

        $monthsOfTheYear = DB::select(DB::raw(
            "SELECT SUM(heures) as qte_heures, MONTH(created_at) as monthName FROM lecons WHERE heures > 0 AND YEAR(created_at) = 2014 GROUP BY MONTH(created_at)"
        ));

        $hoursOfTheDay = DB::select(DB::raw(
            "SELECT
    COUNT(*) as num_records,
    created_at,
    DATE_FORMAT( created_at, '%H') as `hour`
FROM
    lecons
WHERE
  YEAR(created_at) = 2014
GROUP BY `hour`
ORDER BY num_records desc"
        ));
		return View::make('statistiques.index', compact('daysOfTheWeek', 'monthsOfTheYear', 'hoursOfTheDay'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /statistiques/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /statistiques
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /statistiques/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /statistiques/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /statistiques/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /statistiques/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}