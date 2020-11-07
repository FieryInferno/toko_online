<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

    private $id_brg;
    private $rating;

    public function __construct() {
        parent::__construct();
        $this->id_brg   = $this->input->post('id_brg');
        $this->rating   = $this->input->post('rating');
    }
    
	public function tambahRating()
	{
        $this->Model_barang->set('id_brg', $this->id_brg);
        $this->Model_barang->set('rating', $this->rating);
        $this->Model_barang->tambahRating();
        redirect('Dashboard/detail/' . $this->id_brg);
	}


}
