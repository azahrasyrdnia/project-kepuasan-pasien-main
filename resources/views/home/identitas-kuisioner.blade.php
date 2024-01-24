@extends('template.main')

@section('title-front', 'AKSI RSQ | Identitas Pasien')

@section('content-front')
    <div class="row">
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="col">
            <span>
                <h1 class="mt-2">Identitas Pasien</h1>
            </span>
            <form method="POST" action="{{ route('identitas-kuisioner.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="nama-lengkap" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama_lengkap" id="nama-lengkap"
                        placeholder="Nama Lengkap" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="nomor-telepon" class="form-label">Nomor Telepon</label>
                    <input type="number" min="0" class="form-control" name="nomor_telepon" id="nomor-telepon"
                        placeholder="Nomor Telepon" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="jenis-rawat" class="form-label">Jenis Rawat</label>
                    <select class="form-select" name="jenis_rawat" required aria-label="Default select example"
                        id="jenis-rawat">

                        <option value="Rawat-Inap">Rawat Inap</option>
                        <option value="Rawat-Jalan">Rawat Jalan</option>
                        <option value="IGD">IGD</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="indikator" class="form-label">Jenis Tanggungan</label>
                    <select class="form-select" name="jenis_tanggungan" required aria-label="Default select example"
                        id="jenis-tanggungan">
                        <option value="BPJS">BPJS</option>
                        <option value="Pribadi">Pribadi</option>
                        <option value="Asuransi">Asuransi</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Next <i class="bi bi-arrow-right-circle"></i></button>
            </form>
        </div>

    </div>



@endsection
