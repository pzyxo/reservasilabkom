<div class="modal fade pt-5" id="editmodal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Tambah User</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="user" id="form" action="users/update/<?= $id ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                    <?= csrf_field() ?>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="nd" class="form-label">Nama Depan</label>
                            <input type="text" id="nd" name="namadepan" class="form-control form-control-user" placeholder="<?= $nama_depan ?>" value="<?= $nama_depan ?>" />
                            <div class="invalid-feedback" id="errornd"></div>
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="nb" class="form-label">Nama Belakang</label>
                            <input type="text" id="nb" name="namabelakang" class="form-control form-control-user" placeholder="<?= $nama_belakang ?>" value="<?= $nama_belakang ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="em" class="form-label">Email</label>
                        <input type="email" id="em" name="email" class="form-control" placeholder="<?= $email ?>" value="<?= $email ?>" />
                        <div class="invalid-feedback" id="errorem"></div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="pw" class="form-label">Password</label>
                            <input type="password" id="pw" name="password" class="form-control" placeholder="Password" />
                            <div class="invalid-feedback" id="errorpw"></div>
                        </div>
                        <input type="hidden" id="passlama" name="passlama" value="<?= $password ?>" />
                        <input type="hidden" id="avalama" name="avalama" value="<?= $avatar ?>" />
                    </div>

                    <div class="form-group">
                        <label for="civitas" class="form-label">Civitas</label>
                        <select name="civitas" id="civitas" class="form-control" value="<?= $civitas ?>">
                            <option value="UNS">UNS</option>
                            <option value="non-UNS">NON-UNS</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="nb" class="form-label">Alamat</label>
                            <input type="text" class="form-control form-control-user" name="alamat" id="al" placeholder="<?= $alamat ?>" value="<?= $alamat ?>" >
                        </div>
                        <div class="col-sm-6">
                            <label for="nb" class="form-label">Telepon</label>
                            <input type="text" id="tp" name="telepon" class="form-control form-control-user" placeholder="<?= $telepon ?>" value="<?= $telepon ?>" />
                            <div class="invalid-feedback" id="errortp"></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="nb" class="form-label">Foto Profil</label>
                                <input type="file" id="pp" name="avatar" class="form-control" value="<?= $avatar ?>" />
                                <div class="invalid-feedback" id="errorpp"></div>
                            </div>

                        </div>

                    </div>
                    <button type="submit" id="submit" class="btn btn-primary btn-user btn-block">
                        Update Account
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
<<script>
    $(document).ready(function() {
        $('#form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: $(this).attr('method'),
                url: $(this).attr('action'),
                data: new FormData(this),
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#submit').attr('disable', 'disabled');
                    $('#submit').html('<i class="fa fa-spin fa-spinner"></i>');
                },
                complete: function() {
                    $('#submit').removeAttr('disable');
                    $('#submit').html('Update Data');
                },
                success: function(response) {
                    if (response.error) {
                        if (response.error.namadepan) {
                            $('#nd').addClass('is-invalid');
                            $('#errornd').html(response.error.namadepan);
                        } else {
                            $('#nd').removeClass('is-invalid');
                            $('#errornd').html('');
                        }

                        if (response.error.namabelakang) {
                            $('#nb').addClass('is-invalid');
                            $('#errornb').html(response.error.namabelakang);
                        } else {
                            $('#nb').removeClass('is-invalid');
                            $('#errornb').html('');
                        }
                    } else {
                        Swal.fire({
                                title: 'Berhasil!',
                                text: 'Data berhasil diupdate',
                                icon: 'success',
                                confirmButton: 'Ok'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location = '<?= base_url('/profile') ?>';
                                }
                            })
                    }
                }
            });
        });
    });
</script>

</html>