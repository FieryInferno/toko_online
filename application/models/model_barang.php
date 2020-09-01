<?php 

    class Model_barang extends CI_Model
    {
        public function tampil_data()
        {
            // memanggil data dari database
            return $this->db->get('tb_barang');
        }
    }
    

?>