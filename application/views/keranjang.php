    
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Keranjang Belanja</h1>
        <p class="mb-4">Semangat belanjanya murah harganya hanya di <a target="_blank" href="<?php echo base_url()?>">BeliKuy.com</a>.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DETAIL KERANJANG</h6>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                    <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Sub-Total</th>
                    </tr>
                </thead>
                <tbody>

                <?php $no=1; foreach ($this->cart->contents() as $items): ?>
                    <!-- karena data yang kita kirim dalam bentuk array maka kita tangkap dengan array juga ['name'] -->
                    <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $items['name'] ?></td>
                    <td><?php echo $items['qty'] ?></td>
                    <td>Rp. <?php echo number_format( $items['price'], 0,',','.') ?></td>
                    <td>Rp. <?php echo number_format( $items['subtotal'], 0,',','.' ) ?></td>
                    </tr>
                <?php endforeach; ?>
                <thead>
                    <tr>
                        <td colspan="4"></td>
                        <td  class="table-success">Rp. <?php echo number_format($this->cart->total(), 0,',','.' ) ?> </td>
                    </tr>
                </thead>
                </tbody>
                </table>
                
            </div>
            <!-- table responsive -->
            <div class="float-right bd-highlight span-text">
                    <!-- INGAT : Kalau href gak usah pake echo base_url -->
                    <!-- INGAT : Jika menggunakan button modal, jangan sekali-kali ada data tooglenya  -->
                    <a href="hapus_keranjang" role="button" class="btn btn-danger btn-icon-split mb-3 mr-1 ">
                        <span class="icon text-white-20">
                        <i class="fas fa-trash"></i>
                        </span>
                        <span class="text d-md-block" >Hapus Keranjang</span>
                    </a>
                    <a href="<?php echo base_url() ?>" role="button" class="btn btn-primary btn-icon-split mb-3 mr-1 ">
                        <span class="icon text-white-20">
                        <i class="fas fa-shopping-bag"></i>
                        </span>
                        <span class="text d-md-block ">Lanjutkan Belanja</span>
                    </a>
                    <a href="pembayaran" role="button" class="btn btn-success btn-icon-split mb-3 mr-1">
                        <span class="icon text-white-20">
                        <i class="fas fa-cash-register"></i>
                        </span>
                        <span class="text d-md-block text-pembayaran">Pembayaran</span>
                    </a>
                </div>    
            </div>
        </div>
    
        



    </div>
        <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->