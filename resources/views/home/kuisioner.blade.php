@extends('template.main')

@section('title-front', 'AKSI RSQ | Kuisioner')

@section('content-front')

    <div class="container-fluid">
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form method="POST" action="{{ route('kuisioner.store') }}" id="submit">
            @csrf
            <div class="row mt-2">
                <div class="col text-center">
                    @if ($data_kuisioner != null)
                        <h1 style="font-size: 20px;">Indeks: <span class="text-success">{{ $data_kuisioner->indeks->jenis }}</span> </h1>
                        <p class="fw-bold">{{ $data_kuisioner->judul }}</p>
                        <input type="hidden" id="data_kuisioner" value="{{ $data_kuisioner->id }}" name="kuisioner_id">
                        <input type="hidden" id="token" value="{{ csrf_token() }}" name="token">
                        <input type="hidden" id="user_id" value="{{ $user_id }}" name="identitas_kuisioner_id">
                        <input type="hidden" value="{{ $current_index }}" name="current_index">
                    @else
                        <h1>Indeks: <span>Belum ada</span> </h1>
                        <p>Belum ada kuesioner</p>
                    @endif
                </div>
            </div>

            <div class="row text-center">
                @forelse ($jawabans as $jawaban)
                    <div class="col-6">
                        <label for="{{ $jawaban->name }}" class="selectable">
                            <div class="text-center p-3">
                                <p><i class="bi emot fs-1 {{ $jawaban->icon }}"></i></p>
                                <p class="mt-3 fs-6 fw-bold">{{ $jawaban->name }}</p>
                            </div>
                            <input type="radio" value="{{ $jawaban->id }}" id="{{ $jawaban->name }}" name="jawaban_id">
                        </label>
                    </div>

                @empty
                    <div class="col">
                        <p class="text-center">Tidak ada data</p>
                    </div>
                @endforelse
            </div>
            
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-success btn-lg" type="submit">Submit <i class="bi bi-arrow-right-circle"></i></button>

            </div>
        </form>
    </div>

    <script>

document.addEventListener('DOMContentLoaded', function () {
    let jawaban = document.querySelectorAll('input[name="jawaban_id"]');
    jawaban.forEach(function (e) {
        e.addEventListener('click', function () {
            jawaban.forEach(function (e) {
                e.removeAttribute('checked');
            });
            this.setAttribute('checked', 'checked');
        });
    });

    // get jawaban_icon class and set class color each icon
    let jawaban_icon = document.querySelectorAll('.emot');
    jawaban_icon.forEach(function (e) {
        if (e.classList.contains('bi-emoji-heart-eyes-fill')) {
            e.classList.add('text-success');
        } else if (e.classList.contains('bi-emoji-smile-fill')) {
            e.classList.add('text-primary');
        } else if (e.classList.contains('bi-emoji-neutral-fill')) {
            e.classList.add('text-warning');
            e.addEventListener('click', function () {
                tampilkanKeluhan('Neutral');
            });
        } else if (e.classList.contains('bi-emoji-angry-fill')) {
            e.classList.add('text-danger');
            e.addEventListener('click', function () {
                tampilkanKeluhan('Angry');
            });
        }
    });

    function tampilkanKeluhan(emotion) {
        // Buat elemen form untuk keluhan
        let formHtml = `
            <div class="mt-3">
                <label for="keluhan"> Isi Keluhan *</label>
                <textarea class="form-control" id="keluhan" name="keluhan" rows="3" required></textarea>
            </div>
        `;

        // Tambahkan elemen form ke dalam dokumen
        let keluhanContainer = document.createElement('div');
        keluhanContainer.id = 'keluhan-container';
        keluhanContainer.innerHTML = formHtml;

        // Tempatkan elemen form di bawah form utama
        let form = document.getElementById('submit');
        form.appendChild(keluhanContainer);
    }

    function kirimKeluhan() {
        // Dapatkan nilai keluhan dari textarea
        let keluhanValue = document.getElementById('keluhan').value;

        // Validasi keluhan tidak boleh kosong
        if (keluhanValue.trim() === "") {
            alert('Isi Keluhan  Anda sebelum mengirimkan.');
            return;
        }

        // Dapatkan data lain yang diperlukan
        let kuisionerId = document.getElementById('data_kuisioner').value;
        let identitasKuisionerId = document.getElementById('user_id').value;

        // Kirim data ke server menggunakan AJAX
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "store_keluhan.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                let response = JSON.parse(xhr.responseText);
                if (response.success) {
                    alert(response.message);
                    // Hapus elemen form setelah pengiriman
                    let keluhanContainer = document.getElementById('keluhan-container');
                    keluhanContainer.remove();
                } else {
                    alert('Gagal mengirimkan keluhan. ' + response.message);
                }
            }
        };
        xhr.send("kuisioner_id=" + kuisionerId + "&identitas_kuisioner_id=" + identitasKuisionerId + "&keluhan=" + encodeURIComponent(keluhanValue));
    };
    
    });


    </script>

@endsection
