@extends('layouts.app')
@section('title', 'Daftar Barang')
@section('content')
<div class="content">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Daftar Barang</h4>
                            <button type="button" class="btn btn-primary btn-round ml-auto text-white" id="createButton" data-toggle="modal" data-target="#createModal"><i class="fa fa-plus"></i> Tambah Barang</button>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('status')) <div class="alert alert-danger" role="alert">{{ session('status') }}</div> @endif
                        <div class="table-responsive">
                            <table id="table" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Barang</th>
                                        <th>Kode Barang</th>
                                        <th>Harga Beli (umum)</th>
                                        <th>Harga Jual (umum)</th>
                                        <th>Stok</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item['nama_barang'] }}</td>
                                        <td>{{ $item['kode_barang'] }}</td>
                                        <td>{{ $item['harga_beli'] }}</td>
                                        <td>{{ $item['harga_jual'] }}</td>
                                        <td>{{ $item['stok'] }}</td>
                                        <td>
                                            <div class="form-button-action">
                                                <button type="button" name="edit" data-toggle="tooltip" id="{{ $item['id'] }}" data-original-title="Edit" class="edit btn btn-primary btn-sm">Edit</button>
                                                &nbsp;&nbsp;&nbsp;
                                                <button type="button" name="delete" data-toggle="tooltip" id="{{ $item['id'] }}" data-original-title="Delete" class="delete btn btn-danger btn-sm">Delete</button>
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
@include('user.master-data.item.create-modal')
@include('user.master-data.item.edit-modal')
@endsection
@section('content-scripts')
    @include('user.master-data.item.scripts')
@endsection
