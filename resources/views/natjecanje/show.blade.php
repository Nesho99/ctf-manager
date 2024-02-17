@extends('layouts.app')
@php
    $zadatci= $natjecanje->zadatci()->get()
@endphp


@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>{{ $natjecanje->naslov }}</div>
            <div>
                <a href="{{ route('natjecanje.edit', $natjecanje->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('natjecanje.destroy', $natjecanje->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                </form>
            </div>
        </div>
        <div class="card-body">
            <p class="card-text">{{ $natjecanje->opis }}</p>
            <p class="card-text"><strong>Početak:</strong> {{ $natjecanje->pocetak->format('d.m.Y H:i') }}</p>
            <p class="card-text"><strong>Kraj:</strong> {{ $natjecanje->kraj->format('d.m.Y H:i') }}</p>
  
            <div class="mt-4">
                <h3>Zadatci</h3>
                @foreach ($zadatci as $zadatak)
                    <div class="card mb-2">
                        <div class="card-body">
                            <h4 class="card-title mb-2"><b>{{ $zadatak->naslov }}</b></h4>
                            <p class="card-text"><b>Opis: </b>{{ $zadatak->opis }}</p>
                            <p class="card-text"><b>Kategorija: </b> {{ $zadatak->kategorija }}</p>
                            <p class="card-text"><b>Težina: </b>{{ $zadatak->tezina }}</p>
                            <p class="card-text"><b>Zastavica: </b>{{ $zadatak->zastavica }}</p>
                            <p class="card-text"><b>Bodovi: </b> {{ $zadatak->bodovi }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .card-body .card-text {
        margin-bottom: 0.5rem; 
    }
</style>

@endsection

