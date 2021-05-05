@extends('layouts.app')
@section('title', 'Daftar User')
@section('content')
<div class="content">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Daftar User</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('status')) <div class="alert alert-danger" role="alert">{{ session('status') }}</div> @endif
                        <div class="table-responsive">
                            <table id="table" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Admin</th>
                                        <th>Banned</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user['name'] }}</td>
                                        <td>{{ $user['email'] }}</td>
                                        <td>{{ $user['is_admin'] == 1 ? 'Yes' : 'No' }}</td>
                                        <td>{{ $user['is_banned'] == 1 ? 'Yes' : 'No' }}</td>
                                        <td>
                                            <div class="form-button-action">
                                                @if ($user['is_admin'] != 1)
                                                    <button type="button" name="make-admin" data-toggle="tooltip" id="{{ $user['id'] }}" data-original-title="Make Admin" class="make-admin btn btn-primary btn-sm">Make Admin</button>
                                                @elseif ($user['is_admin'] == 1)
                                                    <button type="button" name="remove-admin" data-toggle="tooltip" id="{{ $user['id'] }}" data-original-title="Remove Admin" class="remove-admin btn btn-secondary btn-sm">Remove Admin</button>
                                                @endif
                                                &nbsp;&nbsp;&nbsp;
                                                @if ($user['is_banned'] != 1)
                                                    <button type="button" name="ban-user" data-toggle="tooltip" id="{{ $user['id'] }}" data-original-title="Ban User" class="ban-user btn btn-danger btn-sm">Ban User</button>
                                                @elseif ($user['is_banned'] == 1)
                                                    <button type="button" name="unban-user" data-toggle="tooltip" id="{{ $user['id'] }}" data-original-title="Unban User" class="unban-user btn btn-warning btn-sm">Unban User</button>
                                                @endif
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
@endsection
@section('content-scripts')
    @include('admin.master-data.user.scripts')
@endsection
