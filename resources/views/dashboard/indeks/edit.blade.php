@extends('template.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <h1>Edit</h1>
            <form method="POST" action="{{ route('dashboard.indeks.update', $indeks->id) }}">
                @method('PUT')
                @csrf
                <div class="col mb-3">
                    <label for="nameBasic" class="form-label">Jenis</label>
                    <input type="text" id="nameBasic" value="{{ $indeks->jenis }}" class="form-control" name="jenis">
                </div>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
        </div>
    </div>
@endsection
