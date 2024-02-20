<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TopLista extends Controller
{
    public function topLista()
    {
        $korisnici = User::query()->select('users.id', 'users.name') // Make sure to select the primary key as well.
            ->join('rjesenje', 'users.id', '=', 'rjesenje.user_id')
            ->join('zadatak', 'rjesenje.zadatak_id', '=', 'zadatak.id')
            ->groupBy('users.id', 'users.name') // Group by the primary key and name to avoid grouping errors.
            ->selectRaw('SUM(zadatak.bodovi) as zadatci_sum') // Use selectRaw to sum the points.
            ->orderByDesc('zadatci_sum') // Order by the sum of points in descending order
            ->get();
        return view('top_lista', compact('korisnici'));
    }
}
