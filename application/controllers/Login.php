<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
    }

    public function index(){
        if($this->input->post()){
            if($this->admin_model->login()=='admin'){
                redirect(site_url('dashboard'));
            } else if($this->admin_model->login()=='kasir'){
                redirect(site_url('kasir'));
            } 
        }
         
        $this->load->view('login');
    }

    public function login(){
        $this->admin_model->login();
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect(site_url('login'));
    }
}
