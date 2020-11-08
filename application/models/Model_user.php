<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_user extends CI_Model {

    //variable yang dimiliki model user
    private $id_user;

    //method untuk mengambil data user
	public function get()
    {
        return $this->db->get_where('tb_users', [
            'id_user'   => $this->id_user
        ])->row_array();
    }

    //method untuk mengisi variable
    public function set($jenis, $isi)
    {
        $this->$jenis   = $isi;
    }
}
