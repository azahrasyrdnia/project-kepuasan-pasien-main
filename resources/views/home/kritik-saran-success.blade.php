@extends('template.main')

@section('title-front', 'AKSI RSQ | Kritik dan Saran Success')

@section('content-front')

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <h1 class="text-center fw-bold mt-4" style="color:blueviolet;"><i class="bi bi-check-circle"></i></h1>
                <h1 class="text-center">Kritik dan Saran anda sudah terkirim. Terima Kasih</h1>

                <p class="text-center mt-5"><a href="{{ route('home') }}" class="btn btn-primary"><i
                            class="bi bi-arrow-left fs-5"></i> Kembali ke halaman utama</a></p>
            </div>
        </div>
    </div>
@endsection
