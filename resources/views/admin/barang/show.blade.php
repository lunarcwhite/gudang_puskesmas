@extends('layouts.admin.master')
@section('title')
    <h4>Riwayat Barang</h4>
    <hr />
    <a href="{{ url()->previous() }}" class="btn btn-primary">Kembali</a>
    <hr/>
    <div class="btn-group">
        <button type="button" class="btn btn-info" onclick="pilihan('tambah','Tambah','Tambah')">Tambah</button>
        <button type="button" class="btn btn-secondary" onclick="pilihan('kurangi','Kurangi','Kurangi')">Kurangi</button>
    </div>
@stop
@section('currentMenuLink')
    {{ url()->current() }}
@stop
@section('currentMenu')
    Daftar Riwayat
@stop
@section('currentPage')
    {{ $barang->nama_barang }}
@endsection
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
                        @forelse ($barang->riwayat as $no => $riwayat)
                            <tr>
                                <td>{{ $no + 1 }}</td>
                                <td>{{ $riwayat->created_at->format('Y-m-d') }}</td>
                                <td>{{ $riwayat->jumlah }}</td>
                                <td>{!! $riwayat->status === "0"
                                    ? '<span class="badge bg-danger">Keluar</span>'
                                    : '<span class="badge bg-success">Masuk</span>' !!}</td>
                            </tr>
                        @empty
                            <h2>Belum ada riwayat</h2>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('admin.barang.modalStok')
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
