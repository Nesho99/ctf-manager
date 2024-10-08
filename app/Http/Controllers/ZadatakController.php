<?php

namespace App\Http\Controllers;

use App\Models\Dokument;
use App\Models\Natjecanje;
use App\Models\Rijesenje;
use App\Models\Zadatak;
use Exception;
use Illuminate\Http\Request;
use Auth;

class ZadatakController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'je_admin'])->except('index', 'show', 'rijesi');
        $this->middleware(['auth'])->only('rijesi');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort(404, "Not found");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create(Natjecanje $natjecanje)
    {
        return view('zadatak.create', compact('natjecanje'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Natjecanje $natjecanje)
    {
        $validatedData = $request->validate([
            'naslov' => 'required|max:255',
            'opis' => 'required',
            'kategorija' => 'required|max:255',
            'tezina' => 'required|in:lako,srednje,tesko',
            'zastavica' => 'required|max:255',
            'bodovi' => 'required|integer|min:0',
            'pomoc' => 'required|max:255',
            'natjecanje_id' => 'required|exists:natjecanje,id'

        ]);
        #dd($validatedData);
        $zadatak = new Zadatak();
        $zadatak->naslov = $validatedData["naslov"];
        $zadatak->opis = $validatedData["opis"];
        $zadatak->kategorija = $validatedData["kategorija"];
        $zadatak->tezina = $validatedData["tezina"];
        $zadatak->zastavica = $validatedData["zastavica"];
        $zadatak->bodovi = $validatedData["bodovi"];
        $zadatak->pomoc = $validatedData["pomoc"];
        $zadatak->natjecanje_id = $natjecanje->id;
        $zadatak->save();
        toastr()->success("Zadatak kreiran");
        return redirect()->route('natjecanje.show', $natjecanje);
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
        return view('zadatak.edit', compact(['natjecanje', 'zadatak']));

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
            'pomoc' => 'required|max:255',
            'natjecanje_id' => 'required|exists:natjecanje,id'

        ]);
        $zadatak->naslov = $validatedData["naslov"];
        $zadatak->opis = $validatedData["opis"];
        $zadatak->kategorija = $validatedData["kategorija"];
        $zadatak->tezina = $validatedData["tezina"];
        $zadatak->zastavica = $validatedData["zastavica"];
        $zadatak->bodovi = $validatedData["bodovi"];
        $zadatak->pomoc = $validatedData["pomoc"];
        $zadatak->natjecanje_id = $natjecanje->id;
        $zadatak->save();
        toastr()->success("Zadatak ažuriran");
        return redirect()->route('natjecanje.show', $natjecanje);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Natjecanje $natjecanje, Zadatak $zadatak)
    {
        try{
        $zadatak->delete();
        toastr()->success("Zadatak uspješno obrisan");
        return redirect()->route('natjecanje.show', $natjecanje);
        }catch(Exception $exception){
            toastr()->warning("Nije moguće obrisati zadatak");
        return redirect()->route('natjecanje.show', $natjecanje);

        }
    }

    public function rijesi(Request $request, Natjecanje $natjecanje, Zadatak $zadatak)
    {
        // Validate the request
        $validatedData = $request->validate([
            'zastavica' => 'required|max:255', 
        ]);

        $zastavica = $validatedData['zastavica'];

        if ($zadatak->zastavica == $zastavica) {

            $rijesenje = new Rijesenje();

            $rijesenje->zadatak_id = $zadatak->id;
            $rijesenje->user_id = Auth::id();
            $rijesenje->save();
            toastr()->success("Zadatk riješen");
        } else {
            toastr()->error("Pogrešna zastavica");

        }






        return redirect()->back();
    }

    public function upload(Request $request, Natjecanje $natjecanje, Zadatak $zadatak)
    { {

            if ($request->hasFile('datoteka')) {
                $validatedData = $request->validate([
                    'datoteka' => 'required|file|mimes:pdf', 
                ]);
        
                $datoteka = $request->file('datoteka');
                $putanja = time() . '_' . $datoteka->getClientOriginalName();
                $datoteka->move(public_path('datoteke'), $putanja);
                $dokument= new Dokument();
                $dokument->ime= $datoteka->getClientOriginalName();
                $dokument->putanja=$putanja;
                $dokument->user_id= Auth::user()->id;
                $dokument->zadatak_id= $zadatak->id;
                $dokument->save();

                toastr()->success("Prenošenje datoteke uspješno");

                return back();
            }
            toastr()->warning("Molimo izaberite datoteku");

            return back();
        }
    }
}


