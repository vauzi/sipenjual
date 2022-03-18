<?php defined('BASEPATH') or exit('No direct script access allowed');


 function get_dataset($kategori,$nama_barang)
 {
    $ci=& get_instance();
    $ci->load->database(); 
    
    $sql ="SELECT * FROM dataset WHERE kategori='$kategori' AND nama_barang='$nama_barang'"; 

    $query = $ci->db->query($sql);
    $count = $query->result();
    if(count($count) > 0){

        $row = $query->row();
        $status = $row->status;
    } else {
        $status ="-";
    }
    return $status;
 }


?>