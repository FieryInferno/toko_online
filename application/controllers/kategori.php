<?php 

    Class Kategori extends CI_Controller
    {
        public function elektronik()
        {
            $data['elektronik'] = $this->model_kategori->data_elektronik()->result();
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('elektronik', $data);
            $this->load->view('templates/footer');
        }

    }

?>