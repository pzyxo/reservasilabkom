<?= $this->extend('user/template/template'); ?>

<?= $this->section('home'); ?>
    <!-- Background image -->
    <div id="intro" class="bg-image shadow-2-strong">
      <div class="mask" style="background-color: rgba(0, 0, 0, 0.8);">
        <div class="container d-flex align-items-center justify-content-center text-center h-100">
          <div class="text-white">
            <h1 class="mb-3">Lab-or</h1>
            <h5 class="mb-4">Your trusted laboratorium reservation</h5>
            <a class="btn btn-outline-light btn-lg m-2" href="#takealook" role="button">Take A Look</a>
            <a class="btn btn-outline-light btn-lg m-2" href="/admin/users" target="_blank"
              role="button">Explore</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Background image -->
<div id="takealook"></div>
  <main class="mt-5">
    <div class="container">
      <!--Section: Content-->
      <section>
        <div class="row">
          <div class="col-md-6 gx-5 mb-4">
            <div class="bg-image hover-overlay ripple shadow-2-strong" data-mdb-ripple-color="light">
              <img src="https://mdbootstrap.com/img/new/slides/031.jpg" class="img-fluid" />
              <a href="#!">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
              </a>
            </div>
          </div>

          <div class="col-md-6 gx-5 mb-4">
            <h4><strong>High Spec Computer</strong></h4>
            <p class="text-muted">
              Laboratorium komputer kami dibekali dengan komputer berspesifikasi tinggi, dengan memadukan processor kelas atas dari Intel dan Graphic Card kelas atas dari Nvidia. Semua storage sudah menggunakan SSD NVME PCIE gen 4 yang memiliki kecepatan baca dan tulis yang cepat.
            </p>
            <p><strong>Comfortable Place</strong></p>
            <p class="text-muted">
              Dibekali juga dengan tempat yang nyaman untuk melakukan kegiatan belajar mengajar, ataupun untuk meeting dan workshop.
            </p>
          </div>
        </div>
      </section>
      <!--Section: Content-->

      <hr class="my-5" />

      <!--Section: Content-->
      <section class="text-center">
        <h4 class="mb-5"><strong>Laboratorium yang tersedia</strong></h4>

        <div class="row">
          <div class="col-lg-4 col-md-12 mb-4">
            <div class="card">
              <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img src="/img/img-rpl.jpg" class="img-fluid" />
                <a href="#!">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
              </div>
              <div class="card-body">
                <h5 class="card-title">Software Engineering</h5>
                <p class="card-text">
                  Some quick example text to build on the card title and make up the bulk of the
                  card's content.
                </p>
                <a href="#!" class="btn btn-primary">Button</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
              <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img src="/img/img-tkj.jpg" class="img-fluid" />
                <a href="#!">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
              </div>
              <div class="card-body">
                <h5 class="card-title">Networking</h5>
                <p class="card-text">
                  Some quick example text to build on the card title and make up the bulk of the
                  card's content.
                </p>
                <a href="#!" class="btn btn-primary">Button</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
              <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img src="/img/lab-mulmed.jpg" class="img-fluid" />
                <a href="#!">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
              </div>
              <div class="card-body">
                <h5 class="card-title">Multimedia</h5>
                <p class="card-text">
                  Some quick example text to build on the card title and make up the bulk of the
                  card's content.
                </p>
                <a href="#!" class="btn btn-primary">Button</a>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--Section: Content-->
      <div class="" id="signin"></div>
      <hr class="my-5" />

      <!--Section: Content-->
      

      <!--Section: Content-->
    </div>
  </main>
  <?= $this->endSection(); ?>