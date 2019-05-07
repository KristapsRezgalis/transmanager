<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vieta;


class VietaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vietas = Vieta::all();

        return view('vietas.index', compact('vietas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vietas.create');
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
        'nosaukums'=> 'required',
        'valsts'=> 'required',
        'pilseta'=>'required',
        'iela'=> 'required',
        'pasta_kods'=>'required',
        'latitude'=> 'required',
        'longitude'=>'required'
      ]);
      $vieta = new Vieta([
        'nosaukums'=> $request->get('nosaukums'),
        'valsts'=> $request->get('valsts'),
        'pilseta' => $request->get('pilseta'),
        'iela'=> $request->get('iela'),
        'pasta_kods'=> $request->get('pasta_kods'),
        'latitude' => $request->get('latitude'),
        'longitude'=> $request->get('longitude')
      ]);
      $vieta->save();
      return redirect('/vietas')->with('success', 'Vieta ir pievienota!');
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
        $vieta = Vieta::find($id);

        return view('vietas.edit', compact('vieta'));
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
        'nosaukums'=> 'required',
        'valsts'=> 'required',
        'pilseta'=>'required',
        'iela'=> 'required',
        'pasta_kods'=>'required',
        'latitude'=> 'required',
        'longitude'=>'required'
      ]);

        $vieta = Vieta::find($id);
        $vieta->nosaukums= $request->get('nosaukums');
        $vieta->valsts= $request->get('valsts');
        $vieta->pilseta = $request->get('pilseta');
        $vieta->iela= $request->get('iela');
        $vieta->pasta_kods= $request->get('pasta_kods');
        $vieta->latitude = $request->get('latitude');
        $vieta->longitude= $request->get('longitude');
        $vieta->save();

      return redirect('/vietas')->with('success', 'Vieta ir izlabota');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vieta = Vieta::find($id);
        $vieta->delete();

        return redirect('/vietas')->with('success', 'Vieta ir dzēsta');
    }
}
