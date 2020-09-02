    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class=" h4 mb-0 text-gray-800">FORM EDIT DATA</h1>
            <a href="<?php echo base_url().'admin/data_barang' ?>" class="d-sm-inline-block btn btn-sm btn-secondary shadow-sm mt-2 "><i class="fas fa-chevron-circle-left fa-sm text-white-50 mr-1"></i>Kembali</a>
        </div>
        <?php foreach($barang as $brg) : ?>
            <form method="post" action="<?php echo base_url().'admin/data_barang/update' ?>" >
                <div class="form-group">
                    <input type="hidden" name="id_brg" class="form-control" value="<?php echo $brg->id_brg ?>">
                    <label for="exampleInputEmail1">Nama Barang</label>
                    <input type="text" name="nama_brg" class="form-control" value="<?php echo $brg->nama_brg ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Keterangan</label>
                    <input type="text" name="keterangan" class="form-control" value="<?php echo $brg->keterangan ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Kategori</label>
                    <input type="text" name="kategori" class="form-control" value="<?php echo $brg->kategori ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Harga</label>
                    <input type="text" name="harga" class="form-control" value="<?php echo $brg->harga ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Stok</label>
                    <input type="text" name="stok" class="form-control" value="<?php echo $brg->stok ?>">
                </div>
                <button type="submit" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm mt-2 mb-2">Submit</button>
                </form>
        <?php endforeach; ?>
        
    </div>
</div>