<?= $this->extend('users/template/template'); ?>

<?= $this->section('profile'); ?>

<body class="about">
    <section class="mb-4 mt-4">

        <div class="card">
            <div class="card-header py-3">
                <h5 class="mb-0 text-center"><strong>Hello, <?= $item['nama'] ?></strong></h5>
            </div>
            <div class="card-body">
                <div id="viewmodal"></div>
                <div class="row">
                    <div class="col-md-8">
                        <table class="table">
                            <tr>
                                <td>Nama</td>
                                <td><?= $item['nama'] ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><?= $item['email'] ?></td>
                            </tr>
                            <tr>
                                <td>Telepon</td>
                                <td><?= $item['telepon'] ?></td>
                            </tr>
                            <tr>
                                <td>Civitas</td>
                                <td><?= $item['civitas'] ?></td>
                            </tr>
                            <tr>
                                <td>Status verifikasi</td>
                                <td><img src="/img/icons/<?= $item['status'] == 0 ? 'unverified' : 'verified' ?>.png" width="30"></td>
                            </tr>
                            <?php if ($item['status'] == 0) { ?>
                                <div class="alert alert-danger" role="alert">
                                    Proses verifikasi membutuhkan waktu maksimal 1x24 jam. Mohon ditunggu
                                </div>
                            <?php } ?>
                            <tr>
                                <td>Terdaftar Sejak</td>
                                <td><?= $item['created_at'] ?></td>
                            </tr>
                            <tr>
                                <td><a class="btn btn-dark btn-sm" href="/signout">Sign Out</a></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-4 justify-content-center">
                        <div class="row">
                            <div class="col-md-8">
                                <img style="width: 200px;" src="/img/users/avatar/<?= $item['avatar'] ?>" alt="">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <a href="#" id="edit" onclick="edit('<?= $item['email'] ?>')" class="btn btn-info btn-block">Edit</a>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <a href="#" id="reservation" onclick="reservation('<?= $item['email'] ?>')" class="btn btn-success btn-block">Riwayat</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<script>
    function edit(email) {
        $.ajax({
            url: "<?= base_url('/users/form/') ?>/" + email,
            dataType: "json",
            success: function(response) {
                $('#viewmodal').html(response.data).show();
                $('#editmodal').modal('show');
            }
        });
    }
    function reservation(email) {
        $.ajax({
            url: "<?= base_url('/users/reservation/') ?>/" + email,
            dataType: "json",
            success: function(response) {
                $('#viewmodal').html(response.data).show();
                $('#reservationmodal').modal('show');
            }
        });
    }
</script>


<?= $this->endSection(); ?>