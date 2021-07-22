<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
    <title>Print Mahasiswa</title>
</head>
    <body>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Mahasiswa</th>
                                <th>NPM Mahasiswa</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>NIK</th>
                                <th>NPWP</th>
                                <th>No.Telp</th>
                                <th>Email</th>
                                <th>Tahun Lulus</th>
                                <th>Program Studi</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($items as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->nama_mahasiswa}}</td>
                                        <td>{{ $item->npm_mahasiswa}}</td>
                                        <td>{{ $item->tempat_lahir_mahasiswa}}</td>
                                        <td>{{ date('d-m-Y', strtotime($item->tgl_lahir_mahasiswa))}}</td>
                                        <td>{{ $item->nik_mahasiswa}}</td>
                                        <td>{{ $item->npwp_mahasiswa}}</td>
                                        <td>{{ $item->no_telp_mahasiswa}}</td>
                                        <td>{{ $item->email_mahasiswa}}</td>
                                        <td>{{ $item->tahun_lulus}}</td>
                                        <td>{{ $item->program_studi}}</td>
                                    </tr>
                                @endforeach
                        </tbody>
                    </table>
    </body>
</html>
