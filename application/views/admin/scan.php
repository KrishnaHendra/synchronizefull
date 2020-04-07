<div class="col-lg-12">
	<?= $this->session->flashdata('notif'); ?>
	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="col-md-12">
					<div class="card-title">
						<h4>Scan Ticket</h4>
					</div>
				</div>
			</div>
			<div class="row mt-3 mb-3" align="center">
				<div class="col-md-6">
					<div class="panel-heading">
						<div class="navbar-form navbar-right">
							<select class="form-control" id="camera-select"></select>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<button title="Decode Image" class="btn btn-default btn-sm" id="decode-img" type="button"
							data-toggle="tooltip"><i class="fa fa-upload"></i></button>
						<button title="Image shoot" class="btn btn-info btn-sm disabled" id="grab-img" type="button"
							data-toggle="tooltip"><i class="fa fa-image"></i></button>
						<button title="Play" class="btn btn-success btn-sm" id="play" type="button"
							data-toggle="tooltip"><i class="fa fa-play"></i></button>
						<button title="Pause" class="btn btn-warning btn-sm" id="pause" type="button"
							data-toggle="tooltip"><i class="fa fa-pause"></i></button>
						<button title="Stop streams" class="btn btn-danger btn-sm" id="stop" type="button"
							data-toggle="tooltip"><i class="fa fa-stop"></i></button>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="row" align="center">
						<div class="col-md-6">
							<div class="well" style="position: relative;display: inline-block;">
								<canvas width="320" height="240" id="webcodecam-canvas"></canvas>
								<div class="scanner-laser laser-rightBottom" style="opacity: 0.5;"></div>
								<div class="scanner-laser laser-rightTop" style="opacity: 0.5;"></div>
								<div class="scanner-laser laser-leftBottom" style="opacity: 0.5;"></div>
								<div class="scanner-laser laser-leftTop" style="opacity: 0.5;"></div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="thumbnail" id="result">
								<div class="well" style="overflow: hidden;">
									<img width="320" height="240" id="scanned-img" src="">
								</div>
								<div class="caption">
									<h3>Scanned result</h3>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card-title">
				<h4>Transaksi Masuk</h4>
			</div>
			<div class="table-responsive">
			<table class="table table-hover">
					<thead>
						<tr style="background-color: #324cdd; color:white;">
							<th class="text-center">#</th>
							<th class="text-center">Nama</th>
							<th class="text-center">Qty</th>
							<th class="text-center">Status</th>
							<th class="text-center">Tanggal</th>
							<th class="text-center">Edit</th>

						</tr>
					</thead>
					<tbody>

						<?php $no=1; foreach($transaksi as $a): ?>
						<tr>
							<th class="text-center"><?= $no++; ?></th>
							<td class="text-center"><?= $a['nama_user']; ?></td>
							<td class="text-center"><?= $a['qty'] ?></td>
							<td class="text-center">
								<?php if($a['status']=='PROSES'){?>
								<a href="" class="btn btn-sm btn-success font-weight-bold"><i class="fa fa-fw fa-recycle"></i> <?= $a['status'] ?></a>
								<?php } else { ?>
								<a href="" class="btn btn-sm btn-info"><i class="fa fa-check"></i> <?= $a['status'] ?></a>
								<?php } ?>
							</td>
							<td class="text-center"><?= date('d M Y',$a['tanggal'] ) ?></td>
							<td class="text-center">
							<?php if($a['status']=='PROSES'){?>
								<a href="" class="btn btn-sm btn-dark" style="color: white;" data-toggle="modal" data-target="#exampleModal<?= $a['id_transaksi'] ?>"><i class="fa fa-edit"></i></a>
								<?php } else { ?>
									<a href="" class="btn btn-sm btn-primary" style="color: white;"><i class="fa fa-check-circle" data-toggle="tooltip" title="Transaksi Selesai"></i></a>
									<?php } ?>
							</td>
						</tr>
						<?php endforeach; ?>

					</tbody>
				</table>
			</div>

		</div>
	</div>
	<!-- /# card -->
</div>


<!-- MODAL UPDATE -->
<?php foreach ($transaksi as $a): ?>
<div class="modal fade" id="exampleModal<?= $a['id_transaksi'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header bg-dark">
				<h5 class="modal-title" id="exampleModalLabel"  style="color:white">Ubah Status Pembelian</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?=base_url('admin/transaksi/update')?>" method="post">
				<input type="hidden" value="<?= $a['id_transaksi'] ?>" name="id">
				<input type="hidden" value="<?= $a['tanggal'] ?>" name="tanggal">
					<i class="fa fa-user btn btn-light font-weight-bold btn-sm btn-block"> Nama Pembeli</i>
					<input type="text" name="nama" class="form-control text-center font-weight-bold" value="<?= $a['nama_user'] ?>" required><br>
					<i class="fa fa-ticket btn btn-light font-weight-bold btn-sm btn-block"> Jumlah Tiket</i>
					<input type="text" name="jumlah" class="form-control text-center font-weight-bold" value="<?= $a['qty'] ?>" required><br>
					<i class="fa fa-lock btn btn-light font-weight-bold btn-sm btn-block"> Tanggal</i>
					<input type="text" name="tgl" class="form-control text-center font-weight-bold" value="<?= date('d M Y',$a['tanggal']) ?>" required><br>
					<i class="fa fa-lock btn btn-info font-weight-bold btn-sm btn-block"> Status</i>
					<select name="status" class="form-control btn-light">
						<option value="SELESAI">SELESAI</option>
					</select>
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-dark">Ubah</button>
			</div>
			</form>
		</div>
	</div>
</div>
<?php endforeach; ?>
<!-- END MODAL UPDATE -->

<script type="text/javascript" src="<?= base_url(); ?>assets/qr/js/data-tables.js"></script>
<script>
	var table = new DataTable("table");
</script>

<script type="text/javascript" src="<?= base_url(); ?>assets/qr/js/filereader.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/qr/js/qrcodelib.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/qr/js/webcodecamjs.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/qr/js/main.js"></script>
