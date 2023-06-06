@extends('layouts.argon', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Buat Pengajuan Ruangan'])
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Buat Pengajuan Ruangan
                        <a href="{{ url('home') }}" class="btn btn-sm btn-outline-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('create-pengajuan') }}" method="POST">
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
                            <label>Program Studi</label>
                            <select name="prodi" class="form-control">
                                <option value="" selected disabled hidden>Pilih program studi</option>
                                <option value="Akuntansi Perpajakan">Akuntansi Perpajakan</option>
                                <option value="Sistem Informasi">Sistem Informasi</option>
                                <option value="Teknik Elektronika Telekomunikasi">Teknik Elektronika Telekomunikasi</option>
                                <option value="Teknik Informatika">Teknik Informatika</option>
                                <option value="Teknik Listrik">Teknik Listrik</option>
                                <option value="Teknik Mesin">Teknik Mesin</option>
                                <option value="Teknologi Rekayasa Jaringan Telekomunikasi">Teknologi Rekayasa Jaringan Telekomunikasi</option>
                                <option value="Teknologi Rekayasa Komputer">Teknologi Rekayasa Komputer</option>
                                <option value="Teknologi Rekayasa Mekatronika">Teknologi Rekayasa Mekatronika</option>
                                <option value="Teknologi Rekayasa Sistem Elektronika">Teknologi Rekayasa Sistem Elektronika</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label>Ruangan</label>
                            <input type="number" name="ruangan" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>Jam Mulai</label>
                            <select name="jam_mulai" class="form-control">
                                <option value="" selected disabled hidden>Pilih jam mulai pengajuan</option>
                                <option value="07.00">07.00 WIB</option>
                                <option value="08.00">08.00 WIB</option>
                                <option value="09.00">09.00 WIB</option>
                                <option value="10.00">10.00 WIB</option>
                                <option value="11.00">11.00 WIB</option>
                                <option value="12.00">12.00 WIB</option>
                                <option value="13.00">13.00 WIB</option>
                                <option value="14.00">14.00 WIB</option>
                                <option value="15.00">15.00 WIB</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label>Jam Selesai</label>
                            <select name="jam_selesai" class="form-control">
                                <option value="" selected disabled hidden>Pilih jam selesai pengajuan</option>
                                <option value="08.00">08.00 WIB</option>
                                <option value="09.00">09.00 WIB</option>
                                <option value="10.00">10.00 WIB</option>
                                <option value="11.00">11.00 WIB</option>
                                <option value="12.00">12.00 WIB</option>
                                <option value="13.00">13.00 WIB</option>
                                <option value="14.00">14.00 WIB</option>
                                <option value="15.00">15.00 WIB</option>
                                <option value="16.00">16.00 WIB</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label>Fasilitas</label>
                            <select name="fasilitas" class="form-control">
                                <option value="" selected disabled hidden>Pilih Fasilitas yang diperlukan</option>
                                <option value="Remote TV">Remote TV</option>
                                <option value="Remote AC">Remote AC</option>
                            </select>
                        </div>
                        <div class="form-group mt-5 text-center">
                            <button type="submit" class="btn btn-lg btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection