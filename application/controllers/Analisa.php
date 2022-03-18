<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Analisa extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->library('session');
        if($this->session->userdata['user_logged'] == TRUE){

            $this->load->model('dataset_model');
        } else {
            redirect('login');
        }
    }


    public function index(){
        $data_atribut['list_atribut_kategori'] = $this->dataset_model->list_atribut_kategori();
        $this->load->view('__partials/header');
        $this->load->view('__partials/js');
        $this->load->view('__partials/loader');
        $this->load->view('analisa',$data_atribut);
    }

}

?>