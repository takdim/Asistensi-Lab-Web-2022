<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>

    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <!-- CSS file -->
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <div class="container">
        <h1 class="mt-5 mb-5 text-center text-light">Daftar Mahasiswa</h1>

        <div class="btn-con mb-4 mt-3">
            <a href="/tambah" class="btn btn1 me-2"><i class="bi bi-plus-circle me-2"></i>Tambah data</a>
            {{-- <a href="logout.php" class="btn btn2"><i class="bi bi-box-arrow-left me-2"></i>Logout</a> --}}
        </div>

        <table class="table mt-2 table-light">
            <tr class="table-primary">
                <th scope="col">No.</th>
                <th scope="col">NIM</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Fakultas</th>
                <th scope="col"></th>
            </tr>

            @php
                $i = 1;
            @endphp
            @foreach ($data as $index=>$row)
                <tr>
                    <td scope="col">{{ $index + $data->firstItem() }}</td>
                    <td scope="col">{{ Str::upper($row->nim) }}</td>
                    <td scope="col">{{ $row->nama }}</td>
                    <td scope="col">{{ $row->alamat }}</td>
                    <td scope="col">{{ $row->fakultas }}</td>
                    <td scope="col" class="d-flex justify-content-center">
                        <a href="/edit/{{ $row->id }}">
                            <button type="button" class="btn btn-warning me-1">
                                <i class="bi bi-pencil-fill text-dark"></i>
                            </button>
                        </a>
                        <a href="#" class="hapus" data-id="{{ $row->id }}" data-nama="{{ $row->nama }}">
                            <button type="button" class="btn btn-danger ms-1">
                                <i class="bi bi-trash3-fill"></i>
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach

        </table>

        <div class="pagination my-5 d-flex justify-content-end">
            {{ $data->links() }}
        </div>

    </div>

    {{-- Sweet Alert --}}
    @include('sweetalert::alert')


    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    {{-- JQuery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js"
        integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>

    {{-- Sweet Alert 2 Javascript --}}
    <script src="sweetalert2.all.min.js"></script>

    {{-- Sweet Alert --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    {{-- My Script --}}
    <script>
        $('.hapus').click(function() {
            var idMahasiswa = $(this).attr('data-id');
            var namaMahasiswa = $(this).attr('data-nama');
            swal({
                    title: "Apakah kamu yakin?",
                    text: "Kamu akan menghapus data "+namaMahasiswa+" ",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/delete/"+idMahasiswa+"";
                    } else {
                        swal({
                            title: "Canceled",
                            text: "Batal menghapus data",
                            icon: "error",
                        })
                    }
                });
        });
    </script>

</body>

</html>
