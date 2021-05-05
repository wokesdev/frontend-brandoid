@extends('layouts.app')
@section('title', 'Daftar Jurnal Umum')
@section('content')
<div class="content">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Daftar Jurnal Umum</h4>
                            <div class="row ml-auto">
                                <button type="button" class="btn btn-primary btn-round ml-auto text-white" id="createButton" data-toggle="modal" data-target="#createModal"><i class="fa fa-plus"></i> Tambah Jurnal Umum</button>
                                <br>
                                <button type="button" class="btn btn-primary btn-round ml-auto text-white" id="filterButton" data-toggle="modal" data-target="#printModal"><i class="fa fa-print"></i> Cetak Jurnal Umum</button>
                            </div>
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
                                        <th>Nomor Transaksi</th>
                                        <th>Keterangan</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($generalEntries as $generalEntry)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $generalEntry['tanggal'] }}</td>
                                        <td>{{ $generalEntry['nomor_transaksi'] }}</td>
                                        <td>{{ $generalEntry['keterangan'] }}</td>
                                        <td>
                                            <div class="form-button-action">
                                                <button type="button" name="show-detail" data-toggle="tooltip" id="{{ $generalEntry['id'] }}" data-original-title="Show Detail" class="show-detail btn btn-default btn-sm">Detail</button>
                                                &nbsp;&nbsp;&nbsp;
                                                <button type="button" name="edit" data-toggle="tooltip" id="{{ $generalEntry['id'] }}" data-original-title="Edit" class="edit btn btn-primary btn-sm">Edit</button>
                                                &nbsp;&nbsp;&nbsp;
                                                <button type="button" name="delete" data-toggle="tooltip" id="{{ $generalEntry['id'] }}" data-original-title="Delete" class="delete btn btn-danger btn-sm">Delete</button>
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
@include('user.report.general-entry.details-modal')
@include('user.report.general-entry.create-modal')
@include('user.report.general-entry.edit-modal')
@include('user.report.general-entry.print-modal')
@endsection
@section('content-scripts')
    @include('user.report.general-entry.scripts')
@endsection
