<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class home_model extends CI_Model {

    public function getDj()
    {
      return $this->db->get('dj')->result_array();
    }
    public function getGaleri()
    {
      return $this->db->get('galeri')->result_array();
    }

    public function getTiket()
    {
        return $this->db->get('tiket')->result_array();
    }

    public function getKonten()
    {
        $this->db->select('*');
        $this->db->from('event');
        $this->db->where('status_event', 'aktif');
        return $this->db->get()->result_array();
    }
    
    public function getSponsor()
    {
        return $this->db->get('sponsor')->result_array();
    }

    // public function getHistory()
    // {
    //     return $this->db->query('SELECT *, g.nama_guest, e.id_event FROM history h JOIN event e ON h.id_event = e.id_event JOIN guest g ON e.id_event = g.id_event')->result_array();
    // }

    public function getHistoryPesan()
    {
        $this->db->select('*');
        $this->db->from('transaksi t');
        $this->db->join('user u', 't.id_user = u.id_user');
        $this->db->where('t.id_user', $_SESSION['id_user']);
        return $this->db->get()->result_array();
    }

    public function getFaq()
    {
        return $this->db->get('faq')->result_array();
    }

    public function getDetailJadwal()
    {
        $this->db->select('*');
        $this->db->from('detail_jadwal j');
        $this->db->join('jadwal dj', 'j.id_jadwal = dj.id_jadwal');
        $this->db->order_by('waktu', 'asc');
        
        return $this->db->get()->result_array();
    }

    public function getJadwal()
    {
        return $this->db->get('jadwal')->result_array();
        
    }

    public function getTiketCart($id)
    {
        $result = $this->db->where('id_tiket', $id)
                           ->limit(1)
                           ->get('tiket');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }

    public function pesan()
    {

        foreach ($this->cart->contents() as $items) {
            $qty = $items['qty'];
            $id_tiket  = $items['id'];
        }

        $jumlah = $qty;

        $data = array(
            'id_user'           => $this->input->post('id_user'),
            'qty'               => $qty,
            'tanggal'           => time(),
            'status'            => 1
        );
        $this->db->insert('transaksi', $data);
        $id_transaksi = $this->db->insert_id();
        
        if ($qty != null) {
            for ($qty = 1; $qty <= $jumlah; $qty++) {
                $data = array(
                    'id_transaksi'      => $id_transaksi, 
                    'id_tiket'          => $id_tiket
                );
                $this->db->insert('detail_transaksi', $data);
            }
        }
    }

    

}

/* End of file home_model.php */
