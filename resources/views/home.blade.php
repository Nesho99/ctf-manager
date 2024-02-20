@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
      
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3> Tvoja natjecanja </h3>
                    <div class="row">
                        @foreach ($traje as $natjecanje)
                            <div class="col-md-4">
                                <div class="card mb-4 shadow-sm">
                                    <a href="{{ route('natjecanje.show', $natjecanje->id) }}" class="card-custom-link">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $natjecanje->naslov }}</h5>
                                            <p class="card-text">{{ Illuminate\Support\Str::limit($natjecanje->opis, 255) }}</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <small class="text-muted">Početak: {{ \Carbon\Carbon::parse($natjecanje->pocetak)->format('d.m.Y H:i') }}</small>
                                                <small class="text-muted">Kraj: {{ \Carbon\Carbon::parse($natjecanje->kraj)->format('d.m.Y H:i') }}</small>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div> 

                    <h3> Prijavi se </h3> 
                    <div class="row">
                        @foreach ($zaPrijavu as $natjecanje)
                            <div class="col-md-4">
                                <div class="card mb-4 shadow-sm">
                                    <a href="{{ route('natjecanje.show', $natjecanje->id) }}" class="card-custom-link">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $natjecanje->naslov }}</h5>
                                            <p class="card-text">{{ Illuminate\Support\Str::limit($natjecanje->opis, 255) }}</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <small class="text-muted">Početak: {{ \Carbon\Carbon::parse($natjecanje->pocetak)->format('d.m.Y H:i') }}</small>
                                                <small class="text-muted">Kraj: {{ \Carbon\Carbon::parse($natjecanje->kraj)->format('d.m.Y H:i') }}</small>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div> 

        </div> 
    </div> 

@endsection
@section('styles')
<style>
.card-custom-link {
        text-decoration: none; 
        color: black
    }

    .card-custom-link:hover,
    .card-custom-link:focus {
        text-decoration: none; 
    }
    </style>
@endsection

