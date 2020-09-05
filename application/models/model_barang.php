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
            // return $this->db->get('tb_barang');
        }

        public function tambah_barang($data, $table)
        {
            $this->db->insert($table, $data);
        }

        public function edit_barang($where, $table)
        {
            // mengembalikan nilai yang didapat dari get
            return $this->db->get_where($table, $where);
        }

        public function update_data($where, $data, $table)
        {
            $this->db->where($where);
            $this->db->update($table, $data);
        }

        public function hapus_data($where, $table)
        {
            $this->db->where($where);
            $this->db->delete($table);
        }

        public function find($id)
        {
            // menemukan id barang dari barang yang dipilih
            $result = $this->db->where('id_brg', $id)
                                ->limit(1)
                                ->get('tb_barang');

            // memeriksa berapa banyak baris yang Anda dapatkan
            if($result->num_rows() > 0){
                // kasikan 1 baris nilai berdasarkan id yang diminta
                return $result->row();
            }
            else{
                // output tulisan array dengan size 0 dan kosongan / empty
                return array();
            }
        }

        public function detail_brg($id_brg)
        {
            $result = $this->db->where('id_brg', $id_brg)
                                        ->get('tb_barang');
            if($result->num_rows() > 0){
                // artinya kembalikan semua datanya mau berapa data juga tampilkan
                return $result->result();
            }
            else{
                return false;
            }                            
        }
    }
    

?>