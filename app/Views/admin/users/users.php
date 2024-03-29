<?= $this->extend('admin/template/template'); ?>

<?= $this->section('users'); ?>
<div class="row">
<div class="col p-5">
	<h1>User's Log</h1>
	<strong style="color:red">Tet tot, admin jangan lupa untuk verifikasi akun baru ya</strong>
	<div id="viewdata"></div>
	<div id="viewmodal" style="display:none"></div>
	<p>
<table id="datatabel" class="table table-bordered table-striped pt-3" style="width:100%">
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
					<td><img src="<?= base_url('/img/users/avatar/' . $item['avatar']); ?>" width="100"></td>
					<td><?= $item['nama']?></td>
					<td><img src="/img/icons/<?= $item['status'] == 0 ? 'unverified' : 'verified' ?>.png" width="30"></td>
					<td>
						<a href="<?= base_url('/admin/users/' . $item['id']);?>" class="btn btn-success">Detail</a>
					</td>
				<?php } ?>
		</tbody>
	</table>
</div>	

</div>
<script>
	$(document).ready( function () {
		$('#datatabel').DataTable({
			dom: 'Bfrtip',
			buttons: [
            'csvHtml5',
        ]
		});
	} );
</script>
<?= $this->endSection(); ?>
