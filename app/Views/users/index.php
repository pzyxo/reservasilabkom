<?= $this->extend('users/template/template'); ?>

<?= $this->section('index'); ?>
<body class="index">
    <style>
      b {
        color: white;
      }
    </style>
    <div id="demo" class="carousel slide " data-ride="carousel">
        <ul class="carousel-indicators">
          <li data-target="#demo" data-slide-to="0" class="active"></li>
          <li data-target="#demo" data-slide-to="1"></li>
          <li data-target="#demo" data-slide-to="2"></li>
        </ul>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/img-rpl.jpg" alt="cafe1">
            <div class="carousel-caption">
              <h3>Comfy Place</h3>
              <p>We serve best place to relax</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="img/img-tkj.jpg" alt="cafe2">
            <div class="carousel-caption">
              <h3>Fast Internet</h3>
              <p>For you who look for speed and stable</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="img/lab-mulmed.jpg" alt="cafe3">
            <div class="carousel-caption">
              <h3>Best Computers</h3>
              <p>With the best computers we can serve</p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
          <span class="carousel-control-next-icon"></span>
        </a>
      </div>
    </body>
      <?= $this->endSection(); ?>