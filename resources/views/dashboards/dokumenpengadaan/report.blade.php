<!-- generate page report dokumen pengadaan for pdf template-->
<html>
<head>
    <title>Report Dokumen Pengadaan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 5px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <!-- add image logo here -->
    <img src="{{ public_path('assets/img/CW.png') }}" alt="Logo" width="100">
    <hr>
    <h2>Report Dokumen Pengadaan</h2>
    <p>Semua dokumen pengadaan akan ditampilkan di sini.</p>
    <hr>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Aset</th>
                <th>Tahun Perolehan</th>
                <th>Download</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($semua_dokumen as $dokumen)
                <tr>
                    <td style="text-align: center;">{{ $no++ }}</td>
                    <td>
                        <ul>
                            @foreach ($dokumen as $dok)
                                <li>{{ $dok['nama_barang'] }} - {{ $dok['kode_aset'] }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <ul>
                            @foreach ($dokumen as $dok)
                                <li>{{ $dok['tahun_perolehan'] }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <ul>
                            <a href="{{ url('storage/'.$dok['dokumen_uploaded_path']) }}" class="btn btn-primary" download>Download</a>
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>