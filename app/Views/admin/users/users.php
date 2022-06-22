<?= $this->extend('admin/template/template'); ?>

<?= $this->section('users'); ?>
<div class="row">
<div class="col p-5">
	<h1>User's Log</h1>
	<strong style="color:red">Tet tot, admin jangan lupa untuk verifikasi akun baru ya</strong>
	<div id="viewdata"></div>
	<div id="viewmodal" style="display:none"></div>
	<p>
<table id="datatabel" class="table table-bordered table-striped">
		<thead>
		    <tr>
			    <th>No</th>
				<th>Avatar</th>
				<th>Nama</th>
				<th>Status</th>
				<th>Detail</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 1;
			foreach ($list as $item) { ?>
				<tr>
				    <td><?= $no++; ?></td>
					<td><img src="/img/users/avatar/<?= $item['avatar'] ?>" width="200"></td>
					<td><?= $item['nama']?></td>
					<td><img src="/img/icons/<?= $item['status'] == 0 ? 'unverified' : 'verified' ?>.png" width="30"></td>
					<td>
						<a href="<?= base_url('users/' . $item['email']);?>" class="btn btn-success">Detail</a>
					</td>
				<?php } ?>
		</tbody>
	</table>
    <script>
        $('#tambah').click(function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?= base_url('/admin/form') ?>",
            dataType: "json",
            success: function(response) {
                $('#viewmodal').html(response.data).show();
                $('#anggotamodal').modal('show');
            }
            });
        });

        $(document).ready(function(){
                $('#datatabel').DataTable();
        });
    </script>
</div>	

</div>
<?= $this->endSection(); ?>
<script>
	$(document).ready(function(){
		tampilkan();
	});
</script>