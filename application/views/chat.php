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
                        <textarea name="chat_user" id="" cols="5" rows="2" placeholder="Jawaban"></textarea>
                        <button class="btn btn-info" id="submit" type="submit">Tanyakan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>