@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="content">
    <div class="panel-header bg-primary-gradient"><div class="page-inner py-5"><div class="d-flex align-items-left align-items-md-center flex-column flex-md-row"><div><h2 class="text-white pb-2 fw-bold">Dashboard</h2><h5 class="text-white op-7 mb-2">Sistem Akuntansi - Salon Fas</h5></div></div></div></div>
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-body">
                        <div class="card-title">Statistik Keseluruhan</div>
                        <div class="card-category">Reload halaman ini untuk memperbarui data.</div>
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                            <div class="px-2 pb-2 pb-md-0 text-center">
                                <div id="circles-purchase"></div>
                                <h6 class="fw-bold mt-3 mb-0">Total Pembelian</h6>
                            </div>
                            <div class="px-2 pb-2 pb-md-0 text-center">
                                <div id="circles-sale"></div>
                                <h6 class="fw-bold mt-3 mb-0">Total Penjualan</h6>
                            </div>
                            <div class="px-2 pb-2 pb-md-0 text-center">
                                <div id="circles-cash-payment"></div>
                                <h6 class="fw-bold mt-3 mb-0">Total Pengeluaran Kas</h6>
                            </div>
                            <div class="px-2 pb-2 pb-md-0 text-center">
                                <div id="circles-cash-receipt"></div>
                                <h6 class="fw-bold mt-3 mb-0">Total Penerimaan Kas</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<x-footer></x-footer>
@endsection
@section('content-scripts')
    @include('user.dashboard-scripts')
@endsection
