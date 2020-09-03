    
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
            </div>
        </div>

    </div>
        <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->