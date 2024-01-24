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
                sheet: "Data Laporan Kritik dan Saran",
            });
            XLSX.write(wb, {
                bookType: "xlsx",
                type: "base64",
            });
            XLSX.writeFile(wb, "Laporan Admin.xlsx");


        }
    </script>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mt-3">
                <h1> Laporan {{ Auth::user()->name }} </h1>
                <button class="btn btn-primary" onclick="export_data('Laporan');">Export EXCEL</button>
                <div class="card mt-3">
                    <div class="table-responsive text-nowrap">
                        <table class="table" id="Laporan">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Pesan</th>

                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @forelse ($datas as $data)
                                    <tr>
                                        <td>{{ $data->id }}</td>
                                        <td>
                                            <strong>{{ $data->name }}</strong>
                                        </td>
                                        <td>
                                            <strong>{{ $data->saran_kritik }}</strong>
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
