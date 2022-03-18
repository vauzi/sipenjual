<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->library('session');
        if($this->session->userdata['user_logged'] == TRUE){
            $this->load->model('dataset_model');
            $this->load->helper('func_helper');
        } else {
            redirect('login');
        }
    }


    public function index(){
        $data_atribut['list_atribut_kategori'] = $this->dataset_model->list_atribut_kategori();
        $data_atribut['list_atribut_barang'] = $this->dataset_model->list_atribut_barang();
        $data_atribut['list_dataset'] = $this->dataset_model->list_dataset();
        $data_atribut['list_report'] = $this->dataset_model->list_result();
        $this->load->view('__partials/header');
        $this->load->view('__partials/loader');
        $this->load->view('dashboard',$data_atribut);
        $this->load->view('__partials/js');
    }

}

?>