<div class="modal fade pt-3" id="jadwalmodal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true" style="width:100%">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Jadwal yang sudah terisi</h5>
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
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($list as $item) { ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $item['tanggal_reservasi'] ?> : <?= $item['time_start'] ?> - <?= $item['time_end'] ?></td>
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
                                                                            echo "check";
                                                                            break;
                                                                        default:
                                                                            echo "canceled";
                                                                    }
                                                                    ?>.png" width="30"></td>
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