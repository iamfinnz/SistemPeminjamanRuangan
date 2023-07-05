@extends('layouts.argon', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Tambah Akun Staf BAAK'])
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>Tambah Akun Staf BAAK
                        <a href="{{ url('home') }}" class="btn btn-sm btn-outline-danger float-end">Kembali</a>
                    </h5>
                </div>
                <div class="card-body">
                    <form role="form" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Nama</label>
                            <input type="text" id="name" name="name" class="form-control form-control-lg @error('name') is-invalid @enderror" value="{{ old('name') }}" aria-label="Nama" required autocomplete="name" autofocus>
                            @error('name') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Email</label>
                            <input type="email" id="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" value="{{ old('email') }}" aria-label="Email" required autocomplete="email" autofocus>
                            @error('email') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Password</label>
                            <input type="password" id="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror" aria-label="Password" required autocomplete="new-password">
                            @error('password') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Confirm Password</label>
                            <input type="password" id="password-confirm" name="password_confirmation" class="form-control form-control-lg" aria-label="Conform Password" required autocomplete="new-password">
                            @error('password') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                        </div>
                        <div class="form-group mt-5 text-center">
                            <button type="submit" class="btn btn-lg btn-primary">Tambah Akun</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection