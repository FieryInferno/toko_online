    <div class="container-fluid">

        <div class="card shadow">
            <div class="card-header">
                Detail Produk
            </div>
            <div class="card-body">
                <!-- class row ditambahkan sendiri -->
                <?php foreach($barang as $brg) : ?>
                <div class="row">
                <!-- ada 1 baris yang dibagi menjadi 2 kolom -->
                    <div class="col-md-4">
                        <div class="card mb-2">
                            <img class="card-img-top" src="<?php echo base_url().'/uploads/'.$brg->gambar_brg ?>" alt="">
                        </div>
                    </div>
                    <div class="col-md-8">
                    <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DETAIL KERANJANG</h6>
                            </div>
                            <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <th scope="row">Nama Produk</th>
                                        <td><strong><?php echo $brg->nama_brg ?></strong></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Keterangan</th>
                                        <td><strong><?php echo $brg->keterangan ?></strong></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Kategori</th>
                                        <td><strong><?php echo $brg->kategori ?></strong></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Stok</th>
                                        <td><strong><?php echo $brg->stok ?></strong></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Harga</th>
                                        <td><a href="#" class="badge badge-success">Rp. <?php echo number_format( $brg->harga, 0,',','.')  ?></a></td>
                                    </tr>
                                </tbody>
                                </table>
                            </div>
                            <!-- table responsive -->   
                            </div>
                        </div>
                        <!-- end DataTables -->
                    </div>
                    <!-- end col-md-8 -->
                
                </div>
                <!-- end row -->
                <?php endforeach; ?>
                <!-- kasih buttonnya masih didalam card bodynya jangan dikasih di div luar card body -->
                <?php echo anchor('dashboard/tambah_kk/'.$brg->id_brg, 
                '<a href="pembayaran" role="button" class="btn btn-success btn-icon-split mb-3 mr-1 float-right">
                    <span class="icon text-white-20">
                    <i class="fas fa-cash-register"></i>
                    </span>
                    <span class="text d-md-block text-pembayaran">Tambahkan ke Keranjang</span>
                </a>')
                ?>
                <!-- menggunakan href aja kalau icon kembalinya -->
                <a href="<?php echo base_url() ?>" role="button" class="btn btn-danger btn-icon-split mb-3 mr-1 float-right">
                    <span class="icon text-white-20">
                    <i class="fas fa-arrow-circle-left"></i>
                    </span>
                    <span class="text d-md-block text-pembayaran">Kembali</span>
                </a>
            </div>
        </div>


    </div>
    <!-- container fluid -->
</div>
