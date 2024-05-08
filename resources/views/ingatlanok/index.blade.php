@extends('layout')
@section('content')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-warning">{{ $error }}</div>
        @endforeach
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <th>Kategoriak</th>
            <th>Leírás</th>
            <th>Hirdetés dátuma</th>
            <th>Tehermentes</th>
            <th>Fénykép</th>
            <th>Ár</th>
        </thead>
        <tbody>
            @foreach ($ingatlanok as $item)
                <tr>
                    <td>{{ $item->kategoriak->nev }}</td>
                    <td>{{ $item->leiras }}</td>
                    <td>{{ $item->hierdetesDatuma }}</td>
                    <td>{{ $item->tehermentes ? 'Igen' : 'Nem' }}</td>
                    <td><img src="{{ $item->kepUrl }}" alt="{{ $item->kategoriak->nev }}" width="200px"></td>
                    <td>{{ $item->ar }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mobilNezet">
        @foreach ($ingatlanok as $item)
            <div class="card" style="width:400px">
                <img class="card-img-top" src="{{ $item->kepUrl }}" alt="Card image" style="width:100%">
                <div class="card-body">
                    <h4 class="card-title">{{ $item->kategoriak->nev }}</h4>
                    <p class="card-text">{{ $item->leiras }}</p>
                    <a href="{{ route('ingatlanok.show', ['id' => $item->id]) }}" class="btn btn-primary">Megtekint</a>
                </div>
            </div>
    </div>
    @endforeach
    </div>



    <form method="POST" action="{{ route('ingatlanok.store') }}">
        @csrf
        <label for="">Ingatlan kategória</label>
        <select class="form-control mt-3" name="kategoria">
            <option value="" disabled selected>Válassz kategóriát!</option>
            @foreach ($kategoriak as $item)
                <option id="{{ $item->id }}" value="{{ $item->id }}">{{ $item->nev }}</option>
            @endforeach
        </select>

        <label for="hierdetesDatuma">Hírdetés dátuma</label>
        <input type="date" id="hierdetesDatuma" name="hierdetesDatuma" value="{{ now()->toDateString() }}">

        <label for="">Ingatlan leírás</label>
        <textarea id="w3review" name="leiras" rows="4" cols="50"></textarea>

        <div class="form-check mb-3">
            <label for="" class="form-check-label">Tehermentes ingatlan</label>
            <input class="form-check-input" type="checkbox" id="tehermentes" name="tehermentes" value="1">
        </div>

        <label for="">Fénykép az ingatlanról!</label>
        <input type="text" id="kepUrl" name="kepUrl">

        <label for="">Ár az ingatlanról!</label>
        <input type="text" id="ar" name="ar">
        <button type="submit" class="btn btn-success">Küld</button>

    </form>
@endsection
