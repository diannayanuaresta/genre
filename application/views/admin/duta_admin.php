<div id="features" class="features section">
    <div class="container">
        <div class="main-green-button scroll-to-section mb-3">
            <a id="tambahDuta">Tambah Data</a>
        </div>
        <?= $this->session->flashdata('message'); ?>

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
                            <div class="main-green-button scroll-to-section mt-3">
                                <a href="<?= base_url('admin/ubahDuta/' . $dt['duta_id']) ?>">Ubah Data</a>
                                <a href="<?= base_url('admin/hapusDuta/') . $dt['duta_id'] ?>">Hapus Data</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<div class="modal" tabindex="-1" role="dialog" id="modalDuta">
    <div class="modal-dialog" role="document">

    </div>
</div>
<script>
    $('document').ready(function() {
        $('#tambahDuta').on('click', function() {
            $('#modalDuta').modal("show")
            $('#modalDuta').on('click', '.close', function() {
                $('#modalDuta').modal("hide")
            })
            $('.modal-dialog').html(`
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/tambahDuta') ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group my-3">
                        <label for="exampleInputEmail1">Tahun Jabatan :</label>
                        <input type="text" class="form-control" name="duta_tahun" placeholder="Tahun Jabatan.." required>
                    </div>
                    <div class="form-group my-3">
                        <label for="exampleInputEmail1">Duta Putra</label>
                        <input type="text" class="form-control" name="duta_putra_nama" placeholder="Masukan Nama Duta Putra" required>
                        <input type="file" name="duta_putra_img">
                    </div>
                    <div class="form-group my-3">
                        <label for="exampleInputEmail1">Duta Putri</label>
                        <input type="text" class="form-control" name="duta_putri_nama" placeholder="Masukan Nama Duta Putri" required>
                        <input type="file" name="duta_putri_img">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>       
            `)
        })
    })
</script>