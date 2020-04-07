<?= $this->session->flashdata('notif'); ?>
<div class="card col-12">

	<h3 class="mt-3 card-tittle">Data Event</h3>

	<div class="row">
		<div class="col-12">

			<p class="text-muted">Data event Synchronize Event Organizer</p>
			<div class="mb-3">
				<form class="" action="<?php echo base_url(); ?>index.php/admin/data_event/show/" method="post">
					<div class="form-group row">
						<div class="col-sm-5">
							<select class="form-control" name="status">
                <option value="">Pilih</option>
								<option value="aktif">Event Saat Ini</option>
								<option value="selesai">History Event</option>
							</select>
						</div>
						<div class="col-sm-3">
							<input type="submit" value="Show" class="btn btn-lg btn-primary">
						</div>
					</div>
				</form>
			</div>
			<div class="row">
				<?php foreach ($event as $e) { ?>
				<div class="col-md-5 col-lg-3">
					<div class="card" style="height: 500px;">
						<img src="<?php echo base_url('/assets/img/logo/'.$e->logo_event) ?>" height="180px" />
						<div class="card-body">
							<h6 class="card-title text-center"><b><?php echo $e->nama_event ?></b></h6>

							<p class="card-text text-center">Status : <a href="#" class=" text-primary"><?= $e->status ?></a></p>
							<p class="card-text text-left"><?php echo $e->venue ?></p>
							<p class="card-text text-left"><?php echo $e->tanggal ?></p>
							<a href="" class="btn btn-sm btn-block btn-light text-center" data-toggle="modal"
								data-target="#ubah_data<?= $e->id_event; ?>"><i
									class="fa fa-fw fa-info-circle"></i><b> Info </b> </a>
							<a href="" class="btn btn-sm btn-block btn-danger text-center" data-toggle="modal" data-target="#hapus_data">Hapus</a>
						</div>
					</div>
				</div>
				<?php } ?>



			</div>
		</div>
	</div>
</div>
<button class="btn btn-block btn-info sweet-success" data-toggle="modal" data-target="#tambah_data"><i
		class="fa fa-fw fa-plus-circle"></i> Guest Star</button>
<!-- MODAL TAMBAH GS -->
<div id="tambah_data" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
	aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalCenterTitle"><i class="fa fa-fw fa-star"></i> Tambah Data Guest
					Star</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?php echo form_open("index.php/admin/guest_star/tambah", array('enctype'=>'multipart/form-data')); ?>
				<h5 class="mb-3 text-danger">* Penambahan data ini akan ditampilkan sesuai dengan jumlah data di halaman
					web</h5>
					<div class="form-group row">
						<label for="inputPassword" class="col-sm-2 col-form-label">Full Name <b
								class="text-danger">*</b></label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="nama_guest">
						</div>
					</div>
					<input type="hidden" name="status_gs" value="aktif">
				<div class="form-group row">
					<label for="inputPassword" class="col-sm-2 col-form-label">Event <b
							class="text-danger">*</b></label>
					<div class="col-sm-10">
						<select class="form-control" name="id_event">
							<option value="">---PILIH---</option>
							<?php foreach ($event as $e) { ?>
								<option value="<?= $e->id_event ?>"><?= $e->nama_event; ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label for="inputPassword" class="col-sm-2 col-form-label">Genre <b
							class="text-danger">*</b></label>
					<div class="col-sm-10">
						<select class="form-control" name="genre" id="genre">
							<option value="">---PILIH---</option>
							<option value="jazz">JAZZ</option>
							<option value="orchestra">ORCHESTRA</option>
							<option value="dangdut">DANGDUT</option>
							<option value="pop">POP</option>
							<option value="indie">INDIE</option>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label for="inputPassword" class="col-sm-2 col-form-label">Gambar <b
							class="text-danger">*</b></label>
					<div class="col-sm-10">
						<input type="file" class="form-control" name="gambar">
					</div>
				</div>
				<div class="form-group row">
					<label for="exampleFormControlTextarea1" class="col-sm-2">Deskripsi <b
							class="text-warning">*</b></label>
					<div class="col-sm-10">
						<textarea name="deskripsi" class="form-control" id="exampleFormControlTextarea1"
							rows="3"></textarea>
					</div>
				</div>
				<input type="submit" class="btn btn-danger btn-block" name="submit" value="SIMPAN">


				<?php echo form_close(); ?>

			</div>
		</div>
	</div>
</div>
<!-- END MODAL -->
