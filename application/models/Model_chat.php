<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_chat extends CI_Model {

    private $admin;
    private $user;
    private $id_chat;
    private $penerima;
    private $pengirim;
    private $isi;

	public function set($jenis, $isi)
    {
        $this->$jenis   = $isi;
    }

    public function get()
    {
        $this->db->select('tb_users.nama, tb_chat.id_chat, tb_chat.admin, tb_chat.user');
        $this->db->join('tb_users', 'tb_chat.admin = tb_users.id_user');
        $this->db->join('tb_isi_chat', 'tb_chat.id_chat = tb_isi_chat.id_chat', 'left');
        $data   = $this->db->get_where('tb_chat', [
            'admin' => $this->admin,
            'user'  => $this->user
        ])->row_array();
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
        switch ($this->session->role_id) {
            case '1':
                $role_id    = [
                    'admin'  => $this->session->id_user,
                ];
                break;
            case '2':
                $role_id    = [
                    'user'  => $this->session->id_user
                ];
                break;
            
            default:
                # code...
                break;
        }
        $this->db->select('tb_users.nama, tb_chat.id_chat, tb_chat.admin, user.nama as namaUser, tb_chat.user');
        $this->db->join('tb_users', 'tb_chat.admin = tb_users.id_user');
        $this->db->join('tb_users as user', 'tb_chat.user = user.id_user');
        $data   = $this->db->get_where('tb_chat', $role_id)->result_array();
        for ($i=0; $i < count($data); $i++) { 
            $this->db->select('isi');
            $this->db->order_by('waktu', 'DESC');
            $data[$i]['chat_terakhir']  = $this->db->get_where('tb_isi_chat', [
                'id_chat'   => $data[$i]['id_chat']
            ])->row_array();
        }
        return $data;
    }
}
