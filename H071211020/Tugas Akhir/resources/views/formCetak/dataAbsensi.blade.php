<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Absensi Data</title>
    <style>
        body {}
        table {
            border-collapse: collapse;
            width: 100%;
        }
        table,
        th,
        td {
            border: 1px solid #000000;
            text-align: center;
        }
        th {
            background-color: 	#000000;
            text-align: center;
            color: aliceblue;
        }
        td {}
        br {
            margin-bottom: 5px !important;
        }
        .judul {
            text-align: center;
        }
        .header {
            margin-bottom: 0px;
            text-align: center;
            height: 150px;
            padding: 0px;
        }
        .pemko {
            width: 100px;
        }
        .logo {
            float: left;
            margin-right: 0px;
            width: 15%;
            padding: 0px;
            text-align: right;
        }
        .headtext {
            float: right;
            margin-left: 0px;
            width: 75%;
            padding-left: 0px;
            padding-right: 10%;
        }
        hr {
            margin-top: 10%;
            height: 3px;
            background-color: black;
        }
        .ttd {
            margin-left: 70%;
            text-align: center;
            text-transform: uppercase;
        }
        .text-center{
            text-align:center;
        }
    </style>
</head>

<body>
   <div class="text-center">
   <img src="admin/img/logo_ut.png" width="100" />
   </div>

    <div class="container">
        <div class="isi">
            <h2 style="text-align:center; text-transform:uppercase;">LAPORAN DATA ABSENSI <br> PERTEMUAN {{$data->pertemuan}} - {{carbon\carbon::parse($data->tanggal)->translatedFormat('d F Y')}} </h2>
            <br>            
            <table class="table table-bordered table-striped mb-0" id="datatable-default">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama Siswa</th>
                                    <th class="text-center">NRP</th>
                                    <th class="text-center">Jam Absen</th>
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data->absensi as $d)
                                <tr>
                                    <td class="text-center">{{$loop->iteration}}</td>
                                    <td class="text-center">{{$d->user->nama}}</td>
                                    <td class="text-center">{{$d->user->nrp}}</td>
                                    <td class="text-center">{{carbon\carbon::parse($d->created_at)->format('H:i:s')}}
                                    </td>
                                    <td class="text-center">
                                        @if($d->status == 0)
                                        <span class="badge badge-warning">Belum diverifikasi</span>
                                        @else
                                        <span class="badge badge-success">Sudah diverifikasi</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
            <br>
            <br>
            <div class="ttd">
                <h5 style="margin:0px;">
                    <p style="margin:0px;">Banjarbaru, {{$tgl}}</p>
                </h5>
                <h5  style="margin:0px;">Kepala Sekolah</h5>
                <br>
                <br>
                <h5 style="text-decoration:underline; margin:0px;">{{$kepsek->kepsek}}</h5>
            </div>
        </div>
    </div>
</body>
</html>