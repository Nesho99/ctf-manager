@extends('layouts.app')

@section('content')
<div class="container">
    <h2> Uredi Natjecanje</h2>
    <form action="{{ route('natjecanje.update',$natjecanje) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="naslov">Naslov</label>
            <input type="text" class="form-control" id="naslov" name="naslov" value="{{$natjecanje->naslov}}" required>
        </div>
        
        <div class="form-group">
            <label for="opis">Opis</label>
            <textarea class="form-control" id="opis" name="opis" rows="3">{{$natjecanje->opis}}</textarea>
        </div>
        
        <div class="form-group">
            <label for="pocetak">Početak</label>
            <input type="datetime-local" class="form-control" id="pocetak" name="pocetak" value="{{$natjecanje->pocetak}}"required>
        </div>
        
        <div class="form-group">
            <label for="kraj">Kraj</label>
            <input type="datetime-local" class="form-control" id="kraj" name="kraj" value="{{$natjecanje->kraj}}"required>
        </div>
        
        <button type="submit" class="btn btn-success mt-2">Uredi</button>
    </form>
</div>
@endsection
