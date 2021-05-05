@extends('layouts.app')
@section('title', 'Daftar Penjualan')
@section('content')
<div class="content">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Daftar Penjualan</h4>
                            <button type="button" class="btn btn-primary btn-round ml-auto text-white" id="createButton" data-toggle="modal" data-target="#createModal"><i class="fa fa-plus"></i> Tambah Penjualan</button>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('status')) <div class="alert alert-danger" role="alert">{{ session('status') }}</div> @endif
                        <div class="table-responsive">
                            <table id="table" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Tanggal</th>
                                        <th>Nomor Penjualan</th>
                                        <th>Akun Penjualan</th>
                                        <th>Akun Pembayaran</th>
                                        <th>Total</th>
                                        <th>Keterangan</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sales as $sale)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $sale['tanggal'] }}</td>
                                        <td>{{ $sale['nomor_penjualan'] }}</td>
                                        <td>{{ $sale['coa_detail']['nama_rincian_akun'] }}</td>
                                        <td>{{ $sale['coa_detail_payment']['nama_rincian_akun'] }}</td>
                                        <td>{{ $sale['total'] }}</td>
                                        <td>{{ $sale['keterangan'] }}</td>
                                        <td>
                                            <div class="form-button-action">
                                                <button type="button" name="show-detail" data-toggle="tooltip" id="{{ $sale['id'] }}" data-original-title="Show Detail" class="show-detail btn btn-default btn-sm">Detail</button>
                                                &nbsp;&nbsp;&nbsp;
                                                <button type="button" name="edit" data-toggle="tooltip" id="{{ $sale['id'] }}" data-original-title="Edit" class="edit btn btn-primary btn-sm">Edit</button>
                                                &nbsp;&nbsp;&nbsp;
                                                <button type="button" name="delete" data-toggle="tooltip" id="{{ $sale['id'] }}" data-original-title="Delete" class="delete btn btn-danger btn-sm">Delete</button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('user.transaction.sale.details-modal')
@include('user.transaction.sale.create-modal')
@include('user.transaction.sale.edit-modal')
@endsection
@section('content-scripts')
    @include('user.transaction.sale.scripts')
@endsection
