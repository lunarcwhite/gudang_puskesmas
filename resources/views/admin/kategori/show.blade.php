@extends('layouts.admin.master')
@section('title')
    <h4>Data Barang</h4>
    <hr/>
    <a href="{{url()->previous()}}" class="btn btn-primary">Kembali</a>
@stop
@section('currentMenuLink')
    {{ url()->current()}}
@stop
@section('currentMenu')
    Kategori
@stop
@section('currentPage')
    {{$kategori->nama_kategori}}
@endsection
@section('content')
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-hover" id="myTable">
                    <thead>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Stok</th>
                    </thead>
                    <tbody>
                        @foreach ($kategori->barang as $no => $barang)
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ $barang->nama_barang }}</td>
                                <td>{{$barang->stok_barang}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
