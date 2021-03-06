<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <form action="<?= base_url(); ?>Chat/hapus_isi_chat/<?= $this->uri->segment(3); ?>" method="post">
                <?php
                    //ini adalah proses menampilkan isi chat
                    foreach ($isi['isi_chat'] as $isi_chat) {
                        //kemudian akan dicek role id dari setiap user yang login
                        switch ($this->session->role_id) {
                            //jika rolenya adalah owner, maka akan chat admin akan ditampilkan disebelah kanan, dan user di sebelah kiri dengan warna yang berbeda
                            case '3':
                                //ini adalah pengecekan apakah chat dikirim oleh admin atau user
                                if ($isi_chat['role_pengirim'] == '1') { ?>
                                    <!-- jika dikirim admin, maka akan ditampilkan di sebelah kanan dengan warna hijau -->
                                    <div class="row">
                                        <div class="col-6"></div>
                                        <div class="col-6">
                                            <div class="alert alert-success" role="alert">
                                                <?= $isi_chat['nama_pengirim']; ?>
                                                <hr>
                                                <div class="col-10"><?= $isi_chat['isi']; ?></div>
                                                <div class="col-2" style="font-size: 10px;"><?= $isi_chat['waktu']; ?></div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } else { ?> 
                                    <!-- jika dikirim user, maka akan ditampilkan di sebelah kiri dengan warna abu-abu -->
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="alert alert-secondary" role="alert">
                                                <?= $isi_chat['nama_pengirim']; ?>
                                                <hr>
                                                <div class="col-10"><?= $isi_chat['isi']; ?></div>
                                                <div class="col-2" style="font-size: 10px;"><?= $isi_chat['waktu']; ?></div>
                                            </div>
                                        </div>
                                        <div class="col-6"></div>
                                    </div>
                                    <br>
                                <?php }
                                break;
                            
                            //jika rolenya adalah admin atau user
                            default:
                                //melakukan pengecekan apakah pengirim chat rolenya sama dengan role yang sedang login
                                if ($isi_chat['pengirim'] == $this->session->id_user) { ?>
                                    <!-- jika sama, maka akan isi chat akan ditampilkan di sebelah kanan -->
                                    <div class="row">
                                        <div class="col-6"></div>
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-11">
                                                    <div class="alert alert-success" role="alert">
                                                        <div class="row">
                                                            <div class="col-10"><?= $isi_chat['isi']; ?></div>
                                                            <div class="col-2" style="font-size: 10px;"><?= $isi_chat['waktu']; ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-1">
                                                    <button type="submit" class="btn btn-danger btn-sm" name="id_isi_chat" value="<?= $isi_chat['id_isi_chat']; ?>"><span class="fas fa-trash"></span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } else { ?> 
                                    <!-- jika tidak, maka akan isi chat akan ditampilkan di sebelah kiri -->
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="alert alert-secondary" role="alert">
                                                <div class="col-10"><?= $isi_chat['isi']; ?></div>
                                                <div class="col-2" style="font-size: 10px;"><?= $isi_chat['waktu']; ?></div>
                                            </div>
                                        </div>
                                        <div class="col-6"></div>
                                    </div>
                                    <br>
                                <?php }
                                break;
                        }
                    }
                ?>
            </form>
        </div>
        <div class="card-footer">
            <?php 
                //disini akan dilakukan pengecekan kembali apakah rolenya owner atau bukan, jika rolenya owner maka dia tidak bisa mengirim pesan
                if ($this->session->role_id !== '3') { ?>
                    <form action="<?= base_url(); ?>Chat/kirim" method="post" id="form_kirim_chat">
                        <div class="input-group">
                            <input type="hidden" name="id_chat" value="<?= $isi['id_chat']; ?>">
                            <input type="hidden" name="pengirim" value="<?= $this->session->id_user; ?>">
                            <?php
                                switch ($this->session->role_id) {
                                    case '1':
                                        $penerima   = $isi['user'];
                                        break;
                                    case '2':
                                        $penerima   = $isi['admin'];
                                        break;
                                    
                                    default:
                                        # code...
                                        break;
                                }
                            ?>
                            <input type="hidden" name="penerima" value="<?= $penerima; ?>">
                            <input type="hidden" name="admin" value="<?= $isi['admin']; ?>">
                            <input type="text" name="isi" placeholder="Type Message ..." class="form-control">
                            <span class="input-group-append">
                                <button type="submit" class="btn btn-primary">Send</button>
                            </span>
                        </div>
                    </form>
                <?php }
            ?>
        </div>
    </div>
</div>
<!-- End of Main Content -->