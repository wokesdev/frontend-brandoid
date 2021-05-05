@extends('layouts.app')
@section('title', 'Daftar Pengeluaran Kas')
@section('content')
<div class="content">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Daftar Penerimaan Kas</h4>
                            <button type="button" class="btn btn-primary btn-round ml-auto text-white" id="createButton" data-toggle="modal" data-target="#createModal"><i class="fa fa-plus"></i> Tambah Penerimaan Kas</button>
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
                                        <th>Nomor Nota</th>
                                        <th>Akun Penerimaan Kas</th>
                                        <th>Nominal</th>
                                        <th>Keterangan</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cashReceipts as $cashReceipt)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $cashReceipt['tanggal'] }}</td>
                                        <td>{{ $cashReceipt['nomor_nota'] }}</td>
                                        <td>{{ $cashReceipt['coa_detail']['nama_rincian_akun'] }}</td>
                                        <td>{{ $cashReceipt['nominal'] }}</td>
                                        <td>{{ $cashReceipt['keterangan'] }}</td>
                                        <td>
                                            <div class="form-button-action">
                                                <button type="button" name="edit" data-toggle="tooltip" id="{{ $cashReceipt['id'] }}" data-original-title="Edit" class="edit btn btn-primary btn-sm">Edit</button>
                                                &nbsp;&nbsp;&nbsp;
                                                <button type="button" name="delete" data-toggle="tooltip" id="{{ $cashReceipt['id'] }}" data-original-title="Delete" class="delete btn btn-danger btn-sm">Delete</button>
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
@include('user.transaction.cash-receipt.create-modal')
@include('user.transaction.cash-receipt.edit-modal')
@endsection
@section('content-scripts')
    @include('user.transaction.cash-receipt.scripts')
@endsection
