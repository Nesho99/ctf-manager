@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <h2>Korisnici po bodovima</h2>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Korisničko ime</th>
                        <th scope="col">Ukupni bodovi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($usersWithPoints as $index => $user)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->zadatci_sum }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">Nema prikazanih korisnika.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection