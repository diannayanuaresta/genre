<div id="contact" class="contact-us section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.25s">
          <form id="contact" action="<?= base_url('auth/login')?>" method="post">
            <div class="row">
              <div class="col-lg-6 offset-lg-3">
                <div class="section-heading">
                  <h6>Halaman Registrasi</h6>
                  <h2>Lakukan <span> Login </span> Sebagai <em> Admin </em> Forum</h2>
                </div>
                <?= $this->session->flashdata('message'); ?>
              </div>
              <div class="col-lg-6 offset-lg-3">
                <div class="row">
                  <div class="col-lg-6">
                    <fieldset>
                      <?= form_error('username'); ?>
                      <input type="text" name="username" id="username" placeholder="Username.." autocomplete="on">
                    </fieldset>
                  </div>
                  <div class="col-lg-6">
                    <fieldset>
                      <?= form_error('password'); ?>
                      <input type="password" name="password" id="password"  placeholder="Password..">
                    </fieldset>
                  </div>
                  <button class="btn btn-info">Login</button>
                  <a href="<?= base_url('auth/forgotPassword')?>">Lupa Password ?</a>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
