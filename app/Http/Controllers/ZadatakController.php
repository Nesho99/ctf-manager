<?php

namespace App\Http\Controllers;

use App\Models\Natjecanje;
use App\Models\Rijesenje;
use App\Models\Zadatak;
use Illuminate\Http\Request;
use Auth;

class ZadatakController extends Controller
{
    public function __construct(){
        $this->middleware(['auth','je_admin'])->except('index','show','rijesi');
        $this->middleware(['auth'])->only('rijesi');
    }
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
        toastr()->success("Zadatak kreiran");
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
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit(Natjecanje $natjecanje, Zadatak $zadatak)
    {
        return view('zadatak.edit',compact(['natjecanje','zadatak']));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Natjecanje $natjecanje, Zadatak $zadatak)
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
        $zadatak->naslov=$validatedData["naslov"];
        $zadatak->opis=$validatedData["opis"];
        $zadatak->kategorija=$validatedData["kategorija"];
        $zadatak->tezina=$validatedData["tezina"];
        $zadatak->zastavica=$validatedData["zastavica"];
        $zadatak->bodovi=$validatedData["bodovi"];
        $zadatak->natjecanje_id=$natjecanje->id;
        $zadatak->save();
        toastr()->success("Zadatak ažuriran");
        return redirect()->route('natjecanje.show',$natjecanje);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Natjecanje $natjecanje,Zadatak $zadatak)
    {
        $zadatak->delete();

        return redirect()->route('natjecanje.show',$natjecanje);
    }

    public function rijesi(Request $request, Natjecanje $natjecanje, Zadatak $zadatak)
    {
        // Validate the request
        $validatedData = $request->validate([
            'zastavica' => 'required|max:255', // Add other validation rules as needed
        ]);

        $zastavica = $validatedData['zastavica'];

        if($zadatak->zastavica== $zastavica){

            $rijesenje= new Rijesenje();
            
            $rijesenje->zadatak_id=$zadatak->id;
            $rijesenje->user_id=Auth::id();
            $rijesenje->save();
            toastr()->success("Zadatk riješen");
        }
        toastr()->error("Pogrešna zastavica");




      
        return redirect()->back();
    }
}


