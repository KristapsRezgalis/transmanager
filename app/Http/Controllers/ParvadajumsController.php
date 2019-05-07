<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Parvadajums;
use App\Kompanija;
use App\Vieta;

use Carbon\Carbon;
use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;
use Google_Service_Calendar_EventDateTime;


class ParvadajumsController extends Controller
{

    protected $client;

    //
    public function __construct()
    {
        $client = new Google_Client();
        $client->setAuthConfig('client_secret.json');
        $client->addScope(Google_Service_Calendar::CALENDAR);

        $guzzleClient = new \GuzzleHttp\Client(array('curl' => array(CURLOPT_SSL_VERIFYPEER => false)));
        $client->setHttpClient($guzzleClient);
        $this->client = $client;
    }

    public function oauth()
    {
        session_start();

        $rurl = action('ParvadajumsController@oauth');
        $this->client->setRedirectUri($rurl);
        if (!isset($_GET['code'])) {
            $auth_url = $this->client->createAuthUrl();
            $filtered_url = filter_var($auth_url, FILTER_SANITIZE_URL);
            return redirect($filtered_url);
        } else {
            $this->client->authenticate($_GET['code']);
            $_SESSION['access_token'] = $this->client->getAccessToken();
            return view('parvadajumi.index');
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session_start();
        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $this->client->setAccessToken($_SESSION['access_token']);
            $service = new Google_Service_Calendar($this->client);
            $calendarId = 'primary';
            
            //$results = $service->events->listEvents($calendarId);
            //return $results->getItems();

        } else {
            return redirect()->route('parvadajumi.index');
        }

        $parvadajumi = Parvadajums::all();
        return view('parvadajumi.index', compact('parvadajumi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kompanijas = Kompanija::all();
        $vietas = Vieta::all();
        return view('parvadajumi.create')->withKompanijas($kompanijas)->withVietas($vietas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        'iekrausanas_datums'    => 'required',
        'izkrausanas_datums'    => 'required',
        'iekrausanas_laiks'  =>'required',
        'izkrausanas_laiks'  => 'required',
        'iekrausanas_vieta_id'  =>'required|integer',
        'izkrausanas_vieta_id'  => 'required|integer',
        'klients_id'            =>'required|integer',
        'parvadatajs_id'        => 'required|integer',
        'ienemumi'              =>'required',
        'izmaksas'              =>'required',
        'pelna'                 =>'required',
        'transporta_numuri'     =>'required',
        'kravas_apraksts'       =>'required'
      ]);
      $parvadajums = new Parvadajums([
        'iekrausanas_datums'    => $request->get('iekrausanas_datums'),
        'izkrausanas_datums'    => $request->get('izkrausanas_datums'),
        'iekrausanas_laiks'  => $request->get('iekrausanas_laiks'),
        'izkrausanas_laiks'  => $request->get('izkrausanas_laiks'),
        'iekrausanas_vieta_id'  => $request->get('iekrausanas_vieta_id'),
        'izkrausanas_vieta_id'  => $request->get('izkrausanas_vieta_id'),
        'klients_id'            => $request->get('klients_id'),
        'parvadatajs_id'        => $request->get('parvadatajs_id'),
        'ienemumi'              => $request->get('ienemumi'),
        'izmaksas'              => $request->get('izmaksas'),
        'pelna'                 => $request->get('pelna'),
        'transporta_numuri'     => $request->get('transporta_numuri'),
        'kravas_apraksts'       => $request->get('kravas_apraksts')
      ]);

      $parvadajums->save();

      session_start();
        $startDateTime = $request->iekrausanas_datums."T".$parvadajums->iekrausanas_laiks.":00+03:00";  /// 2019-05-06T09:00:00+03:00
        $endDateTime = $request->izkrausanas_datums."T".$parvadajums->izkrausanas_laiks.":00+03:00";

        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $this->client->setAccessToken($_SESSION['access_token']);
            $service = new Google_Service_Calendar($this->client);

            $calendarId = 'primary';
            $event = new Google_Service_Calendar_Event([
                'summary' =>$parvadajums->vieta->nosaukums." - ".$parvadajums->vieta2->nosaukums,
                'description' => "Klients: ".$parvadajums->kompanija->nosaukums.", Pārvadātājs: ".$parvadajums->kompanija2->nosaukums,
                'start' => ['dateTime' => $startDateTime],
                'end' => ['dateTime' => $endDateTime],
                'reminders' => ['useDefault' => true],
            ]);
            $results = $service->events->insert($calendarId, $event);

            return redirect('/parvadajumi')->with('success', 'Pārvadājums ir pievienots!');
        } else {
            return redirect()->route('/oauth');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parvadajums = Parvadajums::find($id);
        $kompanijas = Kompanija::all();
        $vietas = Vieta::all();
        return view('parvadajumi.edit', compact('parvadajums'))->withKompanijas($kompanijas)->withVietas($vietas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
        'iekrausanas_datums'=> 'required',
        'izkrausanas_datums'=> 'required',
        'iekrausanas_laiks'=>'required',
        'izkrausanas_laiks'=> 'required',
        'iekrausanas_vieta_id'=>'required',
        'izkrausanas_vieta_id'=> 'required',
        'klients_id'=>'required',
        'parvadatajs_id'=> 'required',
        'ienemumi'=>'required',
        'izmaksas'=>'required',
        'pelna'=>'required',
        'transporta_numuri'=>'required',
        'kravas_apraksts'=>'required'
      ]);

        $parvadajums = Parvadajums::find($id);
        $parvadajums->iekrausanas_datums= $request->get('iekrausanas_datums');
        $parvadajums->izkrausanas_datums= $request->get('izkrausanas_datums');
        $parvadajums->iekrausanas_laiks = $request->get('iekrausanas_laiks');
        $parvadajums->izkrausanas_laiks= $request->get('izkrausanas_laiks');
        $parvadajums->iekrausanas_vieta_id = $request->get('iekrausanas_vieta_id');
        $parvadajums->izkrausanas_vieta_id= $request->get('izkrausanas_vieta_id');
        $parvadajums->klients_id= $request->get('klients_id');
        $parvadajums->parvadatajs_id = $request->get('parvadatajs_id');
        $parvadajums->ienemumi= $request->get('ienemumi');
        $parvadajums->izmaksas= $request->get('izmaksas');
        $parvadajums->pelna= $request->get('pelna');
        $parvadajums->transporta_numuri= $request->get('transporta_numuri');
        $parvadajums->kravas_apraksts= $request->get('kravas_apraksts');
        $parvadajums->save();

      return redirect('/parvadajumi')->with('success', 'Pārvadājums ir izlabots');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $parvadajums = Parvadajums::find($id);
        $parvadajums->delete();

        session_start();
        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $this->client->setAccessToken($_SESSION['access_token']);
            $service = new Google_Service_Calendar($this->client);

         //   $service->events->delete('calendarId', $id);

        } else {
            return redirect()->route('oauthCallback');
        }
        return redirect('/parvadajumi')->with('success', 'Pārvadāums ir dzēst');
    }
}
