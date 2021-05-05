@extends('layouts.app')
@section('title', 'Daftar Akun')
@section('content')
<div class="content">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Daftar Akun</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('status')) <div class="alert alert-danger" role="alert">{{ session('status') }}</div> @endif
                        <div class="table-responsive">
                            <table id="table" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nomor Akun</th>
                                        <th>Nama Akun</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($coas as $coa)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $coa['nomor_akun'] }}</td>
                                        <td>{{ $coa['nama_akun'] }}</td>
                                        <td>
                                            <div class="form-button-action">
                                                <button type="button" name="show-detail" data-toggle="tooltip" id="{{ $coa['id'] }}" data-original-title="Show Details" class="show-detail btn btn-default btn-sm">Show Details</button>
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
@include('user.master-data.account.details-modal')
@endsection
@section('content-scripts')
    @include('user.master-data.account.scripts')
@endsection
