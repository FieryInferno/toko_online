<?php 

    Class Model_kategori extends CI_Model
    {
        public function data_elektronik()
        {
            // select from tb_barang where ...
            return $this->db->get_where('tb_barang', array('kategori' => 'elektronik'));
        }

        public function pakaian_pria()
        {
            return $this->db->get_where('tb_barang', array('kategori' => 'Pakaian Pria'));
        }

        public function pakaian_wanita()
        {
            return $this->db->get_where('tb_barang', array('kategori' => 'Pakaian Wanita'));
        }

        public function pakaian_anak_anak()
        {
            return $this->db->get_where('tb_barang', array('kategori' => 'Pakaian Anak-anak'));
        }

        public function peralatan_olahraga()
        {
            return $this->db->get_where('tb_barang', array('kategori' => 'Peralatan olahraga'));
        }
    }

?>