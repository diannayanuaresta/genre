<div id="services_admin" class="our-services section">
    <?php $blog = $this->db->get_where('blog', ['blog_id' => $blog_id])->row_array() ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-heading wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
                    <h6>BLOG FORUM GENRE</h6>
                    <h2><?= $blog['blog_judul'] ?></h2>
                    <div class="main-green-button scroll-to-section mt-3">
                        <a class="text-white" id="editBlog">Edit Data</a>
                        <a href="<?= base_url('admin/hapusBlog/'). $blog['blog_id']?>" id="editBlog">Hapus Data</a>
                        <?= $this->session->flashdata('message') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card mb-3">
                    <img class="card-img-top" src="<?= base_url('assets/images/blog/') . $blog['blog_img'] ?>" alt="Card image cap">
                    <h6 class="card-body">Diposting pada tanggal :
                        <?php
                        $tanggal = explode('-', $blog['blog_tanggal']);
                        echo $tanggal[2] . '-' . $tanggal[1] . '-' . $tanggal[0];
                        ?></h6>
                    <h6 class="card-body">Penulis : <?= $blog['blog_penulis'] ?></h6>
                    <div class="card-body">
                        <p class="card-text"><?= $blog['blog_catatan'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="modalBlog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Blog/Kegiatan</h5>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/updateBlog') ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <input type="hidden" name="blog_id" value="<?= $blog['blog_id'] ?>">
                                <label for="titleBlog">Nama Blog/Kgiatan :</label>
                                <input type="text" class="form-control" id="titleBlog" value="<?= $blog['blog_judul'] ?>" name="blog_judul">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="penulisBlog">Nama Blog/Kgiatan :</label>
                                <input type="text" class="form-control" id="penulisBlog" value="<?= $blog['blog_penulis'] ?>" name="blog_penulis">
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="waktu">Waktu : </label>
                                <input type="date" name="blog_tanggal" id="waktu" value="<?= $blog['blog_tanggal'] ?>">
                            </div>
                            <div class="form-group mt-5">
                                <label for="gambar">Gambar/Dokumentasi : </label>
                                <input type="file" name="blog_img" class="form-control-file" id="gambar">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <img src="<?= base_url('assets/images/blog/') . $blog['blog_img'] ?>" alt="">
                        </div>
                        <div class="form-group">
                            <label for="catatanBlog">Konten : </label>
                            <textarea class="form-control" id="catatanBlog" rows="8" name="blog_catatan"><?= $blog['blog_catatan'] ?></textarea>
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
        $('#editBlog').on('click', function() {
            $('#modalBlog').modal("show");
        })
    })
</script>