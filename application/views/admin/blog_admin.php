<div id="services" class="our-services section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-heading wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
                    <h5>Seputar Informasi</h5>
                    <h2>BLOG &amp; <span>KEGIATAN</span> FORUM <em>GENRE</em></h2>
                    <div class="main-green-button scroll-to-section mt-3">
                        <a id="tambahBlog" class="text-white">Tambah Data</a>
                    </div>
                    <?= $this->session->flashdata('message') ?>
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

<div class="modal" tabindex="-1" role="dialog" id="modalBlog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Blog/Kegiatan</h5>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/tambahBlog') ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="titleBlog">Nama Blog/Kegiatan :</label>
                                <input type="text" class="form-control" id="titleBlog" placeholder="GenRekan Kabupaten Tegal.." name="blog_judul">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="penulisBlog">Nama Penulis :</label>
                                <input type="text" class="form-control" id="penulisBlog" placeholder="Jaenal Arifin" name="blog_penulis">
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Waktu : </label>
                                <input type="date" name="blog_tanggal">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Gambar/Dokumentasi : </label>
                                <input type="file" name="blog_img" class="form-control-file">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="catatanBlog">Konten : </label>
                            <textarea class="form-control" id="catatanBlog" rows="8" name="blog_catatan"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Posting</button>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<script>
    $('document').ready(function() {
        $('#tambahBlog').on('click', function() {
            $('#modalBlog').modal("show");
        })
    })
</script>