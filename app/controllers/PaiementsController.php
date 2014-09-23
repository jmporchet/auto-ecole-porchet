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
    public function create($client_id)
    {
        $client = Client::find($client_id);

        return View::make('paiements.create', compact('client'));
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

        if (Paiement::create($data)) Notification::success('paiement ajouté');

        return Redirect::route('clients.show', $data["client_id"]);
    }

    /**
     * Display the specified paiement.
     *
     * @param  int $id
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
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $paiement = Paiement::find($id);

        $client = Client::where('id', '=', $paiement->client_id)->first();

        return View::make('paiements.edit', compact('paiement', 'client'));
    }

    /**
     * Update the specified paiement in storage.
     *
     * @param  int $id
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

        if ($paiement->update($data)) Notification::success('paiement mis à jour');

        return Redirect::route('clients.show', $paiement->client_id);
    }

    /**
     * Remove the specified paiement from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $paiement = Paiement::findOrFail($id);
        if (Paiement::destroy($id)) Notification::success('paiement effacé');

        return Redirect::route('clients.show', $paiement->client_id);
    }

}
