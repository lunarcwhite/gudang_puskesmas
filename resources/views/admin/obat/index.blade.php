@extends('layouts.dashboard.master')
@section('pageTitle')
<h4>Data Obat</h4>    
@stop
@section('pageButton')
    <button type="button" onclick="clearInput('formObat','Tambah Obat','dashboard/obat')" class="btn btn-primary" data-bs-toggle="modal"
        data-bs-target="#modalObat">
        Tambah
    </button>
    <a href="{{url()->previous()}}" class="btn btn-info">Kembali</a>
@stop
@section('content')
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table id="myTable" class="table table-hover table-striped display nowrap"
                style="width:100%">
                    <thead>
                        <th>No</th>
                        <th>Nama obat</th>
                        <th>Harga</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                        <th>Expired</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        @foreach ($obats as $no => $obat)
                            <tr>
                                <td>{{ $no + 1 }}</td>
                                <td>{{ $obat->nama_obat }}</td>
                                <td>{{$obat->harga_obat}}</td>
                                <td>{{ $obat->kategori->nama_kategori }}</td>
                                <td>{{$obat->stok_obat}}</td>
                                    <td>{{$obat->expired_obat}}</td>
                                <td>
                                    <form action="{{ route('dashboard.obat.destroy', $obat->id) }}"
                                        id="formDeleteObat" method="post">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('dashboard.obat.show', $obat->id) }}"
                                            class="btn btn-info">Lihat</a>
                                        <button type="button" class="btn btn-warning"
                                            onclick="editObat('{{ $obat->id }}','#modalObat')">
                                            Edit
                                        </button>
                                        <button type="button" class="btn btn-danger"
                                            onclick="formConfirmation('Hapus Data {{ $obat->nama_obat }}')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('admin.obat.modal_form_obat')
@stop
@push('js')
    <script>
        function editObat(id_obat, idModal) {
            $.ajax({
                type: "get",
                url: `{{ url('dashboard/obat/${id_obat}/edit') }}`,
                dataType: 'json',
                success: function(res) {
                    $("#nama_obat").val(res.nama_obat);
                    $("#stok_obat").val(res.stok_obat);
                    $("#harga_obat").val(res.harga_obat);
                    $("#expired_obat").val(res.expired_obat);
                    $(`#kategori_id option[value="${res.kategori_id}"]`).attr("selected", "selected").attr('class', 'kapilih');
                    $(`#labelModal`).text('Edit Data Obat');
                    $(`#btn-submit`).text('Update');
                    $('#update').append(
                        `@method('put')`
                    );
                    document.getElementById('formObat').action =
                    `{{ url('dashboard/obat/${res.id}') }}`;
                    $(idModal).modal('show');
                }
            });
        }
    </script>
@endpush
