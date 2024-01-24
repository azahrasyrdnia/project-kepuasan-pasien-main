@extends('template.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mt-3">
                <h1>Jawaban</h1>
                @if (Auth::user()->role == 'superadmin')
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                        New Data
                    </button>
                    <div class="modal fade" id="basicModal" tabindex="-1" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel1">New Data</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <form method="POST" action="{{ route('dashboard.jawaban.store') }}">
                                            @csrf
                                            <div class="col mb-3">
                                                <label for="nameBasic" class="form-label">Jenis</label>
                                                <input type="text" id="nameBasic" class="form-control" name="jawaban">
                                            </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="card mt-3">
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis</th>
                                    @if (Auth::user()->role == 'superadmin')
                                        <th>Actions</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @forelse ($datas as $data)
                                    <tr>
                                        <td>{{ $data->id }}</td>
                                        <td>
                                            <strong>{{ $data->name }}</strong>

                                        </td>
                                        @if (Auth::user()->role == 'superadmin')
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </button>
                                                    <div class="dropdown-menu" style="">
                                                        <a class="dropdown-item"
                                                            href="{{ route('dashboard.jawaban.edit', $data->id) }}"><i
                                                                class="bx bx-edit-alt me-1"></i> Edit</a>

                                                        <form action="{{ route('dashboard.jawaban.destroy', $data->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item"><i
                                                                    class="bx bx-trash me-1"></i> Delete</button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </td>
                                        @endif
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">Data Kosong</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
