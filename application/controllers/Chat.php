<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {

    private $admin;
    private $user;
    private $id_chat;
    private $penerima;
    private $pengirim;
    private $isi;

    public function __construct() {
        parent::__construct();
        // user wajib dipaksa login dulu sebelum mengakses dashboardnya masing-masing
        if ($this->session->userdata('role_id') == null) {
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Anda Belum Login!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('auth/login');
        } else {
            switch ($this->session->role_id) {
                case '1':
                    $this->user    = $this->input->post('user');
                    $this->admin   = $this->session->id_user;
                    break;
                case '2':
                    $this->admin    = $this->input->post('admin');
                    $this->user     = $this->session->id_user;
                    break;
                
                default:
                    # code...
                    break;
            }
            $this->id_chat  = $this->input->post('id_chat');
            $this->penerima = $this->input->post('penerima');
            $this->pengirim = $this->input->post('pengirim');
            $this->isi      = $this->input->post('isi');# code...
        }
        
    }

	public function index()
	{
        $data['admin']      = $this->Model_chat->get_admin();
        $data['penerima']   = $this->Model_chat->get_penerima();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('chat/index', $data);
		$this->load->view('templates/footer');
    }
    
    public function isi($id = null)
	{
        if ($id) {
            switch ($this->session->role_id) {
                case '1':
                    $this->Model_chat->set('user', $id);
                    $this->Model_chat->set('admin', $this->admin);
                    break;
                case '2':
                    $this->Model_chat->set('admin', $id);
                    $this->Model_chat->set('user', $this->user);
                    break;
                
                default:
                    # code...
                    break;
            }
        } else {
            $this->Model_chat->set('admin', $this->admin);
            $this->Model_chat->set('user', $this->user);
        }
        $cek    = $this->Model_chat->get();
        if (!isset($cek['nama'])) {
            $this->Model_chat->create();
        }
        $data['isi']   = $this->Model_chat->get();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('chat/isi', $data);
		$this->load->view('templates/footer');
    }
    
    public function kirim()
    {
        $this->Model_chat->set('id_chat', $this->id_chat);
        $this->Model_chat->set('penerima', $this->penerima);
        $this->Model_chat->set('pengirim', $this->pengirim);
        $this->Model_chat->set('isi', $this->isi);
        $this->Model_chat->kirim();     
        $this->isi($this->penerima);                  
    }
}
