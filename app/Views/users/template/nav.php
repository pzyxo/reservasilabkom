    <nav class="navbar sticky-top navbar-expand-lg">
      <div class="container-fluid">
        <span class="navbar-brand mb-0 h1"><img src="images/icon/logo.png" width="50" height="50" alt="icon" loading="lazy"></span>
        <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="main-navigation">
          <div class="navbar-nav">
            <a class="nav-link <?= ($page == '' ? 'on' : '') ?>" href="/">Home</a>
            <a class="nav-link <?= ($page == 'about' ? 'on' : '') ?>" href="/about">About</a>
            <a class="nav-link <?= ($page == 'explore' ? 'on' : '') ?>" href="/explore">Explore</a>
            <?php if ((session()->get('roles') == 'admin')) { ?>
              <a class="nav-link" href="/admin/users">Admin</a>
            <?php } ?>


          </div>

        </div>
        <?php if (!session()->get('loggedIn')) { ?>
          <a class="btn btn-dark d-flex" href="/signin">Sign In</a>
        <?php } else { ?>
          <a class="btn btn-dark d-flex" href="/profile">Profile</a>
        <?php } ?>
      </div>
    </nav>