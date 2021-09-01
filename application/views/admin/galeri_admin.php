<div id="portfolio" class="our-portfolio section">
    <div class="container-fluid ml-5">
        <div class="row">
            <div class="col-lg-5 mt-3">
                <div class="section-heading wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
                    <h6>Dokumentasi</h6>
                    <h2>GALERI <em>KEGIATAN</em> <br> DAN <span>PROGRAM KERJA</span></h2>
                    <div class="main-green-button mt-3">
                        <a class="text-white" id="tambahGaleri">Tambah Data</a>
                        <?= $this->session->flashdata('message') ?>
                    </div>
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
                                    <a href="#">
                                        <h4><?= $gl['galeri_catatan'] ?></h4>
                                    </a>
                                    <a class="text-white" href="<?= base_url('admin/hapusGaleri/') . $gl['galeri_id'] ?>"> Hapus </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="modalGaleri">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Galeri</h5>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/tambahGaleri') ?>" method="post" enctype="multipart/form-data">
                    <div class="row my-3">
                        <div class="form-group">
                            <label for="galeriGambar">Gambar/Dokumentasi : </label>
                            <input type="file" name="galeri_img" class="form-control-file" id="galeriGambar">
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <label for="keterangan">Keterangan : </label>
                                <input class="form-control" type="text" name="galeri_catatan" id="keterangan">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Upload</button>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#tambahGaleri').on('click', function() {
            $('#modalGaleri').modal("show");
        })
    })
</script>