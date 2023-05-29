<?= $this->extend('users/template/template'); ?>

<?= $this->section('about'); ?>
<style>
  b {
    color: white;
  }

  .dropdown-divider {
    display: none;
  }

  @media (max-width: 576px) {
    .dropdown-divider {
      display: block;
    }
  }

  @media (min-width: 768px) {
    .infoo {
      padding: 5% 15%;
    }
  }
</style>

<body class="about">
  <br>
  <div class="container infoo" style="border: 3px solid white; border-radius: 25px; background-image: url(images/cafe.png);">
    <div class="desc">
      <div class="row justify-content-center">
        <center>
          Looking for a <b>perfect</b> place for your activity?</center>
      </div>
      <div class="row justify-content-center">
        <center>
          With <b>comfort</b> zone?</center>
      </div>
      <div class="row justify-content-center">
        <center>
          And <b>good</b> facilities?</center>
      </div>
    </div>
  </div>
  <br>
  <div class="container" style="padding-top: 5%; padding-bottom: 5%;">
    <div class="bout-cafe">
      <center>
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 col-sm-12" style="text-align: left;">
            <center>
              <h1>About Us</h1>
            </center>
            LAB-OR merupakan saran yang dimiliki Universitas Sebelas Maret yang digunakan untuk menunjang pembelajara mahasiswa uns terkhusus dibidang teknologi informasi dan komunikasi. LAB-OR menyediakan tempat dan fasilitas bagi mahasiswa dan civitas dari Universitas Sebelas Maret maupun pihak diluar instansi UNS yang membutuhkan tempat dan fasilitas yang ada di lab-or guna mengadakan kelas, melakukan aktivitas praktikum, mengembangkan software, maupun uji kelayakan. Untuk dapat melakukan reservasi, lakukanlah pembuatan akun pada kolom regigstrasi. Untuk info lebih lanjut dapat hubungi kontak yang tertera pada halaman contact.
            <div class="dropdown-divider"></div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-12">
            <h1>Location</h1>
            <br>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.693697966512!2d110.63843781449788!3d-7.608271977314759!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a6a120a42c17f%3A0xb16e521f7d3beebb!2sJl.%20Slank%2C%20Ponggok%2C%20Kec.%20Polanharjo%2C%20Kabupaten%20Klaten%2C%20Jawa%20Tengah%2057474!5e0!3m2!1sid!2sid!4v1608426568164!5m2!1sid!2sid" width="300" height="250" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            <div class="dropdown-divider"></div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-12">
            <br>
            <br>
            <img src="images/icon/logo.png" class="img-fluid" width="70%">
          </div>
        </div>
      </center>
    </div>
  </div>
  <br>


</body>
<?= $this->endSection() ?>