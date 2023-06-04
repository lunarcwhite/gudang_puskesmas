@extends('layouts.dashboard.master')
@section('content')
<div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-3 pb-5">
    <div class="col">
        <div class="card ms-4 mt-4 h-100 border-primary position-relative shadow">
            <div class="card py-1 px-2 fs-2 fw-bold bg-primary bg-gradient text-white position-absolute translate-middle">
                <i class="bi bi-boxes"></i>
            </div>
            <div class="card-body ms-4">
                <span class="fs-5 fw-bolder">Total Paket:</span>
                <span class="fs-3 fw-bold font-monospace text-primary"> 500</span>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card ms-4 mt-4 h-100 border-success position-relative shadow">
            <div class="card py-1 px-2 fs-2 fw-bold bg-success bg-gradient text-white position-absolute translate-middle">
                <i class="bi bi-box2-heart"></i>
            </div>
            <div class="card-body ms-4">
                <span class="fs-5 fw-bolder">Paket Terkirim:</span>
                <span class="fs-3 fw-bold font-monospace text-success"> 210</span>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card ms-4 mt-4 h-100 border-warning position-relative shadow">
            <div class="card py-1 px-2 fs-2 fw-bold bg-warning bg-gradient text-white position-absolute translate-middle">
                <i class="bi bi-box-seam"></i>
            </div>
            <div class="card-body ms-4">
                <span class="fs-5 fw-bolder">Paket Proses:</span>
                <span class="fs-3 fw-bold font-monospace text-warning"> 284</span>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card ms-4 mt-4 h-100 border-danger position-relative shadow">
            <div class="card py-1 px-2 fs-2 fw-bold bg-danger bg-gradient text-white position-absolute translate-middle">
                <i class="bi bi-box2"></i>
            </div>
            <div class="card-body ms-4">
                <span class="fs-5 fw-bolder">Paket Gagal:</span>
                <span class="fs-3 fw-bold font-monospace text-danger"> 006</span>
            </div>
        </div>
    </div>
</div>


@endsection