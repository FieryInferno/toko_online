    
    <div class="container-fluid">
        <!-- row cards -->
        <div class="row">

        <!-- Content Column -->
            <div class="col-xl-3"></div>
            <div class="col-lg-6 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Total Belanja</h6>
                    </div>
                    <div class="card-body">
                        <!-- menampilkan total keranjang -->
                        <?php $keranjang = $this->cart->total_items() ?>
                        <h4 class="small font-weight-bold">Total Keranjang : 
                        <span class="float-right"> 
                            <?php echo $keranjang ?>
                        </span></h4>

                        <!-- perulangan subtotal -->
                        <?php $grand_total = 0;
                            // jika keranjang ada isinya
                            if ($keranjang = $this->cart->contents())
                            {
                                // var_dump($keranjang);die;
                                foreach ($keranjang as $item)
                                {
                                    // 0 = 0 + subtotal (2, 2) dan kalau dia isi lagi looping lagi
                                    // 1p =>  0 = 0+4 = 4
                                    // 2p => 4 = 4+3 = 7
                                    // jadi 4 = 7;
                                    $grand_total = $grand_total + $item['subtotal'];
                                }
                            }
                        ?>
                        <input type="text" class="form-control"  value="<?php echo number_format($grand_total, 0,',','.') ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="col-xl-3"></div>

        </div>
        <!-- row GrandTotal -->

        <!-- form pembayaran -->
        <div class="row">
            <div class="col-xl-3 col-sm-1"></div>
            <!-- Content Column -->
            <div class="col-xl-6 col-sm-10">
                <!-- Project Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Input Alamat Pengiriman dan Pembayaran</h6>
                    </div>
                    <div class="card-body">
                            <!-- form -->
                            <form method="post" action="<?php echo base_url('dashboard/proses_pesanan') ?>" >
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Lengkap</label>
                                    <input type="text" name="nama" class="form-control" placeholder="Nama ...">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Alamat Lengkap</label>
                                    <input type="text" name="alamat" class="form-control" placeholder="Alamat ...">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nomor telepon</label>
                                    <input type="text" name="no_telp" class="form-control" placeholder="Nomor telepon ...">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Jasa Pengiriman</label>
                                    <select class="form-control" name="jasa" id="">
                                        <option value="">JNE</option>
                                        <option value="">TIKI</option>
                                        <option value="">POS INDONESIA</option>
                                        <option value="">GOJEK</option>
                                        <option value="">GRAB</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Pilih BANK</label>
                                    <select class="form-control" name="bank" id="">
                                        <option value="">BCA - XXXX-0001</option>
                                        <option value="">BNI - XXXX-0002</option>
                                        <option value="">BRI - XXXX-0003</option>
                                        <option value="">MANDIRI - XXXX-0004</option>
                                    </select>
                                </div>
                                
                                <button type="submit" class="btn btn-primary mt-2">Pesan</button>
                            </form>
                    </div>
                    <!-- card-body -->
                </div>
            </div>
            <div class="col-xl-3 col-sm-1"></div>
        </div>
        

    </div>
    <!-- container-fluid -->
</div>