<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>

    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <!-- CSS file -->
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/style3.css">
</head>

<body>
    <div class="cont">
        <h1 class="mt-5 mb-5 text-center text-light">Edit Data Mahasiswa</h1>
        <form action="/update/{{ $data->id }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim" value="{{ $data->nim }}">
            </div>

            <div class="form-group">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $data->nama }}">
            </div>

            <div class="form-group">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $data->alamat }}">
            </div>

            <div class="form-group">
                <label for="fakultas" class="col-sm-2 col-form-label">Fakultas</label>
                <select class="form-control" name="fakultas" id="fakultas">
                    <option value="{{ $data->fakultas }}">{{ $data->fakultas }}</option>
                    <option value="Matematika dan Ilmu Pengetahuan Alam">Matematika dan Ilmu Pengetahuan Alam</option>
                    <option value="Hukum">Hukum</option>
                    <option value="Kedokteran">Kedokteran</option>
                    <option value="Kedokteran Gigi">Kedokteran Gigi</option>
                    <option value="Ekonomi dan Bisnis">Ekonomi dan Bisnis</option>
                    <option value="Teknik">Teknik</option>
                    <option value="Ilmu Sosial dan Politik">Ilmu Sosial dan Politik</option>
                    <option value="Ilmu Budaya">Ilmu Budaya</option>
                    <option value="Peternakan">Peternakan</option>
                    <option value="Pertanian">Pertanian</option>
                    <option value="Kesehatan Masyarakat">Kesehatan Masyarakat</option>
                    <option value="Ilmu Kelautan dan Perikanan">Ilmu Kelautan dan Perikanan</option>
                    <option value="Kehutanan">Kehutanan</option>
                    <option value="Farmasi">Farmasi</option>
                    <option value="Keperawatan">Keperawatan</option>
                </select>
            </div>
            <button class="btn w-100 mt-5 mb-5" type="submit">Edit data</button>
        </form>
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
