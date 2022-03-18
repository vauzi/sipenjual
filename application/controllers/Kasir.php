<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Kasir extends CI_Controller{
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
        $data_atribut['list_atribut_barang'] = $this->dataset_model->list_atribut_barang();
        $data_atribut['list_dataset'] = $this->dataset_model->list_dataset();
        $this->load->view('kasir/__partials/header');
        $this->load->view('kasir/__partials/js');
        $this->load->view('kasir/__partials/loader');
        $this->load->view('kasir/dataset',$data_atribut);
    }

    // Atribut Kategori
    
    public function tambah_kategori(){
        $this->dataset_model->add_atribut_kategori();
    }

    public function hapus_kategori($id){
        $this->dataset_model->hapus_atribut_kategori($id);
    }

    public function get_dataset($kategori,$nama_barang,$tipe){
        $this->dataset_model->get_dataset($kategori,$nama_barang,$tipe);
    }

    // Atribut Nama Barang
    public function tambah_barang(){
        $this->dataset_model->add_atribut_barang();
    }

    public function hapus_barang($id){
        $this->dataset_model->hapus_atribut_barang($id);
    }

    public function edit_barang(){
        $this->dataset_model->edit_atribut_barang();
    }

    public function get_barang($kategori){
        $list_barang = $this->dataset_model->get_atribut_barang(urldecode($kategori))->result();
        foreach($list_barang as $brg){
            ?>
                <option value="<?= $brg->nama_atribut ?>"><?= $brg->nama_atribut ?></option>
            <?php
        }
    }
    public function get_tipe($nama_barang){
        $list_tipe = $this->dataset_model->get_tipe_barang(urldecode($nama_barang))->result();
        foreach($list_tipe as $tipe){
            ?>
                <option value="<?= $tipe->tipe_barang ?>"><?= $tipe->tipe_barang ?></option>
            <?php
        }
    }


    public function detail_barang($id){
        $data_atribut['list_atribut_kategori'] = $this->dataset_model->list_atribut_kategori();
        $data_atribut['detail_barang'] = $this->dataset_model->detail_atribut_barang($id)->result();
        $this->load->view('kasir/__partials/header');
        $this->load->view('kasir/__partials/loader');
        $this->load->view('kasir/detail_barang',$data_atribut);
        $this->load->view('kasir/__partials/js');
    }

    // Dataset 

    public function tambah_dataset(){
        $this->dataset_model->add_dataset();
    }

    



}
