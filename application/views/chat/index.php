<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <?php
                switch ($this->session->role_id) {
                    case '1':
                        # code...
                        break;
                    case '2': ?>
                        <div class="col-6">
                            <form action="<?= base_url(); ?>Chat/isi" method="post">
                                <div class="input-group">
                                    <select class="form-control" id="exampleFormControlSelect1" name="admin">
                                        <?php
                                            foreach ($admin as $key) { ?>
                                                <option value="<?= $key['id_user']; ?>"><?= $key['nama']; ?></option>
                                            <?php }
                                        ?>
                                    </select>
                                    <span class="input-group-append">
                                        <button type="submit" class="btn btn-primary">Chat</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                        <?php break;
                    
                    default:
                        # code...
                        break;
                }
            ?>
        </div>
        <div class="card-body">
            <div class="card-title">
                <h3>Daftar Chat</h3>
            </div>
            <ul class="list-unstyled">
                <?php
                    foreach ($penerima as $key) { ?>
                        <li class="media my-4">
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
                                        
                                        default:
                                            # code...
                                            break;
                                    }
                                    echo $key['chat_terakhir']['isi']; 
                                ?>
                            </div>
                        </li>
                    <?php }
                ?>
            </ul>
        </div>
    </div>
</div>
<!-- End of Main Content -->