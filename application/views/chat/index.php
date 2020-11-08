<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h3>Daftar Chat</h3>
            </div>
            <?php
                if (isset($this->session->berhasil_hapus)) {
                    echo $this->session->berhasil_hapus;
                }
            ?>
            <ul class="list-unstyled">
                <?php
                    //Untuk menampilkan chat
                    foreach ($penerima as $key) { ?>
                        <li class="media my-4 border-top border-bottom">
                            <img class="mr-3" src="https://via.placeholder.com/150" alt="Generic placeholder image">
                            <div class="media-body">
                                <?php
                                    switch ($this->session->role_id) {
                                        case '1': ?>
                                            <h5 class="mt-0 mb-1"><strong><a href="<?= base_url(); ?>Chat/isi/<?= $key['user']; ?>"><?= $key['namaUser']; ?></a></strong><br></h5>
                                            <?php break;
                                        case '2': ?>
                                            <h5 class="mt-0 mb-1"><strong><a href="<?= base_url(); ?>Chat/isi/<?= $key['admin']; ?>"><?= $key['nama']; ?></a></strong><br></h5>
                                            <?php break;
                                        case '3': ?>
                                            <h5 class="mt-0 mb-1"><strong><a href="<?= base_url(); ?>Chat/isi/<?= $key['user']; ?>/<?= $key['admin']; ?>">Chat <?= $key['nama']; ?> dan <?= $key['namaUser']; ?></a></strong><br></h5>
                                            <?php break;
                                        
                                        default:
                                            # code...
                                            break;
                                    }
                                    echo $key['chat_terakhir']['isi']; 
                                ?>
                            </div>
                            <!-- Tombol untuk menghapus chat -->
                            <a href="<?= base_url('chat/delete/' . $key['id_chat'] . '/' . $this->session->id_user); ?>" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</a>
                        </li>
                    <?php }
                ?>
            </ul>
        </div>
    </div>
</div>
<!-- End of Main Content -->