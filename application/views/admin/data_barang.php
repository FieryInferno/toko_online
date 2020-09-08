    
    <div class="container-fluid">
        
        <!-- Button trigger modal -->
        <a href="#" type="button" class="btn btn-primary btn-icon-split mb-3" data-toggle="modal" data-target="#tambah_barang">
            <span class="icon text-white-20">
            <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah Barang</span>
        </a>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Invoice</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr  class="text-center">
                        <th>NO</th>
                        <th>NAMA BARANG</th>
                        <th>KETERANGAN</th>
                        <th>KATEGORI</th>
                        <th>HARGA</th>
                        <th>STOK</th>
                        <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no=1; foreach ($barang as $brg) : ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $brg->nama_brg ?></td>
                                <td><?php echo $brg->keterangan ?></td>
                                <td><?php echo $brg->kategori ?></td>
                                <td><?php echo $brg->harga ?></td>
                                <td><?php echo $brg->stok ?></td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-success"><i class="fas fa-search-plus"> </i></button>
                                    <?php echo anchor('admin/data_barang/edit/' .$brg->id_brg, '<button type="button" class="btn btn-primary"><i class="fas fa-edit"></i></button>') ?>
                                    <?php echo anchor('admin/data_barang/hapus/' .$brg->id_brg, '<button type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>') ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="tambah_barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">FORM INPUT BARANG</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url().'admin/data_barang/tambah_aksi'; ?>" method="post" enctype="multipart/form-data" >
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Barang</label>
                            <input type="text" name="nama_brg" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Keterangan</label>
                            <input type="text" name="keterangan" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Kategori</label>
                            <select class="form-control" name="kategori">
                            <option value="Elektronik">Elektronik</option>
                            <option value="Pakaian Pria">Pakaian Pria</option>
                            <option value="Pakaian Wanita">Pakaian Wanita</option>
                            <option value="Pakaian Anak-anak">Pakaian Anak-anak</option>
                            <option value="Peralatan Olahraga">Peralatan Olahraga</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Harga</label>
                            <input type="text" name="harga" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Stok</label>
                            <input type="text" name="stok" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Gambar Produk</label>
                            <input type="file" name="gambar_brg" class="form-control">
                        </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->