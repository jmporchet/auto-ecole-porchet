<?php

class ExamPathSender extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /exampathsender
	 *
	 * @return Response
	 */
	public function send()
	{
        $data = Input::all();

        $client = Client::find($data['client_id']);

        $exampaths = array();
        foreach ($data['exampath_id'] as $exam_id)
        {
            $exampaths[] = ExamPath::find($exam_id);
        }
        $data = array('exampaths' => $exampaths, 'prenom' => $client->prenom);
		Mail::send('emails.exampath', $data, function($message) use($client)
        {
            $message->to($client->email, $client->prenom.' '.$client->nom)->subject('Parcours d\'examen du '.date('d.m', time()));

        });

        return Redirect::route('clients.show', $client->id);
	}

    private function prepareEmail()
    {
        $data = Input::all();

    }

}