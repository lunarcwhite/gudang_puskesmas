<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>
    <table class="table table-hover" id="myTable">
        <thead>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Tanggal</th>
            <th>Jumlah</th>
            <th>Status</th>
        </thead>
        <tbody>
            @forelse ($rekapans as $no => $rekapan)
                <tr>
                    <td>{{ $no + 1 }}</td>
                    <td>{{ $rekapan->barang->nama_barang }}</td>
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
</body>

</html>
