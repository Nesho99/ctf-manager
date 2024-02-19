
@extends('layouts.app')

@section('content')
<div class="container mt-4">
    @auth
        @if (Auth::user()->jeAdmin())
            
      
    <div class="row">
        <div class="col-12 mb-3">
            <a href="{{ route('natjecanje.create') }}" class="btn btn-primary"> Kreiraj natjecanje</a>
        </div>
    </div>
    @endif
    @endauth
    <div class="row">
        
        @foreach ($natjecanja as $natjecanje)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                <a href="{{ route('natjecanje.show', $natjecanje->id) }}" class="card-custom-link">
                    <div class="card-body">
                        <h5 class="card-title">{{ $natjecanje->naslov }}</h5>
                        <p class="card-text">{{ Illuminate\Support\Str::limit($natjecanje->opis, 255) }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">Početak: {{ $natjecanje->pocetak->format('d.m.Y H:i') }}</small>
                            <small class="text-muted">Kraj: {{ $natjecanje->kraj->format('d.m.Y H:i') }}</small>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

@section('styles')
<style>
    .card-custom-link {
        color: inherit; 
        text-decoration: none; 
    }
    .card-custom-link:hover {
        color: inherit; 
        text-decoration: none; 
    }
</style>
@endsection

