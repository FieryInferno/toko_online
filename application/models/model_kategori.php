<?php 

    Class Model_kategori extends CI_Model
    {
        public function data_elektronik()
        {
            // select from tb_barang where ...
            return $this->db->get_where('tb_barang', array('kategori' => 'elektronik'));
        }
    }

?>