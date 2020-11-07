<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3><?= $isi['nama']; ?></h3>
        </div>
        <div class="card-body">
            <?php
                foreach ($isi['isi_chat'] as $isi_chat) { 
                    if ($isi_chat['pengirim'] == $this->session->id_user) { ?>
                        <div class="row">
                            <div class="col-6"></div>
                            <div class="col-6">
                                <div class="alert alert-success" role="alert">
                                    <?= $isi_chat['isi']; ?> 
                                </div>
                            </div>
                        </div>
                    <?php } else { ?> 
                        <div class="row">
                            <div class="col-6">
                                <div class="alert alert-secondary" role="alert">
                                <?= $isi_chat['isi']; ?> 
                                </div>
                            </div>
                            <div class="col-6"></div>
                        </div>
                        <br>
                    <?php }
                }
            ?>
        </div>
        <div class="card-footer">
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
        </div>
    </div>
</div>
<!-- End of Main Content -->