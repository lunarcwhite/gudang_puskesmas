@extends('layouts.dashboard.master')
@section('pageTitle')
    Rekapan Keluar Masuk Stok Obat
@stop
@section('pageButton')
<form action="{{ route('dashboard.rekapan.print') }}" method="post">
    @csrf
    <input type="hidden" name="bulan" value="{{ Request::query('bulan') }}">
    <button type="submit" class="btn btn-primary"><i class="bi bi-printer"></i> Cetak
        PDF</button>
</form>
<a href="{{ url()->previous() }}" class="btn btn-info">
    Kembali
</a>
@stop
@section('content')
<form action="{{ route('dashboard.rekapan.index') }}" method="get" id="formTanggal">
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Filter Sesuai Tanggal</label>
        <div class="col-sm-2">
            <input type="month" class="form-control" id="bulan" name="bulan">
            <br />
            <a href="{{ route('dashboard.rekapan.index') }}" class="btn btn-sm btn-secondary"
                rel="noopener noreferrer">
                Tampilkan Semua</a>
        </div>
    </div>
</form>

<div class="table-responsive p-3">
    <table class="table table-hover" id="myTable">
        <thead>
            <th>No</th>
            <th>Nama Obat</th>
            <th>Tanggal</th>
            <th>Jumlah</th>
            <th>Status</th>
        </thead>
        <tbody>
            @forelse ($rekapans as $no => $rekapan)
                <tr>
                    <td>{{ $no + 1 }}</td>
                    <td>{{ $rekapan->obat->nama_obat }}</td>
                    <td>{{ $rekapan->created_at->format('Y-m-d') }}</td>
                    <td>{{ $rekapan->jumlah }}</td>
                    <td>{!! $rekapan->status === '0'
                        ? '<span class="badge bg-danger">Keluar</span>'
                        : '<span class="badge bg-success">Masuk</span>' !!}</td>
                </tr>
            @empty
                <h2>Belum ada rekapan</h2>
            @endforelse
        </tbody>
    </table>
</div>
@stop
@push('js')
    <script>
        $("#bulan").change(function(e) {
            e.preventDefault();
            $("#formTanggal").submit();
        });
    </script>
@endpush
