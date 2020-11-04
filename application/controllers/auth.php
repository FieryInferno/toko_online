<?php 

    Class Auth extends CI_Controller
    {
        public function login(){

            $this->form_validation->set_rules('username', 'Username','required', [
                'required' => 'Username wajib diisi!'
            ]);
            $this->form_validation->set_rules('password', 'Password','required', [
                'required' => 'Password wajib diisi!'
            ]);
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('templates/header');
                $this->load->view('form_login');
                // tidak menggunakan footer agar footer nya tidak tabrakan
                // jadi ini menggunanakan footer tersendiri
            } else {
                $auth = $this->model_auth->cek_login();
                if ($auth == FALSE) {
                    $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Username atau Password Anda Salah!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>'); 
                    redirect('auth/login');
                } else {
                    // menambahkan user id biar bisa dipanggil dimanapun
                    $this->session->set_userdata('id_user', $auth->id_user);
                    $this->session->set_userdata('username', $auth->username);
                    $this->session->set_userdata('role_id', $auth->role_id);
                    
                    switch($auth->role_id){
                        // role id antara 1 dan 2, case 1 artinya role id di db 1 dst
                        case 1 : redirect('admin/dashboard_admin'); break;
                        case 2 : redirect('welcome'); break;
                        default: break;
                    }
                }
                
            }
        }

        public function logout()
        {
            $this->session->sess_destroy();
            echo '<script>
                alert("Sukses! Anda berhasil logout."); 
                window.location.href="'.base_url('auth/login').'";
                </script>';
        }
    }

?>