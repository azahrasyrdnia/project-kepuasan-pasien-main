@extends('template.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <h1>Edit</h1>
            <form method="POST" action="{{ route('dashboard.kuisioner.update', $kuisioner->id) }}">
                @method('PUT')
                @csrf
                <div class="col mb-3">
                    <label for="nameBasic" class="form-label">Judul</label>
                    <input type="text" id="nameBasic" value="{{ $kuisioner->judul }}" class="form-control"
                        name="pertanyaan">
                </div>
                <div class="col mb-3">
                    <label for="nameBasic" class="form-label">Indeks</label>
                    <select class="form-select" aria-label="Default select example" name="indeks_id">

                        @foreach ($data_indeks as $item)
                            <option value="{{ $item->id }}"{{ $kuisioner->indeks_id == $item->id ? 'selected' : '' }}>
                                {{ $item->jenis }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
        </div>
    </div>
@endsection
