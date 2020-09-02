<?php 

    class Model_barang extends CI_Model
    {
        public function tampil_data()
        {
            $this->db->select("*");
            $this->db->from("tb_barang");
            $this->db->order_by("id_brg", "desc");
            $query = $this->db->get();
            return $query;
            // return $query->result();
            // return $this->db->select()->from('tb_barang')->order_by('id', 'desc');
            // return $this->db->get('tb_barang');
        }

        public function tambah_barang($data, $table)
        {
            $this->db->insert($table, $data);
        }
    }
    

?>