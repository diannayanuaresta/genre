<div id="portfolio" class="our-portfolio section">
    <div class="container-fluid ml-5">
        <div class="row">
            <div class="col-lg-5 mt-3">
                <div class="section-heading wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
                    <h6>Dokumentasi</h6>
                    <h2>GALERI <em>KEGIATAN</em> <br> DAN <span>PROGRAM KERJA</span></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid wow fadeIn" data-wow-duration="1s" data-wow-delay="0.7s">
        <div class="row">
            <?php
            $galeri = $this->db->query('SELECT `galeri`.* FROM `galeri`');
            foreach ($galeri->result_array() as $gl) :
            ?>
                <div class="col-xl-4 px-5">
                    <div class="portfolio-item">
                        <div class="thumb">
                            <img src="<?= base_url('assets/images/galeri/') . $gl['galeri_img'] ?>" alt="">
                            <div class="hover-content">
                                <div class="inner-content">
                                    <h4><?= $gl['galeri_catatan'] ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>