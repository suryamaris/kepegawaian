<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absensi extends CI_Controller
{
    public function Index()
    {
        $this->load->model('data_model');
        $cari = $this->input->post('absen');
        if ($cari == 'Cari') {

            $data['cari'] = $this->input->post('tanggal') . ' ' . $this->input->post('bulan') . ' ' . $this->input->post('tahun');
        } else {
            $data['cari'] = date('d F Y', time());
        }
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $where = array('tanggal' => $data['cari']);
        $data['tanggal'] = $this->db->get_where('absensi', $where)->result_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('absensi/index', $data);
        $this->load->view('templates/footer');
    }

    public function absenPegawai($nama)
    {
        $this->load->model('data_model');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $where = array('nama' => urldecode($nama));
        $data['nama'] = $nama;
        $data['absen'] = $this->db->get_where('absensi', $where)->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('absensi/pegawai', $data);
        $this->load->view('templates/footer');
    }
}
