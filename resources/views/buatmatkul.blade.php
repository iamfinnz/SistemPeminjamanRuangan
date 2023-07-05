@extends('layouts.argon', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Buat Mata Kuliah'])
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Buat Mata Kuliah
                        <a href="{{ url('matakuliah') }}" class="btn btn-sm btn-outline-danger float-end">Kembali</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('create-matakuliah') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Nama Mata Kuliah</label>
                            <input type="text" name="nama_matkul" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>Nama Dosen Pengampu</label>
                            <input type="text" name="nama_dosen" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>Ruangan</label>
                            <input type="number" name="ruangan" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>Hari</label>
                            <input type="text" name="hari" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>Jam Mulai</label>
                            <select name="jam_mulai" class="form-control">
                                <option value="" selected disabled hidden>Pilih jam mulai mata kuliah</option>
                                <option value="07.00">07.00 WIB</option>
                                <option value="08.00">08.00 WIB</option>
                                <option value="09.00">09.00 WIB</option>
                                <option value="10.00">10.00 WIB</option>
                                <option value="11.00">11.00 WIB</option>
                                <option value="12.00">12.00 WIB</option>
                                <option value="13.00">13.00 WIB</option>
                                <option value="13.30">13.30 WIB</option>
                                <option value="14.00">14.00 WIB</option>
                                <option value="14.30">14.30 WIB</option>
                                <option value="15.00">15.00 WIB</option>
                                <option value="15.30">15.30 WIB</option>
                                <option value="16.00">16.00 WIB</option>
                                <option value="16.30">16.30 WIB</option>
                                <option value="17.00">17.00 WIB</option>
                                <option value="17.30">17.30 WIB</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label>Jam Selesai</label>
                            <select name="jam_selesai" class="form-control">
                                <option value="" selected disabled hidden>Pilih jam selesai mata kuliah</option>
                                <option value="08.00">08.00 WIB</option>
                                <option value="09.00">09.00 WIB</option>
                                <option value="10.00">10.00 WIB</option>
                                <option value="11.00">11.00 WIB</option>
                                <option value="12.00">12.00 WIB</option>
                                <option value="12.30">12.30 WIB</option>
                                <option value="13.00">13.00 WIB</option>
                                <option value="14.00">14.00 WIB</option>
                                <option value="14.30">14.30 WIB</option>
                                <option value="15.00">15.00 WIB</option>
                                <option value="15.30">15.30 WIB</option>
                                <option value="16.00">16.00 WIB</option>
                                <option value="16.30">16.30 WIB</option>
                                <option value="17.00">17.00 WIB</option>
                                <option value="17.30">17.30 WIB</option>
                                <option value="18.00">18.00 WIB</option>
                                <option value="18.30">18.30 WIB</option>
                            </select>
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