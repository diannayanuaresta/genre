<div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-8 align-self-center">
                        <div class="left-content header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                            <div class="row">
                                <div class="col-lg-5 col-sm-5">
                                    <div class="info-stat">
                                        <a href="https://www.instagram.com/forumgenre_kabtegal/"><span>
                                                <h4><i class="fa fa-instagram" style="font-size:20px;color:red; margin: 10px;"></i>forumgenre_kabtegal</h4>
                                            </span></a>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-sm-7">
                                    <div class="info-stat">
                                        <a href="https://mail.google.com/mail/u/0/?view=cm&tf=1&fs=1&to=genre.kabtegal@gmail.com"><span>
                                                <h4><i class="fa fa-envelope" style="font-size:24p; margin: 10px; color:red"></i>genre.kabtegal@gmail.com</h4>
                                            </span></a>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <h2>FORUM GENRE KABUPATEN TEGAL</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                            <img src="<?= base_url('assets') ?>/images/salam genre.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="features" class="features section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="features-content">
                    <div class="row">
                    <?php $duta = $this->db->get('duta_genre')->row_array() ?>
                        <div class="col-lg-6">
                            <div class="features-item first-feature wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
                                <div class="first-number number">
                                    <h6>Putra</h6>
                                </div>
                                <img src="<?= base_url('assets') ?>/images/duta/<?= $duta['duta_putra_img'] ?>" width="60%" alt="">
                                <h4><?= $duta['duta_putra_nama'] ?></h4>
                                <div class="line-dec"></div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="features-item second-feature wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
                                <div class="second-number number">
                                    <h6>Putri</h6>
                                </div>
                                <img src="<?= base_url('assets') ?>/images/duta/<?= $duta['duta_putri_img'] ?>" width="60%" alt="">
                                <h4><?= $duta['duta_putri_nama'] ?></h4>
                                <div class="line-dec"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="skills-content">
                    <div class="section-heading wow bounceIn text-center" data-wow-duration="1s" data-wow-delay="0.2s">
                        <h3>DUTA GENRE <?= $duta['duta_tahun'] ?></h3>
                        <h2>SELAMAT <span> MENJABAT </span> &amp; <span> MENGINSPIRASI </span> GENERASI MUDA</h2>
                        <div class="main-green-button scroll-to-section justify-content-between mt-3">
                            <a href="<?= base_url('home/duta') ?>">Lihat Semua</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="about" class="about-us section">
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-6">
                <div class="left-image wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                    <img src="<?= base_url('assets') ?>/images/logo-genre.png" alt="">
                </div>
            </div>
            <div class="col-lg-6 align-self-center wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <div class="section-heading">
                    <h6>Tentang</h6>
                    <h2>PUSAT <em>INFORMASI</em> <br> &amp; <em>KONSELING</em> <span>REMAJA</span></h2>
                </div>
                <div class="row">
                    <?php $pik = $this->db->get_where('pik_genre', ['id' => 1])->row_array() ?>
                    <div class="col-lg-4 col-sm-4">
                        <div class="about-item">
                            <h4><?= $pik['pik_sekolah'] ?>+</h4>
                            <h6>Sekolah</h6>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4">
                        <div class="about-item">
                            <h4><?= $pik['pik_desa'] ?>+</h4>
                            <h6>Desa</h6>
                        </div>
                    </div>
                </div>
                <p><?= $pik['pik_note'] ?></p>
            </div>
        </div>
    </div>
</div>

<div id="services" class="our-services section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-heading wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
                    <h6>Seputar Informasi</h6>
                    <h2>BLOG &amp; <span>KEGIATAN</span> FORUM <em>GENRE</em></h2>
                    <div class="main-green-button scroll-to-section mt-3">
                        <a href="<?= base_url('home/blog') ?>">Lihat Semua</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $blog = $this->db->query('SELECT `blog`.* FROM `blog` ORDER BY `blog`.`blog_tanggal` ASC LIMIT 6')->result_array(); ?>
    <div class="container-fluid">
        <div class="row">
            <?php foreach ($blog as $bg) : ?>
                <div class="col-lg-4">
                    <div class="service-item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                        <div class="row">
                            <div class="col-lg-4">
                                <span><small><?= $bg['blog_tanggal'] ?></small></span>
                                <div class="icon">
                                    <img src="<?= base_url('assets/images/blog/') . $bg['blog_img'] ?>" alt="">
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="right-content">
                                    <h5 class="mb-3"><b><?= substr($bg['blog_judul'], 0, 20) . '...'; ?></b></h5>
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

<div id="portfolio" class="our-portfolio section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5 ml-5">
                <div class="section-heading wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
                    <h6>Dokumentasi</h6>
                    <h2>GALERI <em>KEGIATAN</em> <br> DAN <span>PROGRAM KERJA</span></h2>
                    <div class="main-green-button mt-3"><a href="<?= base_url('home/galeri') ?>">Selengkapnya</a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid wow fadeIn mx-3" data-wow-duration="1s" data-wow-delay="0.7s">
        <div class="row">
            <?php
            $galeri = $this->db->query('SELECT `galeri`.* FROM `galeri` ORDER BY `galeri`.`galeri_id` DESC LIMIT 6');
            foreach ($galeri->result_array() as $gl) :
            ?>
                <div class="col-xl-4 px-5">
                    <div class="portfolio-item">
                        <div class="thumb">
                            <img src="<?= base_url('assets/images/galeri/') . $gl['galeri_img'] ?>" alt="">
                            <div class="hover-content">
                                <div class="inner-content">
                                    <a href="#">
                                        <h4><?= $gl['galeri_catatan'] ?></h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<div id="contact" class="contact-us section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.25s">
                <form id="contact" action="<?= base_url('home/tanyaChat') ?>" method="post">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 offset-lg-3">
                                <div class="section-heading">
                                    <h6>Live Chat</h6>
                                    <h2>Tanyakan Mengenai GenRe <span> Kabupaten </span> Tegal</h2>
                                </div>
                            </div>
                            <?php $chat_user = $this->db->query('SELECT `chat_user`.* FROM `chat_user` ORDER BY `chat_user`.`chat_user_id` DESC')->result_array();

                            ?>
                            <div class="container" style="overflow: auto; height: 300px" id="kolomChat">
                                <?php foreach ($chat_user as $cu) : ?>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="card border-dark mb-1" style="max-width: 100%;">
                                                <div class="card-body text-dark">
                                                    <div class="row" id="question">
                                                        <div class="col-lg-1">
                                                            <div class="icon">
                                                                <img src="<?= base_url('assets/images/users.gif') ?>" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-10">
                                                            <p class="card-text"><?= $cu['chat_user'] ?></p>
                                                        </div>
                                                        <div class="col-lg-1">
                                                            <div class="icon mb-2">
                                                                <a href="<?= base_url('home/hapusChatUser/') . $cu['chat_user_id'] ?>">
                                                                    <img src="<?= base_url('assets/images/trashs.png') ?>" alt="" style="width: 20px;">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $chat_user_id = $cu['chat_user_id'];
                                    $chat_admin = $this->db->get_where('chat_admin', ['chat_user_id' => $chat_user_id])->result_array();
                                    foreach ($chat_admin as $ca) :
                                    ?>
                                        <div class="col-lg-10 ml-5">
                                            <div class="row">
                                                <div class="card border-warning bg-secondary mb-1" style="max-width: 100%;">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-lg-10">
                                                                <p class="card-text text-white"><?= $ca['chat_admin']; ?></p>
                                                            </div>
                                                            <div class="col-lg-1">
                                                                <div class="icon">
                                                                    <img src="<?= base_url('assets/images/admin.gif') ?>" alt="" style="-webkit-transform: scaleX(-1);  transform: scaleX(-1);">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                                    endforeach;
                                endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <div class="container mt-5" id="kolomJawaban">
                        <textarea name="chat_user" id="" cols="5" rows="2" placeholder="Masukan Pertanyaan.."></textarea>
                        <button class="btn btn-info" id="submit" type="submit">Tanyakan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>