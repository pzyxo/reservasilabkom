<?= $this->extend('admin/template/template'); ?>

<?= $this->section('users'); ?>
    <div class="container-fluid pt-2">
        <!-- Section: Main chart -->
        <section class="mb-4">
            <div class="card">
                <div class="card-header py-3">
                    <h5 class="mb-0 text-center"><strong>Detail <?= $item['email'] ?></strong></h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <table class="table table-striped">
                                <tr>
                                    <td>Nama</td>
                                    <td> <?= $item['nama'] ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td> <?= $item['email'] ?></td>
                                </tr>
                                <tr>
                                    <td>Civitas</td>
                                    <td> <?= $item['civitas'] ?></td>
                                </tr>
								<tr>
									<td>Telepon</td>
									<td> <?= $item['telepon'] ?></td>
								</tr>
								<tr>
									<td>Alamat</td>
									<td> <?= $item['alamat'] ?></td>
								</tr>
								<tr>
                                    <td>Status verifikasi</td>
                                    <td><img src="/img/icons/<?= $item['status'] == 0 ? 'unverified' : 'verified' ?>.png" width="30"></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-4">
                            
                            <div class="row mt-4">
                                <div class="row">
                                    <div class="col-md-8 offset-md-2 ">
                                        <img src="/img/users/avatar/<?= $item['avatar'] ?>" alt="" width="100%">
                                    </div>
                                </div>
								<?php
								if($item['status'] == '0'){
								?>
                                <div class="col-md-6"><a href="#" class="btn btn-success btn-block">Verify</a></div>
								<?php } ?>
                                <div class="col-md-6"><a href="#" class="btn btn-danger btn-block">Cancel</a></div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </section>
        <!-- Section: Main chart -->

    </div>
<?= $this->endSection(); ?>
