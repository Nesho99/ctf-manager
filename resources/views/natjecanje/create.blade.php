@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Stvori Natjecanje</h2>
    <form action="{{ route('natjecanje.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="naslov">Naslov</label>
            <input type="text" class="form-control" id="naslov" name="naslov" required>
        </div>
        
        <div class="form-group">
            <label for="opis">Opis</label>
            <textarea class="form-control" id="opis" name="opis" rows="3"></textarea>
        </div>
        
        <div class="form-group">
            <label for="pocetak">Početak</label>
            <input type="datetime-local" class="form-control" id="pocetak" name="pocetak" required>
        </div>
        
        <div class="form-group">
            <label for="kraj">Kraj</label>
            <input type="datetime-local" class="form-control" id="kraj" name="kraj" required>
        </div>
        
        <button type="submit" class="btn btn-success mt-2">Kreiraj</button>
    </form>
</div>
@endsection
