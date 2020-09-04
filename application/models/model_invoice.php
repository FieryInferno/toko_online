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

            // setelah selesai kita masukkan kedalam tabel invoice
            // pesanan akan dimasukkan kedalam tabel pesanan
            foreach ($this->cart->contents() as $item) {
                $data = array(
                    'id_invoice'    => $id_invoice,
                    'id_brg'        => $item['id'],
                    'nama_brg'      => $item['name'],
                    'jumlah'      => $item['qty'],
                    'harga'      => $item['price'],
                );
                // setelah itu kita masukkan ketabel pesanan
                $this->db->insert('tb_pesanan', $data);
                return TRUE;
            }
        }

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
    }



?>