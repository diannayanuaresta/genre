<div id="features" class="features section">
    <div class="container">
        <?= $this->session->flashdata('message'); ?>

        <?php $dt = $this->db->get_where('duta_genre', ['duta_id' => $duta_id])->row_array();  ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="skills-content">
                    <div class="section-heading wow bounceIn text-center" data-wow-duration="1s" data-wow-delay="0.2s">
                        <h2>Lakukan <span> Edit </span> Duta <span> Genre</span> </h2>
                        <form action="<?= base_url('admin/updateDuta') ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="duta_id" value="<?= $dt['duta_id'] ?>">
                            <div class="row">
                                <div class="col-6 px-5">
                                    <div class="form-group">
                                        <label for="DutaPutra">Duta Genre Putra</label>
                                        <input type="text" class="form-control" id="DutaPutra" value="<?= $dt['duta_putra_nama'] ?>" name="duta_putra_nama">
                                    </div>
                                    <input type="file" name="duta_putra_img">
                                </div>
                                <div class="col-6 px-5">
                                    <label for="DutaPutri">Duta Genre Putri</label>
                                    <input type="text" class="form-control" id="DutaPutri" value="<?= $dt['duta_putri_nama'] ?>" name="duta_putri_nama">
                                    <input type="file" name="duta_putri_img">
                                </div>
                            </div>
                            <div class="main-green-button scroll-to-section mt-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="features-content">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="features-item first-feature wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
                                <div class="first-number number">
                                    <h6>Putra</h6>
                                </div>
                                <img src="<?= base_url('assets') ?>/images/duta/<?= $dt['duta_putra_img'] ?>" width="60%" alt="">
                                <h4><?= $dt['duta_putra_nama'] ?></h4>
                                <div class="line-dec"></div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="features-item second-feature wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
                                <div class="second-number number">
                                    <h6>Putri</h6>
                                </div>
                                <img src="<?= base_url('assets') ?>/images/duta/<?= $dt['duta_putri_img'] ?>" width="60%" alt="">
                                <h4><?= $dt['duta_putri_nama'] ?></h4>
                                <div class="line-dec"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>