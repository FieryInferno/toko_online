    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Carousel -->
        <div id="carouselExampleIndicators" class="carousel slide  mb-3" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img class="d-block w-100" src="<?php echo base_url('/assets/img/slide1.jpg')?>" alt="First slide">
                </div>
                <div class="carousel-item">
                <img class="d-block w-100" src="<?php echo base_url('/assets/img/slide2.jpg')?>" alt="Second slide">
                </div>
                <div class="carousel-item">
                <img class="d-block w-100" src="<?php echo base_url('/assets/img/slide3.jpg')?>" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <!-- agar dia menjadi satu baris gunakan class row -->
        <div class="row text-center card-jarak">
            <?php foreach ($pakaian_pria as $brg) : ?>
            <!-- Cards -->
            <div class="card shadow ml-3 mr-2 d-flex justify-content-center align-items-center  m-auto" style="width: 14rem;">
                <div class="wrapper-img"><img src=" <?php echo base_url().'/uploads/'.$brg->gambar_brg ?> " class="card-img-top" alt="..."></div>
                <div class="card-body card-tengah">
                    <h5 class="card-title mb-1"> <?php echo $brg->nama_brg ?> </h5>
                    <small> <?php echo $brg->keterangan ?> </small>
                    <br>
                    <span class="badge badge-success mb-2"> Rp <?php echo $brg->harga ?></span>
                    <?php echo anchor('dashboard/tambah_kk/'.$brg->id_brg, ' <div class="btn btn-sm btn-primary mb-1 btn-keranjang">Tambah ke Keranjang</div>')?>
                    <?php echo anchor('dashboard/detail/'.$brg->id_brg, ' <div class="btn btn-sm btn-success mb-1 btn-keranjang">Detail</div>')?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
