@extends('layouts.dashboard.master')
@section('pageTitle')
<h4>Data Obat Kategori {{$kategori->nama_kategori}}</h4>
@stop
@section('pageButton')
    <a href="{{url()->previous()}}" class="btn btn-info">Kembali</a>
@stop
@section('content')
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-hover" id="myTable">
                    <thead>
                        <th>No</th>
                        <th>Nama Obat</th>
                        <th>Stok</th>
                    </thead>
                    <tbody>
                        @foreach ($kategori->obat as $no => $obat)
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ $obat->nama_obat }}</td>
                                <td>{{$obat->stok_obat}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
