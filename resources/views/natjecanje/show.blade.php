@extends('layouts.app')
@php
$zadatci= $natjecanje->zadatci()->get()
@endphp


@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3>{{ $natjecanje->naslov }}</h3>
            @auth
                
          
            @if(Auth::user()->jeAdmin())
            <div>
                <a href="{{ route('natjecanje.edit', $natjecanje->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('natjecanje.destroy', $natjecanje->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                </form>
            </div>
            @endif
            @endauth
        </div>
        <div class="card-body">
            <p class="card-text">{{ $natjecanje->opis }}</p>
            <p class="card-text"><strong>Početak:</strong> {{ $natjecanje->pocetak->format('d.m.Y H:i') }}</p>
            <p class="card-text"><strong>Kraj:</strong> {{ $natjecanje->kraj->format('d.m.Y H:i') }}</p>
            @auth
                
           
            @if ($natjecanje->traje() && !Auth::user()->jePrijavljenNaNatjecanje($natjecanje->id))
            <a href="{{ route('natjecanje.prijava.store', $natjecanje->id) }}" class="btn btn-success">Prijava</a>
            @endif
            @endauth
            @auth   
            <h3 class="mt-3">Zadatci
          
            @if(Auth::user()->jeAdmin())
                <a href="{{ route('natjecanje.zadatak.create', [$natjecanje]) }}" title="Create" class="text-primary">
                    <i class="fa fa-circle-plus"></i>
                </a>
                @endif
              
            </h3>
            <div class="mt-1">

                @foreach ($zadatci as $zadatak)
                <div class="card mb-3">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">{{ $zadatak->naslov }}</h5>
                        <div>
                        @auth
                            
                           
                        @if(Auth::user()->jeAdmin())
                            <a href="{{ route('natjecanje.zadatak.edit', [$natjecanje,$zadatak]) }}" title="Edit"
                                class="text-primary">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form action="{{ route('natjecanje.zadatak.destroy', [$natjecanje,$zadatak]) }}"
                                method="POST" class="d-inline"
                                onsubmit="return confirm('Are you sure you want to delete this item?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-danger"
                                    style="background: none; border: none; padding: 0; margin: 0;">
                                    <i class="fa fa-trash" title="Delete"></i>
                                </button>
                                @endif
                                @endauth
                            </form>
                        </div>
                    </div>
                    <div class="card-body pt-1">
                        <p class="card-text">{{ $zadatak->opis }}</p>
                        <p class="card-text"><strong>Kategorija:</strong> {{ $zadatak->kategorija }}</p>
                        <p class="card-text"><strong>Težina:</strong> {{ $zadatak->tezina }}</p>
                        @if (Auth::user()->jeAdmin())
                        <p class="card-text"><strong>Zastavica:</strong> {{ $zadatak->zastavica }}</p>

                        @endif
                        <p class="card-text"><strong>Bodovi:</strong> {{ $zadatak->bodovi }}</p>

                        <form action="{{ route('natjecanje.zadatak.rijesi', [ $natjecanje, $zadatak]) }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <input type="text" id="zastavica" , class="form-control" name="zastavica"
                                    placeholder="Zastavica" required>
                            </div>

                            <button type="submit" class="btn btn-success mt-2">Predaj</button>
                        </form>
                        <div class="alert alert-success" role="alert">
                            A simple success alert—check it out!
                        </div>
                    </div>
                </div>
                @endforeach
                @endauth
            </div>


        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .card-body .card-text {
        margin-bottom: 0.1rem;
    }

    .card-header .fa {
        margin-left: 0.5rem;
        /* Or as much space as you need */
        cursor: pointer;
    }

    form.d-inline {
        display: inline-block;
    }
</style>
@endsection