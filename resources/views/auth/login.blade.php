@extends('layouts.guest')
@section('content')
<section class="h-100">
    <div class="container h-100">
        <div class="row justify-content-md-center h-100">
            <div class="card-wrapper">
                <div class="brand"></div>
                <div class="card fat">
                    <div class="card-body">
                        <h4 class="card-title">Login</h4>
                        @if (session('status')) <div class="alert alert-danger" role="alert">{{ session('status') }}</div> @endif
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Alamat Email" name="email" value="{{ old('email') }}" autocomplete="email" tabindex="1" autofocus required>
                                @error('email') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password" autocomplete="current-password" tabindex="2" required>
                                @error('password') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                            </div>
                            <div class="form-group m-0"><button type="submit" class="btn btn-primary btn-block" tabindex="4">Login</button></div>
                            <br>
                            <a href="{{ route('register') }}" class="d-flex justify-content-center">Registrasi?</a>
                        </form>
                    </div>
                </div>
                <x-footer></x-footer>
            </div>
        </div>
    </div>
</section>
@endsection
