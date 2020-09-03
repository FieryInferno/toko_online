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



    }

?>