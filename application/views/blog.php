<div id="services" class="our-services section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-heading wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
                    <h5>Seputar Informasi</h5>
                    <h2>BLOG &amp; <span>KEGIATAN</span> FORUM <em>GENRE</em></h2>
                </div>
            </div>
        </div>
    </div>
    <?php $blog = $this->db->query('SELECT `blog`.* FROM `blog` ORDER BY `blog`.`blog_tanggal` DESC')->result_array(); ?>
    <div class="container-fluid">
        <div class="row">
            <?php foreach ($blog as $bg) : ?>
                <div class="col-lg-4">
                    <div class="service-item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                        <div class="row">
                            <div class="col-lg-4">
                                <span><small>
                                        <?php
                                        $tanggal = explode('-', $bg['blog_tanggal']);
                                        echo $tanggal[2] . '-' . $tanggal[1] . '-' . $tanggal[0];
                                        ?>
                                    </small></span>
                                <div class="icon">
                                    <img src="<?= base_url('assets/images/blog/') . $bg['blog_img'] ?>" alt="">
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="right-content">
                                    <h5 class="mb-3"><b><?= $bg['blog_judul'] ?></b></h5>
                                    <p><?= substr($bg['blog_catatan'], 0, 90) . '... '; ?>
                                        <a href="<?= base_url('admin/detailBlog/' . $bg['blog_id']) ?>">Selengkapnya</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</div>