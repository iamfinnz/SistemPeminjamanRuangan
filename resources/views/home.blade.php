<DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>
            Dashboard | SPR Politeknik Caltex Riau
        </title>
    </head>

    </html>
    @extends('layouts.argon', ['class' => 'g-sidenav-show bg-gray-100'])

    @section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Data Pengajuan'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Pengajuan</p>
                                    <h5 class="font-weight-bolder mt-3">
                                        {{ $total_pengajuan }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-danger text-center rounded-circle">
                                    <i class="fa fa-dashboard text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Peminjaman</p>
                                    <h5 class="font-weight-bolder mt-3">
                                        {{ $total_peminjaman }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-secondary text-center rounded-circle">
                                    <i class="fa fa-ticket text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Tabel Pengajuan</h6>
                    </div>
                    <!--
                    <div class="card-header">
                        <a class="btn btn-primary" href="{{ url('create-pengajuan') }}">Tambah</a>
                    </div> -->
                    <div class="card-body">
                        <table class="table table-responsive align-items-center mb-0" id="tb_pengajuan">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>NIM</th>
                                    <th>Program Studi</th>
                                    <th>Ruangan</th>
                                    <th>Tanggal</th>
                                    <th>Jam Mulai</th>
                                    <th>Jam Selesai</th>
                                    <th>Fasilitas</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=1; @endphp
                                @forelse ($pengajuan as $key => $item)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $item['nama'] }}</td>
                                    <td>{{ $item['nim'] }}</td>
                                    <td>{{ $item['prodi'] }}</td>
                                    <td>{{ $item['ruangan'] }}</td>
                                    <td>{{ $item['tanggal'] }}</td>
                                    <td>{{ $item['jmulai'] }}</td>
                                    <td>{{ $item['jselesai'] }}</td>
                                    <td>{{ $item['fasilitas'] }}</td>
                                    <td><a href="{{ url('peminjaman/'.$key) }}" class="btn btn-sm btn-success">Terima</a></td>
                                    <td><a href="{{ url('home/'.$key) }}" class="btn btn-sm btn-danger">Tolak</a></td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7">No Record Found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
                        <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
                        <script>
                            let table = new DataTable('#tb_pengajuan');
                        </script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                        <script>
                            @if(Session::has('status'))
                            toastr.success("{{ Session::get('status') }}")
                            @endif
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection