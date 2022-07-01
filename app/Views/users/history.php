<div class="modal fade pt-3" id="reservationmodal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true" style="width:100%">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Riwayat Pemesanan</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col p-5 table-responsive">
                        <table id="datatable" class="table table-bordered table-striped pt-3 table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal dan Waktu</th>
                                    <th>Laboratorium</th>
                                    <th>Status</th>
                                    <th>Biaya</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($list as $item) { ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $item['tanggal_reservasi'] ?> : <?= $item['time_start'] ?>-<?= $item['time_end'] ?></td>
                                        <td><?= $item['labID'] == '1' ? 'RPL' : ($item['labID'] == '2' ? 'Multimedia' : ($item['labID'] == '3' ? 'Jaringan' : '')) ?></td>
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
													?>.png" width="30"></td><td>Rp. <?= $item['biaya'] ?></td>
                                        <td style="width:25%">
                                            <div class="row justify-content-center">
                                                <div class="col-lg-5 col-md-12 col-sm-12">
                                                <a href="<?= base_url('admin/' . $item['userID']) ?>" class="btn btn-primary">Selesai</a>
                                            </div><div class="col-lg-5 col-md-12 col-sm-12">
                                                <a href="<?= base_url('admin/' . $item['userID']) ?>" class="btn btn-danger">Batalkan</a>
                                            </div></div>
                                        </td>
                                    <?php } ?>
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
            <script>
                $(document).ready(function() {
                    $('#datatable').DataTable();
                });
            </script>
        </div>
    </div>
</div>
</div>

</body>

</html>