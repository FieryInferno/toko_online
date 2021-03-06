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

        public function tambah_kk($id)
        {
            $barang = $this->model_barang->find($id);
            $data = array(
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
            // mengambil data barang yang akan ditampilkan
            $data['brg'] = $this->model_barang->detail_brg($id_brg);
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('detail_barang', $data);
            $this->load->view('templates/footer');
        }
    }

?>