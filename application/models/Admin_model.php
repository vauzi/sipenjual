<?php defined('BASEPATH') or exit('No direct script access allowed');


class Admin_model extends CI_Model
{
    private $_table = "admin";

    public function login()
    {
        $post = $this->input->post();
        $this->db->where('username', $post['username'])->or_where('password', $post['password']);
        $user = $this->db->get($this->_table)->row();
        $password = $user->password;

        if ($user) {
            if ($post['password'] == $password) {
                $this->session->set_userdata(['user_logged' => $user]);
                return $user->role;
            } else {
                $this->session->set_flashdata('message', 'Username Atau Password Anda Salah');
                return false;
            }
        }
        return false;
    }
}
