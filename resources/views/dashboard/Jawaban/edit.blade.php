@extends('template.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <h1>Edit</h1>
            <form method="POST" action="{{ route('dashboard.jawaban.update', $jawaban->id) }}">
                @method('PUT')
                @csrf
                <div class="col mb-3">
                    <label for="nameBasic" class="form-label">Jenis</label>
                    <input type="text" id="nameBasic" value="{{ $jawaban->name }}" class="form-control" name="jawaban">
                </div>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
        </div>
    </div>
@endsection
