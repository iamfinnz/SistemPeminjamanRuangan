<DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!--   CSS Datatables   -->
        <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
        <!--   CSS Toastr   -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>
            Peminjaman | SPR Politeknik Caltex Riau
        </title>
        <style>
            .status {
                color: #ffc700;
                padding-top: 8px;
                margin-right: 10px;
            }
        </style>
    </head>

    </html>
    @extends('layouts.argon', ['class' => 'g-sidenav-show bg-gray-100'])

    @section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Data Peminjaman Ruangan'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h5>Tabel Peminjaman Ruangan</h5>
                    </div>
                    <div class="card-header">
                        <a class="btn btn-primary" href="{{ url('create-peminjaman') }}">Tambah</a>
                        <a class="btn btn-success float-end" href="{{ url('export-pdf') }}">Export PDF</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive table-bordered align-items-center mb-0" id="tb_peminjaman">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">ID</th>
                                    <th style="text-align: center;">Nama</th>
                                    <th style="text-align: center;">NIM</th>
                                    <th style="text-align: center;">Program Studi</th>
                                    <th style="text-align: center;">Ruangan</th>
                                    <th style="text-align: center;">Tanggal</th>
                                    <th style="text-align: center;">Jam Mulai</th>
                                    <th style="text-align: center;">Jam Selesai</th>
                                    <th style="text-align: center;">Fasilitas</th>
                                    <th style="text-align: center;">Status</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: center;">
                                @php $i=1; @endphp
                                @forelse ($peminjaman as $key => $item)
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
                                    <td style="display: flex;">
                                        @if($item['pengajuanDiterima'] === true)
                                        <a class="status">Diterima</a>
                                        @elseif($item['pengajuanDiterima'] === false)
                                        <a></a>
                                        @else
                                        <a>Data tidak valid</a>
                                        @endif

                                        @if($item['pengembalianDiterima'] === true)
                                        <a style="color: #2dce89; padding-top:8px">Selesai</a>
                                        @elseif($item['pengembalianDiterima'] === false)
                                        <div class="dropdown" style="margin-left: 10px;">
                                            <a href="" class="btn bg-gradient-primary dropdown-toggle " data-bs-toggle="dropdown" id="navbarDropdownMenu">Pengembalian
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenu">
                                                <li>
                                                    <a class="dropdown-item" href="{{ url('terima-pengembalian/'.$key) }}">Sudah</a>
                                                </li>
                                            </ul>
                                        </div>
                                        @else
                                        <a>Data tidak valid</a>
                                        @endif
                                        <a href="{{ url('delete-peminjaman/'.$key) }}" class="btn btn-sm btn-danger" style="margin-left: 10px;">Hapus</a>
                                    </td>
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
                            let table = new DataTable('#tb_peminjaman');
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
        @endsection