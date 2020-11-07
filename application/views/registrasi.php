<body class="bg-gradient-primary">

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
        <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
        <div class="col-lg-7">
            <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">FORM REGISTER</h1>
            </div>
            <form method="post" action="<?php echo base_url('registrasi/index') ?>" class="user">
                <div class="form-group">
                    <input type="text" name="nama" class="form-control form-control-user" id="exampleInputEmail" placeholder="Nama">
                    <?php echo form_error('nama', '<div class="text-danger small ml-2">','</div>') ?>
                </div>
                <div class="form-group">
                    <input type="text" name="username" class="form-control form-control-user" id="exampleInputEmail" placeholder="Username">
                    <?php echo form_error('username', '<div class="text-danger small ml-2">','</div>') ?>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="password" name="password_1" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                        <?php echo form_error('password_1', '<div class="text-danger small ml-2">','</div>') ?>
                    </div>
                    <div class="col-sm-6">
                        <input type="password" name="password_2" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Ulangi Password">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block text-white">
                    Daftar
                </button>
                <hr>
                <a href="index.html" class="btn btn-google btn-user btn-block">
                <i class="fab fa-google fa-fw"></i> Register with Google
                </a>
                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                </a>
            </form>
            <hr>
            <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
            </div>
            <div class="text-center">
                <a class="small" href="<?php echo base_url('auth/login') ?>">Sudah Punya Akun? Silahkan Login!</a>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url() ?>assets/js/sb-admin-2.min.js"></script>
