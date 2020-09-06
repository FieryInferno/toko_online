<?php 

    Class Dashboard extends CI_Controller   {

        public function __construct() {
            // user wajib dipaksa login dulu sebelum mengakses dashboardnya masing-masing
            parent::__construct();
            if ($this->session->userdata('role_id') != '2') {
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Anda Belum Login!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('auth/login');
            } else {
                # code...
            }
            
        }

        /* 
        // dipindah ke file welcome.php dan default controller routes jadi welcome.
        // karena ada function cinstruct yang akan dijalan, dan TIDAK akan bisa mengakses fungsi2 di controller dashboard sebelum login
        public function index()
        {
            $data['barang'] = $this->model_barang->tampil_data()->result();
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('dashboard', $data);
            $this->load->view('templates/footer');
        }
        */

        public function tambah_kk($id)
        {
            // find untuk mencari id gambar/data yang diclick oleh user
            // ... dan menampilkannya kedalam data objek menjadi 1 array data id tersebut.
            $barang = $this->model_barang->find($id);
            // var_dump($barang);die;

            // [!] DATA OBJEK DIMASUKKAN KE ARRAY UNTUK DIINPUT KE DB
            // cara menambahkan atau insert data kedalam cart
            $data = array(
                // id barang dikirim disini
                // id disini merupakan rumus awal codeigniter
                'id'      => $barang->id_brg,
                'qty'     => 1,
                'price'   => $barang->harga,
                'name'    => $barang->nama_brg,
            );
        
            $this->cart->insert($data);     
            redirect('welcome');
        }

        public function detail_keranjang()
        {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('keranjang');
            $this->load->view('templates/footer');
        }

        public function hapus_keranjang()
        {
            // menghapus semua data di keranjang belanja
            $this->cart->destroy();
            redirect('welcome');
        }

        public function pembayaran()
        {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('pembayaran');
            $this->load->view('templates/footer');
        }

        public function proses_pesanan()
        {
            // agar datanya pas diclick masuk ke table atau model invoice
            $is_processed = $this->model_invoice->index();
            if ($is_processed) {
                 // semua data di keranjang akan dihapus ketika diclick pesan
                $this->cart->destroy();
                $this->load->view('templates/header');
                $this->load->view('templates/sidebar');
                $this->load->view('proses_pesanan');
                $this->load->view('templates/footer');
            } else{
                echo "Maaf Pesanan Anda Gagal DiProses";
            }
        }

        public function detail($id_brg)
        {
            // mengambil id
            $data['barang'] = $this->model_barang->detail_brg($id_brg);
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('detail_barang', $data);
            $this->load->view('templates/footer');
        }



    }

?>