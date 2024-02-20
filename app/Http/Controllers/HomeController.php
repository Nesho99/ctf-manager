<?php

namespace App\Http\Controllers;

use App\Models\Natjecanje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = auth()->id();

$zaPrijavu = DB::select('
    SELECT * FROM natjecanje
    WHERE 
        pocetak <= CURRENT_TIMESTAMP AND 
        kraj >= CURRENT_TIMESTAMP AND 
        NOT EXISTS (
            SELECT 1 FROM prijava 
            WHERE 
                prijava.natjecanje_id = natjecanje.id AND 
                prijava.user_id = ?
        )
', [$user_id]);

$traje = DB::select('
    SELECT * FROM natjecanje
    WHERE 
        pocetak <= CURRENT_TIMESTAMP AND 
        kraj >= CURRENT_TIMESTAMP AND 
        EXISTS (
            SELECT 1 FROM prijava 
            WHERE 
                prijava.natjecanje_id = natjecanje.id AND 
                prijava.user_id = ?
        )
', [$user_id]);

return view('home', compact('zaPrijavu', 'traje'));
    }
}

