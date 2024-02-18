<?php

namespace App\Http\Controllers;

use App\Models\Natjecanje;
use App\Models\Prijava;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class PrijavaController extends Controller
{
    public function store(Request $request, Natjecanje $natjecanje)
    {
        if ($natjecanje->traje()) {
            $prijava = new Prijava();
            $prijava->natjecanje_id = $natjecanje->id;
            $prijava->user_id = Auth::id();
            $prijava->save();

        }

        return redirect()->route('natjecanje.show', $natjecanje);


    }
}
