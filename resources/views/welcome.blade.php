@extends('layouts.app')
@section('content')
<div class="px-4 py-5 my-5 text-center">
    <img class="d-block mx-auto mb-4" src="{{asset("slike/logo.png")}}" alt="" width="256" height="256">
    <h1 class="display-5 fw-bold">Zaronite u svijet CTF-a. Izazovite sebe, izgradite vještine!
    </h1>
    <div class="col-lg-6 mx-auto">
        <p class="lead mb-4"> Upoznajte CTF Manager, jednostavno rješenje za organizaciju i upravljanje CTF natjecanjima. Naša platforma omogućuje lako postavljanje izazova i praćenje napretka natjecatelja, pružajući sve potrebno za učinkovito vođenje sigurnosnih natjecanja. Idealna je za obrazovne institucije i organizacije koje žele potaknuti učenje kroz praksu. Počnite s organizacijom vašeg prvog CTF-a već danas!</p>
        <button id=registriraj type="button" class="btn btn-primary btn-lg px-4 gap-3">Registriraj se</button>

    </div>
</div>
</div>
<script>
    document.getElementById('registriraj').addEventListener('click', function() {
        window.location.href = '{{route('register')}}';
    });
</script>
@endsection