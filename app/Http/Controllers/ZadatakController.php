<?php

namespace App\Http\Controllers;

use App\Models\Natjecanje;
use App\Models\Zadatak;
use Illuminate\Http\Request;

class ZadatakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort(404,"Not found");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create(Natjecanje $natjecanje)
    {
        return view('zadatak.create',compact('natjecanje'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Natjecanje $natjecanje)
    {
        $validatedData = $request->validate([
                'naslov' => 'required|max:255',
                'opis' => 'required',
                'kategorija' => 'required|max:255',
                'tezina' => 'required|in:lako,srednje,tesko',
                'zastavica' => 'required|max:255',
                'bodovi' => 'required|integer|min:0',
                'natjecanje_id' => 'required|exists:natjecanje,id'
           
        ]);
        #dd($validatedData);
        $zadatak= new Zadatak();
        $zadatak->naslov=$validatedData["naslov"];
        $zadatak->opis=$validatedData["opis"];
        $zadatak->kategorija=$validatedData["kategorija"];
        $zadatak->tezina=$validatedData["tezina"];
        $zadatak->zastavica=$validatedData["zastavica"];
        $zadatak->bodovi=$validatedData["bodovi"];
        $zadatak->natjecanje_id=$natjecanje->id;
        $zadatak->save();
        return redirect()->route('natjecanje.show',$natjecanje);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
