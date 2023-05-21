@extends('layouts.admin.master')
@section('title')
    <h4>Data Kategori</h4>
    <button type="button" onclick="clearInput('formKategori', 'Tambah Kategori','dashboard/kategori')" class="btn btn-primary" data-bs-toggle="modal"
        data-bs-target="#modalKategori">
        Tambah
    </button>
@stop
@section('currentMenuLink')
    {{ route('dashboard.kategori.index') }}
@stop
@section('currentMenu')
    Data Kategori
@stop
@section('currentPage')
    Daftar Kategori
@endsection
@section('content')
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-hover" id="myTable">
                    <thead>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <TH>Aksi</TH>
                    </thead>
                    <tbody>
                        @foreach ($kategoris as $no => $kategori)
                            <tr>
                                <td>{{ $kategori->id }}</td>
                                <td>{{ $kategori->nama_kategori }}</td>
                                <td>
                                    <form action="{{ route('dashboard.kategori.destroy', $kategori->id) }}"
                                        id="formDeleteKategori" method="post">
                                        @csrf
                                        @method('delete')
                                        <input type="hidden" name="id" value="{{ $kategori->id }}" id="">
                                        <a href="{{ route('dashboard.kategori.show', $kategori->id) }}"
                                            class="btn btn-info">Lihat</a>
                                        <button type="button" class="btn btn-warning"
                                            onclick="editKategori('{{ $kategori->id }}','#modalKategori')">
                                            Edit
                                        </button>
                                        <button type="button" class="btn btn-danger"
                                            onclick="formDelete('Hapus Data {{ $kategori->nama_kategori }}')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('admin.kategori.modalForm')
@stop
@push('js')
    <script>
        function editKategori(idKategori, idModal) {
            let update = $('#update');
            let id = idKategori;

            $.ajax({
                type: "get",
                url: `{{ url('dashboard/kategori/${id}/edit') }}`,
                dataType: 'json',
                success: function(res) {
                    $("#nama_kategori").val(res.nama_kategori);
                    $(`#labelModal`).text('Edit Kategori');
                    $(`#btn-submit`).text('Update');
                    update.append(
                        `@method('put')`
                    );
                    document.getElementById('formKategori').action =
                    `{{ url('dashboard/kategori/${res.id}') }}`;
                    $(idModal).modal('show');

                }
            });
        }
    </script>
@endpush
