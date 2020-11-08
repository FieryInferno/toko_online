<?php 

    class Model_barang extends CI_Model
    {

        private $id_brg;
        private $rating;

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

        //method untuk mengambil data barang
        public function detail_brg($id_brg)
        {
            //mengambil data barang berdasarkan id_brg
            $result = $this->db->get_where('tb_barang', [
                'id_brg'    => $id_brg
            ])->row_array();
            //jika data barang ada, maka akan dilakukan proses penghitungan rating
            if($result){
                //mengambil data rating di tb_rating
                $rating = $this->db->get_where('tb_rating', [
                    'id_brg'    => $id_brg
                ])->result_array();
                //mengecek apakah data rating ada atau tidak
                if ($rating) {
                    //jika data rating ada, maka akan dilakukan perhitungan rating
                    $totalRating    = 0;
                    foreach ($rating as $key) {
                        //menghitung total rating dari barang
                        $totalRating    += (integer) $key['rating'];
                    }
                    //kemudian membaginya dengan jumlah rating untuk menghasilkan nilai rating
                    $result['rating']   = $totalRating/count($rating);
                } else {
                    //jika tidak ada data rating, maka nilai rating akan diset 0
                    $result['rating']   = 0;
                }
                return $result;
            }
            else{
                return false;
            }                            
        }

        public function set($jenis, $isi)
        {
            $this->$jenis   = $isi;
        }

        //method yang berfungsi untuk menambah rating
        public function tambahRating()
        {
            $this->db->insert('tb_rating', [
                'id_rating' => uniqid(),
                'id_brg'    => $this->id_brg,
                'rating'    => $this->rating
            ]);
        }
    }
    

?>