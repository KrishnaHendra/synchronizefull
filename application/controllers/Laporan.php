<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
    
    public function __CONSTRUCT() {
        parent::__CONSTRUCT();
        $this->load->model('user/tiket','tiket');
        
    }

	public function index($id){
        $data['tiket']=$this->tiket->index($id);
        $this->load->library('mypdf');
        $this->mypdf->generate('tiket_pdf',$data);
    }
}
