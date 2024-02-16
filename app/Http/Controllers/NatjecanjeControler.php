<?php

namespace App\Http\Controllers;

use App\Models\Natjecanje;
use Illuminate\Http\Request;

class NatjecanjeControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $natjecanja = Natjecanje::all(); // Fetch all natjecanje records
        return view('natjecanje.index', compact('natjecanja'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        return view('natjecanje.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'naslov' => 'required|unique:natjecanje|max:255',
            'opis' => 'required|max:255',
            'pocetak' => 'required|date',
            'kraj' => 'required|date',
        ]);

        // Process the data and save to database
    $natjecanje = new Natjecanje();
    $natjecanje->naslov = $validatedData['naslov'];
    $natjecanje->opis = $validatedData['opis'];
    $natjecanje->pocetak = $validatedData['pocetak'];
    $natjecanje->kraj = $validatedData['kraj'];
    $natjecanje->save();

    return redirect()->route('natjecanje.index')->with("Kreiranje uspjelo");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function show(Natjecanje $natjecanje)
    {
        return view('natjecanje.show', compact('natjecanje'));
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
