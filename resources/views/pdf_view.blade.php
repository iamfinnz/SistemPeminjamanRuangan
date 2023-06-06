<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Data Peminjaman Ruangan Politeknik Caltex Riau</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <center>
        <h1>Data Peminjaman Ruangan</h1>
        <h2>Politeknik Caltex Riau</h2>
    </center>
    <br />
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Program Studi</th>
                <th>Ruangan</th>
                <th>Tanggal</th>
                <th>Jam Mulai </th>
                <th>Jam Selesai</th>
                <th>Fasilitas</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1; @endphp
            @foreach($data as $item)
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
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>