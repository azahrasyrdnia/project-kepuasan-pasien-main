@extends('template.main')

@section('title-front', 'AKSI RSQ | Home')

@section('content-front')
    <div class="row">
        <div class="col text-center ">
            <p class="fw-bold mt-5">
                Aplikasi Indeks Kepuasan Pasien RS Qadr
            </p>
            <h1 class="mt-2 tentang">
                AKSI RSQ
            </h1>
            <a href="{{ route('identitas-kuisioner') }}" class="btn btn-lg rounded-pill btn-success">SURVEI KEPUASAN <i
                    class="bi bi-arrow-right-circle"></i></a>
        </div>
        <div class="col">
            <img class="img-fluid" src="{{ asset('assets/img/home-image.png') }}" alt="">
        </div>
    </div>
    <div class="row mt-5 bg-custom">
        <div class="col">
            <h1 class="text-center text-light mt-5 mb-5">
                “Bantu kami untuk selalu meningkatkan pelayanan
                kesehatan dengan memberikan penilaian secara online”
            </h1>
        </div>
    </div>
    <div class="row mt-3" id="about">
        <div class="col text-center elips">
            <div class="text-position">
                <h1 class="mt-5 judul">
                    AKSI RSQ
                </h1>
                <p class="tagline">
                    Aplikasi Indeks Kepuasan Pasien
                    <br>
                    RS Qadr
                </p>
            </div>

        </div>
        <div class="col">
            <div class="row about mt-5 text-center">
                <div class="col-12 about-header">
                    <h1>ABOUT US</h1>
                </div>
                <div class="col-12 about-tagline">
                    <p class="">
                        AKSI RSQ merupakan aplikasi indeks
                        kepuasan pasien Rumah Sakit Qadr. Ini
                        memungkinkan untuk pasien untuk
                        memberikan feedback dan menilai kualitas
                        pelayanan serta fasilitas yang diterima
                        selama berada di Rumah Sakit Qadr

                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row contact">
        <div class="col text-center">
            <h1 class="mt-5 tentang">
                AKSI RSQ
            </h1>
            <p class="fw-bold">
                Aplikasi Indeks Kepuasan Pasien
                RS Qadr
            </p>
        </div>
        <div class="col">
            <h5 class="text-center mt-3 fw-bold">
                Contact Person
            </h5>
            <div class="row fs-6">
                <div class="col-12">
                    <p class="fw-bold">
                        <i class="bi bi-telephone-fill fs-4 text-success"></i> 021-5464466
                    </p>
                </div>
                <div class="col-12">
                    <p class="fw-bold">
                        <i class="bi bi-geo-alt-fill fs-4 text-success"></i> Kompleks Islamic Village,
                        Klp. Dua, Karawaci,
                        Kabupaten
                        Tangerang,
                        Banten

                    </p>
                </div>
            </div>


        </div>
    </div>

    <div class="row background-image-home">
        <div class="col ">

        </div>
    </div>
@endsection
