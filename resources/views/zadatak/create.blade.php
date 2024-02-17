@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Stvori Zadatak</h2>
    <form action="{{ route('natjecanje.zadatak.store',$natjecanje) }}" method="POST">
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
            <label for="kategorija">Kategorija</label>
            <input type="text" class="form-control" id="kategorija" name="kategorija" required>
        </div>

        <div class="form-group">
            <label for="tezina">Težina</label>
            <select class="form-control" id="tezina" name="tezina" required>
                <option value="lako">Lako</option>
                <option value="srednje">Srednje</option>
                <option value="tesko">Teško</option>
            </select>
        </div>

        <div class="form-group">
            <label for="zastavica">Zastavica</label>
            <input type="text" class="form-control" id="zastavica" name="zastavica" required>
        </div>

        <div class="form-group">
            <label for="bodovi">Bodovi</label>
            <input type="number" class="form-control" id="bodovi" name="bodovi" required>
        </div>

        <input type="hidden" name="natjecanje_id" value="{{ $natjecanje->id }}">


        
        <button type="submit" class="btn btn-success mt-2">Kreiraj</button>
    </form>
</div>
@endsection
