@extends('layouts.admin.master')
@section('title')
    <h4>Data Barang</h4>
    <button type="button" onclick="clearInput('formBarang','Tambah Barang','dashboard/barang')" class="btn btn-primary" data-bs-toggle="modal"
        data-bs-target="#modalBarang">
        Tambah
    </button>
@stop
@section('currentMenuLink')
    {{ route('dashboard.barang.index') }}
@stop
@section('currentMenu')
    Data Barang
@stop
@section('currentPage')
    Daftar Barang
@endsection
@section('content')
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-hover" id="myTable">
                    <thead>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                        <th>Photo</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        @foreach ($barangs as $no => $barang)
                            <tr>
                                <td>{{ $no + 1 }}</td>
                                <td>{{ $barang->nama_barang }}</td>
                                <td>{{ $barang->kategori->nama_kategori }}</td>
                                <td>{{$barang->stok_barang}}</td>
                                @if ($barang->photo_barang === null)
                                    <td>Gambar Belum Diupload</td>
                                @else
                                    @php
                                        $photo = Storage::url('images/barang/' . $barang->photo_barang);
                                    @endphp
                                    <td><img src="{{ url($photo) }}" class="img-fluid" alt="" width="200px"
                                            srcset=""></td>
                                @endif
                                <td>
                                    <form action="{{ route('dashboard.barang.destroy', $barang->id) }}"
                                        id="formDeleteBarang" method="post">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('dashboard.barang.show', $barang->id) }}"
                                            class="btn btn-info">Lihat</a>
                                        <button type="button" class="btn btn-warning"
                                            onclick="editBarang('{{ $barang->id }}','#modalBarang')">
                                            Edit
                                        </button>
                                        <button type="button" class="btn btn-danger"
                                            onclick="formDelete('Hapus Data {{ $barang->nama_barang }}')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('admin.barang.modalBarang')
@stop
@push('js')
    <script>
        function editBarang(id_barang, idModal) {
            $("#gambar-barang").empty();
            $.ajax({
                type: "get",
                url: `{{ url('dashboard/barang/${id_barang}/edit') }}`,
                dataType: 'json',
                success: function(res) {
                    $("#nama_barang").val(res.nama_barang);
                    $("#stok_barang").val(res.stok_barang);
                    $(`#kategori_id option[value="${res.kategori_id}"]`).attr("selected", "selected").attr('class', 'kapilih');
                    
                    if (res.photo_barang === null) {
                        $("#gambar-barang").append(`Belum Mengupload Gambar`);
                    } else {
                        $("#gambar-barang").append(
                            `<img src="{{ url('storage/images/barang/${res.photo_barang}') }}" class="img-fluid" alt="" srcset="">`
                            );
                    }
                    $(`#labelModal`).text('Edit Data Barang');
                    $(`#btn-submit`).text('Update');
                    $('#update').append(
                        `@method('put')`
                    );
                    document.getElementById('formBarang').action =
                    `{{ url('dashboard/barang/${res.id}') }}`;
                    $(idModal).modal('show');
                }
            });
        }
    </script>
@endpush
