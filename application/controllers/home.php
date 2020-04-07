<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
    }

    public function index()
    {
        $this->load->view('user/landing_test');
    }
    
    public function home()
    {
        $data['galeri'] = $this->home_model->getGaleri();
        $data['tiket'] = $this->home_model->getTiket();
        $data['guest'] = $this->gs_model->getGuest();
        $data['konten'] = $this->home_model->getKonten();
        $data['sponsor'] = $this->home_model->getSponsor();
        $data['jadwal'] = $this->home_model->getJadwal();
        $data['detail_jadwal'] = $this->home_model->getDetailJadwal();
        $data['faq'] = $this->home_model->getFaq();
        $this->load->view('template', $data);
    }
        
    public function add_item($id)
    {
        if(!isset($_SESSION['logged_in'])){
            redirect('log/login','refresh');
        } else {
            $tiket = $this->home_model->getTiketCart($id);
            $qty = $this->input->post('qty');
            $jumlah = $this->input->post('qty');
            
            if ($qty != null) {
                for ($qty = 1; $qty <= $jumlah; $qty++) {
                    $data = array(
                        'id'      => $id,
                        'qty'     => 1,
                        'price'   => $tiket->harga,
                        'name'    => $tiket->kelas
                    );
                    
                    $this->cart->insert($data);
                }
            }
            redirect('user/checkout','refresh');
        }
    }

    public function plusQty($id)
    {
        $tiket = $this->home_model->getTiketCart($id);
        $data = array(
            'id'      => $id,
            'qty'     => 1,
            'price'   => $tiket->harga,
            'name'    => $tiket->kelas
        );
        
        $this->cart->insert($data);
        redirect('user/checkout','refresh');
    }
    
    public function minQty($id)
    {
        $tiket = $this->home_model->getTiketCart($id);
        $data = array(
            'id'      => $id,
            'qty'     => -1,
            'price'   => $tiket->harga,
            'name'    => $tiket->kelas
        );
        
        $this->cart->insert($data);
        redirect('user/checkout','refresh');
    }

    public function pesan()
    {
        $this->form_validation->set_rules('id_user', 'id_user', 'trim|required');
        
        if ($this->form_validation->run() == TRUE) {
            $this->home_model->pesan();
            $this->cart->destroy();

            $config = array(
                'protocol' => 'smtp',
                'smtp_host'     => 'ssl://smtp.googlemail.com',
                'smtp_port'     => 465,
                'smtp_user'     => 'anggieakbar025@gmail.com',
                'smtp_pass'     => 'abyan789',
                'mailtype'      => 'html',
                'charset'       => 'iso-8859-1'
            );

            $this->load->library('email', $config);

            $this->email->set_newline("\n\n");
            
            $this->email->from('anggieakbar025@gmail.com', 'Anggie');
            $this->email->to('anggieakbar09@gmail.com');
            
            $this->email->subject('Konfirmasi Pembelian');
            $this->email->message('Terima kasih sudah membeli tiket melalui aplikasi kami. Segera lakukan pembayaran.');
            
            return $this->email->send();

            
            $this->session->set_flashdata('terbeli','<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="fa fa-check-circle"></i> Berhasil membeli tiket!
            </div>');
            redirect('user/profil','refresh');
        } else {
            $this->session->set_flashdata('gagal_pesan', 'Pesanan Gagal Dibuat');
            redirect('user/checkout','refresh');
        }
    }
    
    public function hapusCart()
    {
        $this->cart->destroy();
        redirect('user/checkout','refresh');
    }

}

/* End of file home.php */
