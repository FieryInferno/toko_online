<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {

    private $admin;
    private $user;
    private $id_chat;
    private $penerima;
    private $pengirim;
    private $isi;
    private $id_isi_chat;

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
            $this->id_chat      = $this->input->post('id_chat');
            $this->penerima     = $this->input->post('penerima');
            $this->pengirim     = $this->input->post('pengirim');
            $this->isi          = $this->input->post('isi');
            $this->id_isi_chat  = $this->input->post('id_isi_chat');
        }
    }

	public function index()
	{
        //memanggil method get_penerima untuk mengambil data chat
        $data['penerima']   = $this->Model_chat->get_penerima();
        if ($this->session->role_id == 2) {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('chat/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar');
            $this->load->view('chat/index', $data);
            $this->load->view('templates_admin/footer');
        }
		
    }
    
    public function isi($id = null, $id2 = null)
	{
        //Cek apakah id adminnya tidak kosong
        if ($id) {
            //Cek role id dari setiap user yang sedang login, kemudian akan mengisi variabel user dan admin yang ada di model chat
            switch ($this->session->role_id) {
                case '1':
                    //proses pengisian variabel user dan admin di model chat
                    $this->Model_chat->set('user', $id);
                    $this->Model_chat->set('admin', $this->admin);
                    break;
                case '2':
                    //proses pengisian variabel user dan admin di model chat
                    $this->Model_chat->set('admin', $id);
                    $this->Model_chat->set('user', $this->user);
                    break;
                case '3':
                    //proses pengisian variabel user dan admin di model chat
                    $this->Model_chat->set('user', $id);
                    $this->Model_chat->set('admin', $id2);
                    break;
                
                default:
                    # code...
                    break;
            }
        } else {
            $this->Model_chat->set('admin', $this->admin);
            $this->Model_chat->set('user', $this->user);
        }
        //Cek apakah chat antara admin dan user sudah ada atau belum 
        $cek    = $this->Model_chat->get();
        if (!isset($cek['nama'])) {
            //Jika chat belum ada, maka akan dibuatkan chat baru
            //jika ada maka tahap ini akan dilewati
            $this->Model_chat->create();
        }
        //Kemudian sistem akan mengambil data chat melalui model chat
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

    public function delete($id_chat, $id_user)
    {
        //mengisi variable user di model user
        $this->Model_user->set('id_user', $id_user);
        //mengambil data user
        $data   = $this->Model_user->get();
        //mengisi variable id_chat di model_chat
        $this->Model_chat->set('id_chat', $id_chat);
        //mengecek apakah user atau admin yang akan menghapus chat
        switch ($data['role_id']) {
            case '1':
                //memanggil method delete di Model_chat dan menghapus sesuai role
                $this->Model_chat->delete('admin');
                break;
            case '2':
                //memanggil method delete di Model_chat dan menghapus sesuai role
                $this->Model_chat->delete('user');
                break;
            
            default:
                # code...
                break;
        }
        //kemudian panggil kembali index untuk menampilkan halaman chat
        $this->session->set_flashdata('berhasil_hapus',
            '<div class="alert alert-success" role="alert">
                Chat Berhasil Dihapus 
            </div>'
        );
        redirect('chat');
    }

    public function hapus_isi_chat($id)
    {
        $this->Model_chat->set('id_isi_chat', $this->id_isi_chat);
        $this->Model_chat->hapus_isi_chat();
        redirect('Chat/isi/' . $id);
    }
}
