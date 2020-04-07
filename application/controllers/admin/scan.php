<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class scan extends CI_Controller {

    public function index()
    {
        $data['konten'] = 'admin/scan';
		$data['transaksi'] = $this->admin->get_transaksi();
		$this->load->view('template_admin', $data);
    }

}

/* End of file scan.php */
