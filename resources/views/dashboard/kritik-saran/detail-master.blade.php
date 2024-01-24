@extends('template.app')

@section('title', 'Dashboard')



@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mt-3">
                <h1>Detail Laporan Kritik dan Saran</h1>
                <div class="card mt-3">
                    <div class="row p-4" id="printJS-row">
                        <div class="col-6">
                            <h6>Nama Lengkap:</h6>
                            <h6>Jenis Rawat:</h6>
                            <h6>Bagian:</h6>
                            <h6>Indikator:</h6>
                            <h6>Kritik/Saran:</h6>
                        </div>
                        <div class="col-6">
                            <h6>{{ $kritikSaran->name }}</h6>
                            <h6>{{ $kritikSaran->jenis_rawat }}</h6>
                            <h6>{{ $kritikSaran->bagian->name }}</h6>
                            <h6>{{ $kritikSaran->indek->jenis }}</h6>
                            <h6>{{ $kritikSaran->saran_kritik }}</h6>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>


    </div>

@endsection
