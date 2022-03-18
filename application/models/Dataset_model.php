<?php defined('BASEPATH') or exit('No direct script access allowed');


class Dataset_model extends CI_Model
{
    private $_table_dataset = "dataset";
    private $_table_nama_barang = "atribut_barang";
    private $_table_atribut_kategori = "atribut_kategori";




    // Atribut Kategori

    public function list_atribut_kategori(){
        return $this->db->query("SELECT * FROM atribut_kategori ORDER BY nama_kategori");
    }


    public function add_atribut_kategori()
    {
        $post = $this->input->post();
        $kategori = $post['kategori'];

        $data = array(
            'id_kategori' => '',
            'nama_kategori' => $kategori,
        );

        $res = $this->db->insert($this->_table_atribut_kategori, $data);
        if ($res) {
            $response = array('message' => 'Sukses Tambah Atribut Kategori', 'status' => true);
            $this->session->set_flashdata('message_kategori', $response);
        } else {

            $response = array('message' => 'Gagal Tambah Atribut Kategori', 'status' => false);
            $this->session->set_flashdata('message_kategori', $response);
        }
        $role = $this->session->userdata('user_logged')->role;
        if($role =='admin'){

            redirect(base_url('dataset'));
        } elseif($role =='kasir'){

            redirect(base_url('kasir'));
        }
    }

    public function hapus_atribut_kategori($id)
    {
        $res = $this->db->delete($this->_table_atribut_kategori, array('id_kategori' => $id));
        if ($res) {
            $response = array('message' => 'Sukses Hapus Atribut Kategori', 'status' => true);
            $this->session->set_flashdata('message', $response);
        } else {

            $response = array('message' => 'Gagal Hapus Atribut Kategori', 'status' => false);
            $this->session->set_flashdata('message', $response);
        }
        $role = $this->session->userdata('user_logged')->role;
        if($role =='admin'){

            redirect(base_url('dataset'));
        } elseif($role =='kasir'){

            redirect(base_url('kasir'));
        }
    }



    // Atribut Barang
    public function detail_atribut_barang($id)
    {
        return $this->db->get_where($this->_table_nama_barang, array("id_atr_barang" => $id));
    }

    public function get_atribut_barang($kategori)
    {
        // $this->db->select('*');
        // $this->db->from($this->_table_nama_barang);
        // $this->db->where("kategori = $kategori");
        // $this->db->group_by("nama_atribut");
        // $this->db->order_by('kategori', 'asc');
        // $query = $this->db->get();
        // return $query->result();
        return $this->db->query("SELECT * FROM atribut_barang WHERE kategori='$kategori' GROUP BY nama_atribut ORDER BY nama_atribut");
        // return  $this->db->get_where($this->_table_nama_barang, array("kategori" => $kategori));
    }

    public function get_tipe_barang($nama_barang)
    {
        $this->db->select('*');
        $this->db->from($this->_table_nama_barang);
        $this->db->where("nama_atribut = $nama_barang");
        $this->db->group_by("nama_atribut");
        $this->db->order_by('nama_atribut', 'asc');
        $query = $this->db->get();
        return $query->result();

        // return $this->db->get_where($this->_table_nama_barang, array("nama_atribut" => $nama_barang));
    }
    
    public function list_atribut_barang(){
        return $this->db->query("SELECT * FROM atribut_barang ORDER BY nama_atribut ASC");
    }

  


    public function add_atribut_barang()
    {
        $post = $this->input->post();
        $nama_atribut = $post['nama_atribut'];
        $kategori = $post['kategori'];

        $data = array(
            'id_atr_barang' => '',
            'nama_atribut' => $nama_atribut,
            'kategori' => $kategori
        );

        $res = $this->db->insert($this->_table_nama_barang, $data);
        if ($res) {
            $response = array('message' => 'Sukses Tambah Atribut Nama Barang', 'status' => true);
            $this->session->set_flashdata('message_barang', $response);
        } else {

            $response = array('message' => 'Gagal Tambah Atribut Nama Barang', 'status' => false);
            $this->session->set_flashdata('message_barang', $response);
        }
        $role = $this->session->userdata('user_logged')->role;
        if($role =='admin'){

            redirect(base_url('dataset'));
        } elseif($role =='kasir'){

            redirect(base_url('kasir'));
        }
    }

    public function hapus_atribut_barang($id)
    {
        $res = $this->db->delete($this->_table_nama_barang, array('id_atr_barang' => $id));
        if ($res) {
            $response = array('message' => 'Sukses Hapus Atribut Nama Barang', 'status' => true);
            $this->session->set_flashdata('message_barang', $response);
        } else {

            $response = array('message' => 'Gagal Hapus Atribut Nama Barang', 'status' => false);
            $this->session->set_flashdata('message_barang', $response);
        }
        $role = $this->session->userdata('user_logged')->role;
        if($role =='admin'){

            redirect(base_url('dataset'));
        } elseif($role =='kasir'){

            redirect(base_url('kasir'));
        }
    }

    public function edit_atribut_barang()
    {
        $post = $this->input->post();
        $this->id_atr_barang = $post['id_atr_barang'];
        $this->nama_atribut = $post['nama_atribut'];
        $this->kategori=$post['kategori'];

        $res = $this->db->update($this->_table_nama_barang, $this, array('id_atr_barang' => $post['id_atr_barang']));

        if ($res) {
            $response = array('message' => 'Sukses Edit Atribut Nama Barang', 'status' => true);
            $this->session->set_flashdata('message_barang', $response);
        } else {

            $response = array('message' => 'Gagal Edit Atribut Nama Barang', 'status' => false);
            $this->session->set_flashdata('message_barang', $response);
        } 
        $role = $this->session->userdata('user_logged')->role;
        if($role =='admin'){

            redirect(base_url('dataset'));
        } elseif($role =='kasir'){

            redirect(base_url('kasir'));
        }
    }

    // DataSet

    public function list_dataset(){
        return $this->db->query("SELECT * FROM dataset ORDER BY kategori");
    }


    public function add_dataset()
    {
        $post = $this->input->post();
        $kategori = $post['kategori'];
        $nama_barang = $post['nama_barang'];
        $stok = $post['stok'];
        $terjual = $post['terjual'];
        if($terjual >= 30){
            $status ="LAKU";
        }
        if($terjual <30){
            $status = "TIDAK LAKU";
        }

        $data = array(
            'id_dataset' => '',
            'kategori' => $kategori,
            'nama_barang' => $nama_barang,
            'stok' => $stok,
            'terjual' => $terjual,
            'status' => $status,
        );

        $res = $this->db->insert($this->_table_dataset, $data);
        if ($res) {
            $response = array('message' => 'Sukses Tambah Dataset', 'status' => true);
            $this->session->set_flashdata('message_dataset', $response);
        } else {

            $response = array('message' => 'Gagal Tambah Dataset', 'status' => false);
            $this->session->set_flashdata('message_dataset', $response);
        }
        $role = $this->session->userdata('user_logged')->role;
        if($role =='admin'){

            redirect(base_url('dataset'));
        } elseif($role =='kasir'){

            redirect(base_url('kasir'));
        }
    }

    public function add_result($kategori,$nama_barang,$laku,$tidak_laku,$hasil){
        $data = array(
            'id_report' => '',
            'tgl'=> date('Y-m-d H:i:s'),
            'kategori' => $kategori,
            'nama_barang' => $nama_barang,
            'laku' =>$laku,
            'tidak_laku' =>$tidak_laku,
            'hasil' => $hasil
        );
        $this->db->insert('report', $data);
    }

    public function list_result(){
        return $this->db->query("SELECT * FROM report ORDER BY id_report");
    }

}
