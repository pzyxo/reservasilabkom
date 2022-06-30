<?= $this->extend('admin/template/template'); ?>

<?= $this->section('reservation'); ?>
<div class="row">
	<div class="col p-5">
		<h1>Reservation's Log</h1>
		<p>
		<table id="datatable" class="table table-bordered table-striped pt-3" style="width:100%">
			<thead>
				<tr>
					<th>No</th>
					<th>Pemesan</th>
					<th>Laboratorium</th>
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
						<td><?= $item['userID'] ?></td>
						<td><?= $item['labID'] == '1' ? 'RPL' : ($item['labID'] == '2' ? 'Multimedia' : ($item['labID'] == '3' ? 'Jaringan' : '')) ?></td>
						<td><img src="/img/icons/<?= $item['statusReservasi'] == 0 ? 'unverified' : 'verified' ?>.png" width="30"></td>
						<td>
							<a href="<?= base_url('admin/reservation/' . $item['id']) ?>" class="btn btn-success">Detail</a>
						</td>
					<?php } ?>
			</tbody>
		</table>
	</div>

</div>
<script>
	$(document).ready(function() {
		$('#datatable').DataTable();
	});
</script>
<?= $this->endSection(); ?>