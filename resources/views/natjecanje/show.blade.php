@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>{{ $natjecanje->naslov }}</div>
            <!-- Delete button form -->
            <form action="{{ route('natjecanje.destroy', $natjecanje->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
            </form>
        </div>
        <div class="card-body">
            <p class="card-text">{{ $natjecanje->opis }}</p>
            <p class="card-text"><strong>Početak:</strong> {{ $natjecanje->pocetak->format('d.m.Y H:i') }}</p>
            <p class="card-text"><strong>Kraj:</strong> {{ $natjecanje->kraj->format('d.m.Y H:i') }}</p>
        </div>
    </div>
</div>
@endsection

