@extends('layouts.dashboard.master')
@section('pageTitle')
    <h4>Riwayat Barang</h4>
    <hr />
@stop
@section('pageButton')
<div class="btn-group">
    <button type="button" class="btn btn-primary" onclick="pilihan('tambah','Tambah Stok Obat','Tambah')">Tambah</button>
    <button type="button" class="btn btn-secondary" onclick="pilihan('kurangi','Kurangi Stok Obat','Kurangi')">Kurangi</button>
</div>
<a href="{{ url()->previous() }}" class="btn btn-info">Kembali</a>
@stop
@section('content')
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-hover" id="myTable">
                    <thead>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                        @forelse ($obat->rekapan as $no => $rekapan)
                            <tr>
                                <td>{{ $no + 1 }}</td>
                                <td>{{ $rekapan->created_at->format('Y-m-d') }}</td>
                                <td>{{ $rekapan->jumlah }}</td>
                                <td>{!! $rekapan->status === "0"
                                    ? '<span class="badge bg-danger">Keluar</span>'
                                    : '<span class="badge bg-success">Masuk</span>' !!}</td>
                            </tr>
                        @empty
                            <h2>Belum ada data</h2>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('admin.obat.modal_stok_obat')
@stop
@push('js')
    <script>
        function pilihan(pilihan,label,btn)
        {
           $('#pilihan').val(pilihan);
            $(`#labelModal`).text(label);
            $(`#btn-submit`).text(btn);
            $('#modalStok').modal('show');
        }
    </script>
@endpush
