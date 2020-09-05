    
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Detail Pesanan</h1>
        <p class="mb-4">Semangat belanjanya murah harganya hanya di <a target="_blank" href="<?php echo base_url()?>">BeliKuy.com</a>.</p>
        <h4><span class="badge badge-pill badge-success mb-3">No. Invoice : <?php echo $invoice->id ?></span></h4>
        
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Invoice</h6>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                    <th>ID BARANG</th>
                    <th>NAMA PRODUK</th>
                    <th>JUMLAH PESANAN</th>
                    <th>HARGA SATUAN</th>
                    <th>SUB-TOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $total = 0; 
                    foreach ($pesanan as $psn) : 
                    $subtotal = $psn->jumlah * $psn->harga;
                    $total = $total + $subtotal;
                    ?>
                    <tr>
                    <td><?php echo $psn->id_brg; ?></td>
                    <td><?php echo $psn->nama_brg ?></td>
                    <td><?php echo $psn->jumlah ?></td>
                    <td><?php echo number_format( $psn->harga, 0,',','.')  ?></td>
                    <td><?php echo number_format( $subtotal, 0,',','.') ?></td>
                    </tr>
                    <?php endforeach; ?>
                    <tr>
                        <!-- row itu 1 baris, jadi kalau td ini 1 td menandakan 1 kolom -->
                        <td colspan="4" class="text-right">Grand Total</td>
                        <td  class="table-success">Rp. <?php echo number_format($total, 0,',','.' ) ?></td>
                    </tr>
                </tbody>
                </table>
            </div>
            <!-- table responsive -->
            <a href="<?php echo base_url('admin/invoice') ?>" role="button" class="btn btn-primary btn-icon-split mb-3 mr-1 ">
                <span class="icon text-white-20">
                <i class="fas fa-arrow-circle-left"></i>
                </span>
                <span class="text d-md-block ">Kembali</span>
            </a>
            </div>
        </div>
    </div>
</div>

