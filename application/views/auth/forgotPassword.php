<div id="contact" class="contact-us section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.25s">
        <form id="contact" action="<?= base_url('auth/forgotPassword') ?>" method="post">
          <div class="row">
            <div class="col-lg-6 offset-lg-3">
              <div class="section-heading">
                <h6>Halaman Ubah Password</h6>
                <h2>Lakukan <span> Konfirmasi </span> Data <em> Admin </em> Forum</h2>
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
                    <?= form_error('email'); ?>
                    <input type="text" name="email" id="email" placeholder="Email..">
                  </fieldset>
                </div>
                <fieldset>
                  <?= form_error('password'); ?>
                  <input type="password" name="password" id="password" placeholder="Password Baru.." autocomplete="on">
                </fieldset>
                <button class="btn btn-info">Ganti Password</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>