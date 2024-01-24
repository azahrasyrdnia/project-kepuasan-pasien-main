@extends('template.app')

@section('title', 'Dashboard')
@section('export')
    <!-- use version 0.20.1 -->
    <script lang="javascript" src="https://cdn.sheetjs.com/xlsx-0.20.1/package/dist/xlsx.full.min.js"></script>

    <script>
        function export_data(id) {
            let table = document.getElementById(id);

            // export table to excel format and download
            let wb = XLSX.utils.table_to_book(table, {
                sheet: "DATA RESPONDEN",
            });
            XLSX.write(wb, {
                bookType: "xlsx",
                type: "base64",
            });
            XLSX.writeFile(wb, "Data Responden.xlsx");


        }
    </script>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mt-3">
                <h1>Laporan Survei Pasien</h1>
                <button class="btn btn-primary" onclick="export_data('Responden');">Export EXCEL</button>
                <div class="card mt-3">
                    <div class="table-responsive text-nowrap">
                        <table class="table" id="Responden">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lengkap</th>
                                    <th>Nomor Telepon</th>
                                    <th>Jenis Rawat</th>
                                    <th>Jenis Tanggungan</th>
                                    <th>Keluhan</th>
                                    <th>Skor</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @forelse ($datas as $data)
                                    <tr>
                                        <td>{{ $data->id }}</td>
                                        <td>
                                            <strong>{{ $data->nama_lengkap }}</strong>
                                        </td>
                                        <td>
                                            <strong>{{ $data->no_telepon }}</strong>
                                        </td>
                                        <td>
                                            <strong>{{ $data->jenis_rawat }}</strong>
                                        </td>

                                        <td>
                                            <strong>{{ $data->jenis_tanggungan }}</strong>
                                        </td>
                                        
                                        <td>
                                            <strong>{{ $data->keluhan }}</strong>
                                        </td>

                                        <td>
                                            <strong>{{ $data->total_skor }}</strong>
                                        </td>

                                        <td>
                                            <a href="{{ route('dashboard.responden.detail', $data->id) }}" type="button"
                                                class="btn btn-primary"><i class='bx bx-search'></i></a>
                                        </td>

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
