<?php 

    Class Model_invoice extends CI_Model
    {
        // untuk mengeksekusi apa yang ada di dashboard
        public function index()
        {
            date_default_timezone_set('Asia/Jakarta');
            // mengambil dari form pembayaran dan formnya menggunakan method POST DAN MENANGKAPNYA JUGA WAJI POST
            $nama       = $this->input->post('nama');
            $alamat     = $this->input->post('alamat');
            
            $invoice = array(
                'nama'      => $nama,
                'alamat'    => $alamat,
                'tgl_pesan' => date('Y-m-d H:i:s'),
                // batas bayarnya date('d') + 1  jadi harinya itu ditambah 1 hari lagi.
                'batas_bayar' => date('Y-m-d H:i:s', mktime( date('H'), date('i'), date('s'), date('m'), date('d') + 1 ,date('Y')))
            );
            // memasukkan ketabel
            $this->db->insert('tb_invoice', $invoice);

            $id_invoice = $this->db->insert_id();

            // put ordered items in orders table
            foreach ($this->cart->contents() as $item) {
                $data = array(
                    // Id_invoice masuk sebagai id invoice
                    'id_invoice'    => $id_invoice,
                    // diambil dari controller dashboard/tambah_ke keranjang
                    'id_brg'        => $item['id'],
                    'nama_brg'      => $item['name'],
                    'jumlah'        => $item['qty'],
                    'harga'         => $item['price'],
                );
                // setelah itu kita masukkan ketabel pesanan
                $this->db->insert('tb_pesanan', $data);
                
            }
            return TRUE;
        }

        // public function count_item_keranjang()
        // {
        //     $this->db->select('COUNT(id_keranjang) AS total_keranjang');
        //     $this->db->from('tb_keranjang');
        //     $this->db->group_by('id_user');
        //     $this->db->order_by('id_keranjang', 'desc');
        //     return $this->db->get()->row(); // karena ingin memunculkan semua datanya maka kita dapat menggunakan result
        // }

        // public function add_keranjang_db()
        // {

        //     // $id_invoice = $this->db->insert_id();

        //     // put ordered items in orders table
        //     $id_user = $this->session->userdata('id_user');

        //     foreach ($this->cart->contents() as $item) {
        //         $data = array(
        //             // Id_invoice masuk sebagai id invoice
        //             // 'id_invoice'    => $id_invoice,
        //             // diambil dari controller dashboard/tambah_ke keranjang
        //             'id_user'               => $id_user,
        //             'id_brg'                => $item['id'],
        //             'nama_barang'           => $item['name'],
        //             'jumlah'                => $item['qty'],
        //             'harga'                 => $item['price'],
        //         );
        //         // setelah itu kita masukkan ketabel pesanan
        //         $this->db->insert('tb_keranjang', $data);
        //     }
            
        //     return TRUE;
        // }

        public function tampil_data()
        {
            $result     = $this->db->get('tb_invoice');
            if ($result->num_rows() > 0){
                return $result->result();
            }
            else{
                return false;
            }
        }

        public function ambil_id_invoice($id_invoice)
        {
            $result     = $this->db->where('id', $id_invoice)
                                                ->limit(1)
                                                ->get('tb_invoice');
            if ($result->num_rows() > 0){
                return $result->row();
            }
            else{
                return false;
            }
            
        }

        public function ambil_id_pesanan($id_invoice)
        {
            // menampilkan pesanan sesuai dengan id invoicenya
            // disini tidak pakai limit, karena limit itu pembatasnya
            $result     = $this->db->where('id_invoice', $id_invoice)
                                                ->get('tb_pesanan');
            if ($result->num_rows() > 0){
                return $result->result();
            }
            else{
                return false;
            }
        }
    }



?>