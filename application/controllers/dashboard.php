<?php 

    class Dashboard extends CI_Controller   {
        
        public function index()
        {
            $data['barang'] = $this->model_barang->tampil_data()->result();
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('dashboard', $data);
            $this->load->view('templates/footer');
        }

        public function tambah_kk($id)
        {
            // find untuk mencari id data yang diclick oleh user
            $barang = $this->model_barang->find($id);

            // cara menambahkan atau insert data kedalam cart
            $data = array(
                'id'      => $barang->id_brg,
                'qty'     => 1,
                'price'   => $barang->harga,
                'name'    => $barang->nama_brg,
            );
            
            $this->cart->insert($data);     
            redirect('dashboard');
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
            redirect('dashboard/detail_keranjang');
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



    }

?>