<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="<?= $base ?>assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="<?= $base ?>assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= $base ?>assets/js/jquery/jquery.min.js"></script>
</head>

<body>
    <main class="container">
        <div class="py-5 text-center">
            <h2>Tambah Biodata</h2>
        </div>
        <style>
            .btn-data {
                padding: 8px 26px;
            }
        </style>
        <div class="row g-5">
            <div class="col-md-12 col-lg-12">
                <form action="<?= $base ?>biodata/add_aksi" method="post">
                    <div class="col-6">
                        <div class="col">
                            <label for="nim" class="form-label">NIM</label>
                            <input oninvalid="this.setCustomValidity('Mohon isi dulu..')" oninput="setCustomValidity('')" type="text" class="form-control" id="nim" name="nim" placeholder="nim" required>
                        </div>
                        <div class="col">
                            <label for="tgl" class="form-label">Tanggal Lahir</label>
                            <input oninvalid="this.setCustomValidity('Mohon isi dulu..')" oninput="setCustomValidity('')" type="date" class="form-control" id="tgl" name="tgl" placeholder="tgl" required>
                        </div>
                        <div class="col">
                            <label for="nama" class="form-label">Nama Mahasiswa</label>
                            <input oninvalid="this.setCustomValidity('Mohon isi dulu..')" oninput="setCustomValidity('')" type="text" class="form-control" id="nama" name="nama" placeholder="nama" required>
                        </div>
                        <div class="col">
                            <label for="jurusan" class="form-label">Jurusan</label>
                            <select class="form-control" name="jurusan" id="jurusan">
                                <option hidden>Pilih</option>
                                <?php
                                foreach ($jurusan as $val) : ?>
                                    <option value="<?= $val->id_jurusan ?>"><?= $val->nama_jurusan ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="col">
                            <label for="pembimbing" class="form-label">Pembimbing Akademik</label>
                            <select class="form-control" name="pembimbing" id="pembimbing">
                                <option hidden>Pilih</option>
                                <?php
                                foreach ($pembimbing as $val) : ?>
                                    <option value="<?= $val->id_pa ?>"><?= $val->nama_pa ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="col">
                            <label for="biaya" class="form-label">Biaya Kuliah</label>
                            <input oninvalid="this.setCustomValidity('Mohon isi dulu..')" oninput="setCustomValidity('')" type="number" class="form-control" id="biaya" name="biaya" placeholder="biaya" required>
                        </div>
                    </div>
                    <hr class="my-4">
                    <button id="simpan" class="w-20 btn btn-primary btn-lg btn-data" name="submit" type="submit">Simpan</button>
                    <a class="w-20 btn btn-danger btn-lg" href="<?= $base ?>">Batal</a>
                </form>
            </div>
        </div>
    </main>
</body>

</html>