<div id="features" class="features section">
    <div class="container mt-5">

        <?php $duta = $this->db->query('SELECT `duta_genre`.* FROM `duta_genre`')->result_array();

        foreach ($duta as $dt) :
            $tot_id = $dt['duta_id'];
        ?>
            <div class="row">
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
                <div class="col-lg-12">
                    <div class="skills-content">
                        <div class="section-heading wow bounceIn text-center" data-wow-duration="1s" data-wow-delay="0.2s">
                            <h2>DUTA <span> GENRE </span> TAHUN <span> <?= $dt['duta_tahun'] ?></span> </h2>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>