<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Lab-or - Because we all are</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
  <!-- MDB -->
  <link rel="stylesheet" href="/admin/css/mdb.min.css" />
  <!-- Custom styles -->
  <link rel="stylesheet" href="/admin/css/admin.css" />
  <link rel="stylesheet" href="/admin/datatables/datatables.min.css" />
  <link rel="stylesheet" href="/admin/datatables/jquery.dataTables.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw=="
    crossorigin="anonymous"></script>
</head>

<body>
  <?= $this->include('admin/template/nav'); ?>
  <!--Main layout-->
  <main style="margin-top: 58px">
  <?= $this->renderSection('home'); ?>
  <?= $this->renderSection('users'); ?>
  <?= $this->renderSection('reservation'); ?>
  </main>
  <!--Main layout-->  
    <!-- Navbar -->
  </header>
  <!--Main Navigation-->
  <!-- MDB -->
  <script type="text/javascript" src="/admin/js/mdb.min.js"></script>
  <!-- Custom scripts -->
  <script type="text/javascript" src="/admin/js/admin.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="/admin/datatables/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="/admin/datatables/datatables.min.js"></script>
<script>
  	function tampilkanReservation(){
      $.ajax({
        url: "<?= base_url('/admin/data') ?>",
        dataType: "json",
        success: function(response){
          $('#viewdatares').html(response.data);
          }
      });
	  }
    function tampilkan(){
			$.ajax({
				url: "<?= base_url('/user/data') ?>",
				dataType: "json",
				success: function(response){
					$('#viewdata').html(response.data);
				}
			});
		}
    <script>
    $(document).ready(function(){
        tampilkanReservation();
    });
</script>
</script>
</body>

</html>