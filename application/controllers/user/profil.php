<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class profil extends CI_Controller {

    public function index()
    {
        $data['transaksi'] = $this->home_model->getHistoryPesan();
        $this->load->view('user/profil', $data);
    }

}

/* End of file profil.php */
