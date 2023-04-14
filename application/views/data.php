<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>www.rechmand.id</title>
	<link href="<?= $base ?>assets/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="<?= $base ?>assets/dist/js/bootstrap.bundle.min.js"></script>
	<script src="<?= $base ?>assets/js/jquery/jquery.min.js"></script>
</head>

<body>
	<main class="container">
		<meta charset="utf-8">
		<h2 class="list-inline-item">Biodata Mahasiswa</h2>
		<h4 class=" list-inline-item col-form-label">@ By Rechmand</h4>
		<div id="container">
			<a href="<?= $base ?>biodata/add"><button class="btn btn-primary mb-2">Tambah</button></a>
			<div class="table-responsive w-100">
				<table class="table table-striped table-sm" border="1">
					<thead>
						<tr class="bg-dark text-white">
							<th scope="col">No.</th>
							<th scope="col">NIM</th>
							<th scope="col">Tanggal</th>
							<th scope="col">Nama Mahasiswa</th>
							<th scope="col">Program Studi</th>
							<th scope="col">PA</th>
							<th scope="col">Biaya Kuliah</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($biodata as $vdata) :
						?>
							<tr>
								<td class="pt-2"><?= $no++ ?></td>
								<td class="pt-2"><?= $vdata->nim ?></td>
								<td class="pt-2"><?= $vdata->tanggal_lahir ?></td>
								<td class="pt-2"><?= $vdata->nama_mahasiswa ?></td>
								<td class="pt-2"><?= $vdata->nama_jurusan ?></td>
								<td class="pt-2"><?= $vdata->nama_pa ?></td>
								<td class="pt-2"><?= $vdata->biaya_kuliah ?></td>
								<td>
									<a href="biodata/edit/<?= $vdata->nim ?>">
										<button class="btn btn-primary">Edit</button></a>
									<a href="biodata/delete/<?= $vdata->nim ?>">
										<button class="btn btn-outline-danger">Delete</button></a>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
					<h1 class='display-1 alert-item-get p-5 <?= $get ? null : 'd-none' ?> alert-success text-center text-capitalize'>Data berhasil disimpan</h1>
					<h1 class='display-1 alert-item-del p-5 <?= $del ? null : 'd-none' ?> alert-danger text-center text-capitalize'>Data berhasil dihapus</h1>
				</table>
				<script>
					setTimeout(() => {
						$('.alert-item-get').slideUp()
						$('.alert-item-del').slideToggle()
						setTimeout(() => {
							$('.alert-item-get').addClass('d-none')
							$('.alert-item-del').addClass('d-none')
						}, 500);
					}, 1500);
				</script>
			</div>
		</div>
	</main>
</body>

</html>