<?php 

    class Dashboard extends CI_Controller   {
        
        public function index()
        {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('dashboard');
            $this->load->view('templates/footer');
        }

        public function error_404()
        {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('error_404');
            $this->load->view('templates/footer');
        }


    }

?>