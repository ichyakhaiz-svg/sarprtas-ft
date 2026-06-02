<!DOCTYPE html>
<html>
<head>

    <title>Laporan Barang</title>

    <style>

        body{
            font-family: sans-serif;
        }

        table{
            width:100%;
            border-collapse: collapse;
            margin-top:20px;
        }

        table, th, td{
            border:1px solid #000;
        }

        th{
            background:#2563eb;
            color:white;
            padding:10px;
        }

        td{
            padding:8px;
            font-size:12px;
        }

        h1{
            text-align:center;
        }

    </style>

</head>

<body>

<h1>
    Laporan Inventaris Barang
</h1>

<table>

    <thead>

        <tr>

            <th>No</th>
            <th>Kode</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Jumlah</th>
            <th>Lokasi</th>
            <th>Status</th>

        </tr>

    </thead>

    <tbody>

        @foreach($barang as $item)

        <tr>

            <td>
                {{ $loop->iteration }}
            </td>

            <td>
                {{ $item->kode }}
            </td>

            <td>
                {{ $item->nama }}
            </td>

            <td>
                {{ $item->kategori->nama ?? '-' }}
            </td>

            <td>
                {{ $item->jumlah }}
            </td>

            <td>
                {{ $item->lokasi->nama ?? '-' }}
            </td>

            <td>
                {{ $item->status }}
            </td>

        </tr>

        @endforeach

    </tbody>

</table>

</body>
</html>