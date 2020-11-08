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
    
    //method untuk menambah rating
	public function tambahRating()
	{
        //memanggil method set untuk mengisi variable pada Model_barang
        $this->Model_barang->set('id_brg', $this->id_brg);
        $this->Model_barang->set('rating', $this->rating);
        //memanggil method tambahRating untuk menambah rating di Model_barang
        $this->Model_barang->tambahRating();
        //jika sudah maka akan dialihkan ke url dibawah ini
        redirect('Dashboard/detail/' . $this->id_brg);
	}


}
