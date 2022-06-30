<!--Main Navigation-->
<header>
  <!-- Sidebar -->
  <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
    <div class="position-sticky">
      <div class="list-group list-group-flush mx-3 mt-4">
        <a href="<?= base_url('/admin/users') ?>" class="list-group-item list-group-item-action py-2 ripple <?= ($page == 'users' ? 'active' : '') ?>" aria-current="true">
          <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>User's Account</span>
        </a>
        <a href="<?= base_url('/admin/reservation') ?>" class="list-group-item list-group-item-action py-2 ripple <?= ($page == 'reservation' ? 'active' : '') ?>"><i class="fas fa-users fa-fw me-3"></i><span>Reservation</span></a>
        <a href="<?= base_url('/admin/laboratorium') ?>" class="list-group-item list-group-item-action py-2 ripple <?= ($page == 'laboratorium' ? 'active' : '') ?>"><i class="fas fa-users fa-fw me-3"></i><span>Laboratorium</span></a>
        <a href="<?= base_url('/admin/facility') ?>" class="list-group-item list-group-item-action py-2 ripple <?= ($page == 'facility' ? 'active' : '') ?>"><i class="fas fa-users fa-fw me-3"></i><span>Facility</span></a>
      </div>
    </div>
  </nav>
  <!-- Sidebar -->

  <!-- Navbar -->
  <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
    <!-- Container wrapper -->
    <div class="container-fluid">
      <!-- Toggle button -->
      <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Brand -->
      <a class="navbar-brand" href="<?= base_url('/') ?>">
        <strong>Lab-or Admin Page</strong>
      </a>
      <!-- Search form -->


    </div>
    <!-- Container wrapper -->
  </nav>