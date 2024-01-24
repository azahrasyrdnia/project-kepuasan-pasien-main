@extends('template.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <h1>Edit</h1>
            <form method="POST" action="{{ route('dashboard.bagian.update', $bagian->id) }}">
                @method('PUT')
                @csrf
                <div class="col mb-3">
                    <label for="bagianEdit" class="form-label">Bagian</label>
                    <input type="text" id="bagianEdit" value="{{ $bagian->name }}" class="form-control" name="name">
                </div>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
        </div>
    </div>
@endsection
