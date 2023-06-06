@extends('layouts.argon', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Tambah Akun'])
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Akun Staff BAAK
                        <a href="" class="btn btn-sm btn-outline-danger float-end">Kembali</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>NIM</label>
                            <input type="number" name="nim" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>Ruangan</label>
                            <input type="number" name="ruangan" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" class="form-control">
                        </div>
                        <div class="form-group mt-5 text-center">
                            <button type="submit" class="btn btn-lg btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection