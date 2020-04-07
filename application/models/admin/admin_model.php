<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_model extends CI_Model {

	public function show_admin()
	{
        $this->db->select('*');
        $this->db->from('admin a');
        return $this->db->get();
    }   
    
    public function add_admin(){
        $admin = [
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
            'aktif' => 1,
            'created_at' => time()
        ];
        $this->db->insert('admin',$admin);
    }

    public function delete_admin($id_admin){
        $hapus = $this->db->query("DELETE FROM admin WHERE id_admin = $id_admin");
        return $hapus;
    }

    // public function input($data){
    //     try{
    //         $this->db->insert('guest', $data);
    //         return true;
    //       }catch(Exception $e){
    //       }
    // }
    public function get_transaksi(){
        $this->db->select('*');
        $this->db->from('transaksi t');
        $this->db->join('user u', 't.id_user = u.id_user');
        return $this->db->get()->result_array();
    }

    public function data_member(){
        
        $this->db->select('*');
        $this->db->from('user');
        return $this->db->get()->result_array();
    }

    public function cetak_member(){
        $this->db->select('*');
        $this->db->from('user');
        return $this->db->get()->result_array();
    }

    public function update_transaksi($id,$status){
        $query= $this->db->query("UPDATE transaksi SET status = '$status' WHERE id_transaksi = '$id'");
        return $query;
    }
}
