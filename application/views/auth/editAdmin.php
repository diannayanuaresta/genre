<div id="contact" class="contact-us section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.25s">
        <form id="contact" action="<?= base_url('auth/editAdmin') ?>" method="post">
          <div class="row">
            <div class="col-lg-6 offset-lg-3">
              <div class="section-heading">
                <h6>Halaman Ubah Data Admin</h6>
                <h2>Lakukan <span> Pengubahan </span> Data <em> Admin </em> Forum</h2>
              </div>
              <?= $this->session->flashdata('message'); ?>
            </div>
            <?php $admin = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();?>
            <div class="col-lg-6 offset-lg-3">
              <div class="row">
                <div class="col-lg-6">
                  <fieldset>
                      <label for="username">Username :</label>
                      <input type="text" name="username" id="username" value="<?= $admin['username']?>" >
                      <?= form_error('username'); ?>
                  </fieldset>
                </div>
                <div class="col-lg-6">
                  <fieldset>
                      <label for="username">Email :</label>
                      <input type="text" name="email" id="email" value="<?= $admin['email']?>">
                      <?= form_error('email'); ?>
                  </fieldset>
                </div>
                <button class="btn btn-info">Update Data</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>