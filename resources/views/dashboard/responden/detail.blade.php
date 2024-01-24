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
                <h1>Detail Laporan Survei Pasien</h1>
                <button class="btn btn-primary" onclick="export_data('detailResponden');">Export EXCEL</button>
                <div class="card mt-3">
                    <div class="table-responsive text-nowrap">
                        <table class="table" id="detailResponden">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kuesioner</th>
                                    <th>Jawaban</th>
                                    <th>keluhan</th>
                                    <th>Skor</th>
                                    <th>Created At</th>

                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @forelse ($respondens as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}
                                        </td>
                                        <td>
                                            <strong>{{ $data->kuisioner->judul }}</strong>
                                        </td>
                                        <td>
                                            <strong>{{ $data->jawaban->name }}</strong>
                                        </td>
                                        <td>
                                            <strong>{{ $data->keluhan }}</strong>
                                        </td>
                                        <td>
                                            <strong>{{ $data->skor }}</strong>
                                        </td>
                                        <td>
                                            <strong>{{ $data->created_at }}</strong>
                                        </td>



                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">Data Kosong</td>
                                    </tr>
                                @endforelse
                                <tr>
                                    <td colspan="3" class="text-center"><strong>Total Skor</strong></td>
                                    <td colspan="3" class="text-center"><strong>{{ $total }}</strong></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
