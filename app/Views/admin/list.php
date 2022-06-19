
<p>
<table id="datatabel" class="table table-bordered table-striped">
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
					<td><?= $item['labID'] == '1' ? 'RPL' : ( $item['labID'] == '2' ? 'Multimedia' : ( $item['labID'] == '3' ? 'Jaringan' : '' ) ) ?></td>
					<td><img src="/img/icons/<?= $item['statusReservasi'] == 0 ? 'unverified' : 'verified' ?>.png" width="30"></td>
					<td>
						<a href="<?= base_url('admin/' . $item['userID']);?>" class="btn btn-success">Detail</a>
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