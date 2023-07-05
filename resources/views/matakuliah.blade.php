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
            Mata Kuliah | SPR Politeknik Caltex Riau
        </title>
    </head>

    </html>
    @extends('layouts.argon', ['class' => 'g-sidenav-show bg-gray-100'])

    @section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Data Mata Kuliah PCR'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h5>Tabel Mata Kuliah</h5>
                    </div>
                    <div class="card-header">
                        <form method="POST" action="{{ route('process_excel') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="excel_file" accept=".xlsx, .xls">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </form>
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive table-bordered align-items-center mb-0" id="tb_matakuliah">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">ID</th>
                                    <th style="text-align: center;">Mata Kuliah</th>
                                    <th style="text-align: center;">Dosen</th>
                                    <th style="text-align: center;">Ruangan</th>
                                    <th style="text-align: center;">Hari</th>
                                    <th style="text-align: center;">Jam Mulai</th>
                                    <th style="text-align: center;">Jam Selesai</th>
                                    <th style="text-align: center;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: center;">
                                @php $i=1; @endphp
                                @forelse ($matakuliah as $key => $item)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $item['1'] }}</td>
                                    <td>{{ $item['2'] }}</td>
                                    <td>{{ $item['3'] }}</td>
                                    <td>{{ $item['4'] }}</td>
                                    <td>{{ $item['5'] }}</td>
                                    <td>{{ $item['6'] }}</td>
                                    <td><a href="{{ url('edit-matakuliah/'.$key) }}" class="btn btn-sm btn-secondary">Edit</a>
                                        <a href="{{ url('delete-matakuliah/'.$key) }}" class="btn btn-sm btn-danger">Hapus</a>
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
                            let table = new DataTable('#tb_matakuliah');
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