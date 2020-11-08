<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_chat extends CI_Model {

    //ini variable yang dimiliki oleh model chat
    private $admin;
    private $user;
    private $id_chat;
    private $penerima;
    private $pengirim;
    private $isi;

    //method yang berfungsi untuk mengisi variabel yang dimiliki oleh model chat
	public function set($jenis, $isi)
    {
        $this->$jenis   = $isi;
    }

    //ini method yang berfungsi untuk mengambil data chat
    public function get()
    {
        $this->db->select('tb_users.nama, tb_chat.id_chat, tb_chat.admin, tb_chat.user');
        $this->db->join('tb_users', 'tb_chat.admin = tb_users.id_user');
        $this->db->join('tb_isi_chat', 'tb_chat.id_chat = tb_isi_chat.id_chat', 'left');
        //ini adalah data chat antara user dan admin
        $data   = $this->db->get_where('tb_chat', [
            'admin' => $this->admin,
            'user'  => $this->user
        ])->row_array();

        //kemudian data chat diatas akan ditambah data isi chat dari setiap data chat yang akan ditampilkan
        $this->db->select('tb_isi_chat.*, tb_penerima.nama as nama_penerima, tb_penerima.role_id as role_penerima, tb_pengirim.nama as nama_pengirim, tb_pengirim.role_id as role_pengirim');
        $this->db->join('tb_users as tb_penerima', 'tb_isi_chat.penerima = tb_penerima.id_user');
        $this->db->join('tb_users as tb_pengirim', 'tb_isi_chat.pengirim = tb_pengirim.id_user');
        $data['isi_chat']   = $this->db->get_where('tb_isi_chat', [
            'id_chat'   => $data['id_chat']
        ])->result_array();
        return $data;
    }

    public function create()
    {
        $this->db->insert('tb_chat', [
            'id_chat'   => uniqid(),
            'user'      => $this->user,
            'admin'     => $this->admin
        ]);
    }

    public function kirim()
    {
        $this->db->insert('tb_isi_chat', [
            'id_isi_chat'   => uniqid(),
            'id_chat'       => $this->id_chat,
            'pengirim'      => $this->pengirim,
            'penerima'      => $this->penerima,
            'isi'           => $this->isi      
        ]);
    }

    public function get_admin()
    {
        return $this->db->get_where('tb_users', [
            'role_id'   => '1'
        ])->result_array();
    }

    public function get_penerima()
    {
        //mengecek role_id user
        switch ($this->session->role_id) {
            case '1':
                $role_id    = [
                    'admin'         => $this->session->id_user,
                    'hapus_admin'   => 0
                ];
                break;
            case '2':
                $role_id    = [
                    'user'          => $this->session->id_user,
                    'hapus_user'    => 0
                ];
                break;
            
            default:
                # code...
                break;
        }
        $this->db->select('tb_users.nama, tb_chat.id_chat, tb_chat.admin, user.nama as namaUser, tb_chat.user');
        $this->db->join('tb_users', 'tb_chat.admin = tb_users.id_user');
        $this->db->join('tb_users as user', 'tb_chat.user = user.id_user');
        if ($this->session->role_id == '3') {   
            $data   = $this->db->get('tb_chat')->result_array();
        } else {
            $data   = $this->db->get_where('tb_chat', $role_id)->result_array();
        }
        for ($i=0; $i < count($data); $i++) { 
            $this->db->select('isi');
            $this->db->order_by('waktu', 'DESC');
            $data[$i]['chat_terakhir']  = $this->db->get_where('tb_isi_chat', [
                'id_chat'   => $data[$i]['id_chat']
            ])->row_array();
        }
        return $data;
    }

    //method untuk menghapus chat berdasarkan role
    public function delete($role)
    {
        //mengecek role
        switch ($role) {
            case 'admin':
                $data   = [
                    'hapus_admin'   => '1'
                ];
                break;
            case 'user':
                $data   = [
                    'hapus_user'   => '1'
                ];
                break;
            
            default:
                # code...
                break;
        }
        //mengupdate data pada tb_chat
        $this->db->where('id_chat', $this->id_chat);
        $this->db->update('tb_chat', $data);
    }
}
