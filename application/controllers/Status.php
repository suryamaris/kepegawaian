<?php

use phpDocumentor\Reflection\Types\This;

defined('BASEPATH') or exit('No direct script access allowed');

class status extends CI_Controller
{
    public function index()
    {
        $this->load->model('data_model');
        $info['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tindakan'] = $this->db->get('tindakan')->result_array();
        $data['cari'] = $this->input->post('submit');

        if ($data['cari'] == 'Cari') {
            $data['bulan'] = $this->input->post('bulan');
            $this->db->like('tanggal', $data['bulan']);
            $data['pencarian'] = $this->db->get('tindakan')->result_array();
        }

        $data['peringatan'] = $this->db->get_where('tindakan', ['jenis' => 'Peringatan'])->num_rows();
        $data['Mutasi'] = $this->db->get_where('tindakan', ['jenis' => 'Mutasi'])->num_rows();
        $data['Promosi'] = $this->db->get_where('tindakan', ['jenis' => 'Promosi'])->num_rows();
        $data['Demosi'] = $this->db->get_where('tindakan', ['jenis' => 'Demosi'])->num_rows();


        $this->load->view('templates/header', $info);
        $this->load->view('templates/sidebar', $info);
        $this->load->view('templates/topbar', $info);
        $this->load->view('status/index', $data);
        $this->load->view('templates/footer',);
    }
}
