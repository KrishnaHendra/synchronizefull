<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tiket extends CI_Model {

    public function index($id){
        $query = $this->db->query("SELECT * FROM transaksi t JOIN user u ON t.id_user = u.id_user WHERE id_transaksi = '$id'");
        return $query->result_array();
    }

}

/* End of file ModelName.php */
