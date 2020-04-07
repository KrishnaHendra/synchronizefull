<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class tiket extends CI_Controller {

    public function index()
    {
        $data['data']=$this->db->get_where('admin',['email'=>
		$this->session->userdata('email')])->row_array();
		//nama
		$data['konten']='admin/tiket';
		$this->load->view('template_admin',$data);
    }
}

/* End of file tiket.php */
