<?= $this->extend('users/template/template'); ?>

<?= $this->section('explore'); ?>
<body class="about mb-5">
    <div class="container dish-view">
		<ul class="nav nav-pills nav-fill" id="pills-tab" role="tablist">
      <li class="nav-item" role="presentation">
        <a class="nav-link active" id="pills-beverages-tab" data-toggle="pill" href="#pills-beverages" role="tab" aria-controls="pills-beverages" aria-selected="true">Laboratorium</a>
      </li>
      <li class="nav-item" role="presentation">
        <a class="nav-link" id="pills-drinks-tab" data-toggle="pill" href="#pills-drinks" role="tab" aria-controls="pills-drinks" aria-selected="false">Facility</a>
      </li>
      <li class="nav-item" role="presentation">
        <a class="nav-link" id="pills-others-tab" data-toggle="pill" href="#pills-others" role="tab" aria-controls="pills-others" aria-selected="false">Reserve</a>
      </li>
    </ul>
    <br>
    <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade show active" id="pills-beverages" role="tabpanel" aria-labelledby="pills-beverages-tab">
        <div class="container" style="padding-top: 2%; border: 3px solid white;border-radius: 25px;">
          <center>
            <div class="row" style="margin: 1%;">
              <div class="col-lg-4 col-md-6 col-sm-12">
                  <h3 class="feature-title"><br>Software's Engineering</h3>
                  <div class="wrapper">
                    <div class="zoom-effect">
                      <div class="kotak">
                        <img src="img/img-rpl-square.jpg" class="img-fluid" />
                      </div>
                    </div>
                  </div>
                  <br>
                  <p>Dilengkapi dengan CPU intel i7 series terbaru dan graphics card NVIDIA RTX 3050 untuk mendukung pengguna dalam mengembangkan software baik web design, game dan aplikasi desktop.</p>
                  <div class="dropdown-divider"></div>
    
              </div>
              <div class="col-lg-4 col-md-6 col-sm-12">
                  <h3 class="feature-title"><br>Multimedia</h3>
                  <div class="wrapper">
                    <div class="zoom-effect">
                      <div class="kotak">
                        <img src="img/lab-mulmed-square.jpg" class="img-fluid" />
                      </div>
                    </div>
                  </div>
                  <br>
                  <p>Dilengkapi dengan kamera, microphone, lighting, <i>greenscreen</i> dan peralatan lainnya untuk mendukung produktivitas pengguna dalam membuat konten foto dan video</p>
                  <div class="dropdown-divider"></div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-12">
                <h3 class="feature-title"><br>Networking</h3>
                <div class="wrapper">
                  <div class="zoom-effect">
                    <div class="kotak">
                      <img src="img/img-tkj-square.jpg" class="img-fluid" />
                    </div>
                  </div>
                </div>
                <br>
                <p>Dilengkapi dengan komputer dengan processor intel Xeon untuk pengelolaan server yang optimal, disertai dengan perangkat jaringan lain seperti mikrotik, router dan switch untuk simulasi jaringan</p>
                <div class="dropdown-divider"></div>
            </div>
        </center>
        </div>
      </div>
      <div class="tab-pane fade" id="pills-drinks" role="tabpanel" aria-labelledby="pills-drinks-tab">
        <div class="container" style="padding-top: 2%; border: 3px solid white;border-radius: 25px;">
          <center>
            <div class="row" style="margin: 1%;">
              <div class="col-lg-4 col-md-6 col-sm-12">
                  <h3 class="feature-title"><br>Coffee Latte</h3>
                  <div class="wrapper">
                    <div class="zoom-effect">
                      <div class="kotak">
                        <img src="images/foto/drinks1.jpg" class="img-fluid" />
                      </div>
                    </div>
                  </div>
                  <br>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                      Quisque interdum quam odio, quis placerat ante luctus eu. Sed aliquet dolor id sapien
                      rutrum, id vulputate quam iaculis</p>
                      <div class="dropdown-divider"></div>
    
              </div>
              <div class="col-lg-4 col-md-6 col-sm-12">
                  <h3 class="feature-title"><br>Robusta Coffee</h3>
                  <div class="wrapper">
                    <div class="zoom-effect">
                      <div class="kotak">
                        <img src="images/foto/drinks2.jpg" class="img-fluid" />
                      </div>
                    </div>
                  </div>
                  <br>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                      Quisque interdum quam odio, quis placerat ante luctus eu. Sed aliquet dolor id sapien
                      rutrum, id vulputate quam iaculis</p>
                      <div class="dropdown-divider"></div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-12">
                <h3 class="feature-title"><br>Dalgona Coffee</h3>
                <div class="wrapper">
                  <div class="zoom-effect">
                    <div class="kotak">
                      <img src="images/foto/drinks3.jpg" class="img-fluid" />
                    </div>
                  </div>
                </div>
                <br>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Quisque interdum quam odio, quis placerat ante luctus eu. Sed aliquet dolor id sapien
                    rutrum, id vulputate quam iaculis</p>
                    <div class="dropdown-divider"></div>
            </div>
        </center>
        </div>
      </div>
      <div class="tab-pane fade" id="pills-others" role="tabpanel" aria-labelledby="pills-others-tab">
        <div class="container" style="padding-top: 2%; border: 3px solid white;border-radius: 25px;">
          <center>
            <div class="row" style="margin: 1%;">
              <div class="col-lg-4 col-md-6 col-sm-12">
                  <h3 class="feature-title"><br>Coffee Latte</h3>
                  <div class="wrapper">
                    <div class="zoom-effect">
                      <div class="kotak">
                        <img src="images/foto/drinks1.jpg" class="img-fluid" />
                      </div>
                    </div>
                  </div>
                  <br>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                      Quisque interdum quam odio, quis placerat ante luctus eu. Sed aliquet dolor id sapien
                      rutrum, id vulputate quam iaculis</p>
                      <div class="dropdown-divider"></div>
    
              </div>
              <div class="col-lg-4 col-md-6 col-sm-12">
                  <h3 class="feature-title"><br>Robusta Coffee</h3>
                  <div class="wrapper">
                    <div class="zoom-effect">
                      <div class="kotak">
                        <img src="images/foto/drinks2.jpg" class="img-fluid" />
                      </div>
                    </div>
                  </div>
                  <br>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                      Quisque interdum quam odio, quis placerat ante luctus eu. Sed aliquet dolor id sapien
                      rutrum, id vulputate quam iaculis</p>
                      <div class="dropdown-divider"></div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-12">
                <h3 class="feature-title"><br>Dalgona Coffee</h3>
                <div class="wrapper">
                  <div class="zoom-effect">
                    <div class="kotak">
                      <img src="images/foto/drinks3.jpg" class="img-fluid" />
                    </div>
                  </div>
                </div>
                <br>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Quisque interdum quam odio, quis placerat ante luctus eu. Sed aliquet dolor id sapien
                    rutrum, id vulputate quam iaculis</p>
                    <div class="dropdown-divider"></div>
            </div>
        </center>
        </div>
      </div>
    </div>
  </div>
    
    
</body>
<?= $this->endSection(); ?>