<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class transaksi extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $data=$this->db->get_where('admin',['email'=>$this->session->userdata('email')])->row_array();
        if(!isset($data)){
            redirect('log/login');
        }
    }

	public function index()
	{
		$data['data']=$this->db->get_where('admin',['email'=>
		$this->session->userdata('email')])->row_array();
        //nama
        $data['transaksi']=$this->admin->get_transaksi();
        $data['konten']='admin/transaksi_masuk';
		$this->load->view('template_admin',$data);
    }
    
    public function update(){
        $this->load->model('admin_model','admin');
        $id = $this->input->post('id');
        $status = $this->input->post('status');
        $this->admin->update_transaksi($id,$status);
        redirect('admin/transaksi');
    }
}
