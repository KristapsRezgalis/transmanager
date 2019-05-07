<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kompanija;

class KompanijaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kompanijas = Kompanija::all();

        return view('kompanijas.index', compact('kompanijas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kompanijas.create');
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
        'reg_numurs'=> 'required',
        'pvn_numurs'=>'required'
      ]);
      $kompanija = new Kompanija([
        'nosaukums'=> $request->get('nosaukums'),
        'valsts'=> $request->get('valsts'),
        'pilseta' => $request->get('pilseta'),
        'iela'=> $request->get('iela'),
        'pasta_kods'=> $request->get('pasta_kods'),
        'reg_numurs' => $request->get('reg_numurs'),
        'pvn_numurs'=> $request->get('pvn_numurs')
      ]);
      $kompanija->save();
      return redirect('/kompanijas')->with('success', 'Kompānija ir pievienota!');
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
        $kompanija = Kompanija::find($id);

        return view('kompanijas.edit', compact('kompanija'));
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
        'reg_numurs'=> 'required',
        'pvn_numurs'=>'required'
      ]);

        $kompanija = Kompanija::find($id);
        $kompanija->nosaukums= $request->get('nosaukums');
        $kompanija->valsts= $request->get('valsts');
        $kompanija->pilseta = $request->get('pilseta');
        $kompanija->iela= $request->get('iela');
        $kompanija->pasta_kods= $request->get('pasta_kods');
        $kompanija->reg_numurs = $request->get('reg_numurs');
        $kompanija->pvn_numurs= $request->get('pvn_numurs');
        $kompanija->save();

      return redirect('/kompanijas')->with('success', 'Kompānija ir izlabota');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kompanija = Kompanija::find($id);
        $kompanija->delete();

        return redirect('/kompanijas')->with('success', 'Kompānija ir dzēsta');
    }
}
