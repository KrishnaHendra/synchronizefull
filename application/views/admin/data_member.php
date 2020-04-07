<div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Data Member Synchronize</h4>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <a href="<?= base_url('admin/member/cetak') ?>" class="btn btn-info btn-sm col-md-12 mb-3" target="_blank"><i class="fa fa-file"></i> PRINT DATA</a>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th>Nama</th>
                                                <th class="text-center">Email</th>
                                                <th class="text-center">Telepon</th>
                                                <th class="text-center">Tanggal Lahir</th>
                                                <th class="text-center">Tanggal Daftar</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; foreach($member as $m):?>
                                            <tr>
                                                <td class="text-center"><?= $no++ ?></td>
                                                <td><?= $m['nama_user'] ?></td>
                                                <td class="text-center"><?= $m['email'] ?></td>
                                                <td class="text-center"><?= $m['telepon'] ?></td>
                                                <td class="text-center"><?= $m['tgl_lahir'] ?></td>
                                                <td class="text-center"><?= date('d M Y', $m['created_at']) ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>