@extends('template.main')

@section('title-front', 'AKSI RSQ | Kritik dan Saran')

@section('content-front')
    <div class="row">
        <div class="col">
            <div class="p-3 saran-kritik">
                <h1 class="mt-3 text-white">Kritik dan Saran</h1>
            </div>
            <form method="POST" action="{{ route('kritik-saran.store') }}">
                @csrf
                <div class="mb-3 mt-4">

                    <input type="text" class="form-control" name="nama_lengkap" id="nama-lengkap" placeholder="Nama Lengkap"
                        required autofocus>
                </div>
                <div class="mb-3">

                    <select class="form-select" name="jenis_rawat" required aria-label="Default select example"
                        id="jenis-rawat">

                        <option value="Rawat-Inap">Rawat Inap</option>
                        <option value="Rawat-Jalan">Rawat Jalan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="bagian">Unit / Bagian</label>
                    <select class="form-select" name="bagian" required aria-label="Default select example" id="bagian"
                        placeholder="Bagian">

                    </select>
                </div>
                <div class="mb-3">
                    <label for="indikator">Indeks</label>
                    <select class="form-select" name="indikator" required aria-label="Default select example"
                        id="indikator">
                        @foreach ($data_indeks as $item)
                            <option value="{{ $item->id }}">{{ $item->jenis }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">

                    <textarea class="form-control" name="saran_kritik" placeholder="Kritik Dan Saran" required
                        id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button class="btn btn-primary rounded-pill btn-success btn-lg" type="submit">Kirim</button>

                </div>
            </form>
        </div>

    </div>

    <script>
        const firstSelect = document.getElementById('jenis-rawat');
        const secondSelect = document.getElementById('bagian');

        firstSelect.addEventListener('change', updateSecondSelectOptions);

        function updateSecondSelectOptions() {
            const selectedOption = firstSelect.selectedOptions[0].value;
            const secondSelectOptions = secondSelect.options;

            secondSelectOptions.length = 0;

            if (selectedOption === 'Rawat-Inap') {
                fetch('{{ route('api.rawatInap-bagian') }}')
                    .then(response => response.json())
                    .then(data => {
                        // data is array

                        if (Array.isArray(data)) {
                            data.forEach(bagian => {
                                const option = document.createElement('option');
                                option.value = bagian.id;
                                option.textContent = bagian.name;
                                secondSelect.appendChild(option);
                            });
                        } // data is object
                        else if (typeof data === 'object') {
                            data.data.forEach(bagian => {
                                const option = document.createElement('option');
                                option.value = bagian.id;
                                option.textContent = bagian.name;
                                secondSelect.appendChild(option);
                            });
                        } else {
                            // Handle the case when data is not an array or object
                            console.error('Data is not an array or object');
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching data:', error);
                    });
            } else if (selectedOption === 'Rawat-Jalan') {
                fetch('{{ route('api.rawatJalan-bagian') }}')
                    .then(response => response.json())
                    .then(data => {
                        if (Array.isArray(data)) {
                            data.forEach(bagian => {
                                const option = document.createElement('option');
                                option.value = bagian.id;
                                option.textContent = bagian.nama;
                                secondSelect.appendChild(option);
                            });
                        } // data is object
                        else if (typeof data === 'object') {
                            data.data.forEach(bagian => {
                                const option = document.createElement('option');
                                option.value = bagian.id;
                                option.textContent = bagian.name;
                                secondSelect.appendChild(option);
                            });
                        } else {
                            // Handle the case when data is not an array or object
                            console.error('Data is not an array or object');
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching data:', error);
                    });
            }
        }
    </script>

@endsection
