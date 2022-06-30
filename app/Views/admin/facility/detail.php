<?= $this->extend('admin/template/template'); ?>

<?= $this->section('users'); ?>
<div class="container-fluid pt-2">
    <!-- Section: Main chart -->
    <section class="mb-4">
        <div class="card">
            <div class="card-header py-3">
                <h5 class="mb-0 text-center"><strong>Reservasi <?= $item['userID'] ?></strong></h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <table class="table table-striped">
                            <?php if (session()->getFlashdata('suksesreservasi') != '') { ?>
                                <div class="alert alert-success" role="alert">
                                    <?= session()->getFlashdata('suksesreservasi'); ?>
                                </div>
                            <?php } ?>
                            <tr>
                                <td>ID Reservasi</td>
                                <td> <?= $item['id'] ?></td>
                            </tr>
                            <tr>
                                <td>Email Pemesan</td>
                                <td> <?= $item['userID'] ?></td>
                            </tr>
                            <tr>
                                <td>Civitas</td>
                                <td> <?= $item['civitas'] ?></td>
                            </tr>
                            <tr>
                                <td>Laboratorium</td>
                                <td><?= $item['labID'] == '1' ? 'RPL' : ($item['labID'] == '2' ? 'Multimedia' : ($item['labID'] == '3' ? 'Jaringan' : '')) ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Reservasi</td>
                                <td> <?= $item['tanggal_reservasi'] ?></td>
                            </tr>
                            <tr>
                                <td>Waktu Mulai Reservasi</td>
                                <td> <?= $item['time_start'] ?></td>
                            </tr>
                            <tr>
                                <td>Waktu Selesai Reservasi</td>
                                <td> <?= $item['time_end'] ?></td>
                            </tr>
                            <tr>
                                <td>Fasilitas</td>
                                <td> <?= $item['fasilitas'] ?></td>
                            </tr>
                            <tr>
                                <td>Status verifikasi</td>
                                <td><img src="/img/icons/<?php
													$status = $item['statusReservasi'];

													switch ($status) {
														case 0:
															echo "pending";
															break;
														case 1:
															echo "checked";
															break;
														case 2:
															echo "canceled";
															break;
														default:
															echo "check";
													}
													?>.png" width="30"></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-4">

                        <div class="row mt-4">
                            <?php
                            if ($item['statusReservasi'] == '0') {
                            ?>
                                <div class="col-md-6"><a href="<?= base_url('/admin/reservation/accept/' . $item['id']) ?>" class="btn btn-success btn-block">Verify</a></div>
                            <?php } ?>
                            <div class="col-md-6"><a href="<?= base_url('/admin/reservation/cancel/' . $item['id']) ?>" class="btn btn-danger btn-block">Cancel</a></div>
                            <div class="col-md-6"><a href="<?= base_url('/admin/reservation/finish/' . $item['id']) ?>" class="btn btn-primary btn-block">Finish</a></div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
    <!-- Section: Main chart -->

</div>
<?= $this->endSection(); ?>