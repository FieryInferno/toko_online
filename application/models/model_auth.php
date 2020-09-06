<?php 

    Class Model_auth extends CI_Model   
    {
        public function cek_login()
        {
            $username   = set_value('username');
            $password   = set_value('password');

            $result     = $this->db->where('username', $username)
                                            ->where('password', $password)
                                            ->limit(1)
                                            ->get('tb_users');
            if ($result->num_rows() > 0) {
                // row karena diminta hanya mengembalikan limit 1 orang itu aja yang masuk
                return $result->row();
            } else {
                return array();
            }
            
        }
    }


?>