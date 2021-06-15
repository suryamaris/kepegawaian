<?php

use phpDocumentor\Reflection\Types\This;

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function index()
    {
        $this->load->model('data_model');
        $info['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->library('pagination');

        // ambil data keyword
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }
        $this->load->model('data_model');
        //Config Pagination
        $this->db->like('name', $data['keyword']);
        $this->db->from('user');
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 5;

        //Inisialisasi Pagination
        $this->pagination->initialize($config);

        $start = $this->uri->segment(3);
        $data = $this->data_model->getPegawaiLimit($config['per_page'], $start, $data['keyword']);
        $data = array('data' => $data);
        $data['total_rows'] = $config['total_rows'];


        $this->load->view('templates/header', $info);
        $this->load->view('templates/sidebar', $info);
        $this->load->view('templates/topbar', $info);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer',);
    }

    public function dataPegawai($id)
    {
        $data['user'] = $this->db->get_where('user', array('id' => $id))->row_array();
        $data['tindakan'] = null;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/dataPegawai', $data);
        $this->load->view('templates/footer',);
    }
    public function editPegawai($id)
    {
        $data['user'] = $this->db->get_where('user', array('id' => $id))->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/editDataPegawai', $data);
        $this->load->view('templates/footer',);
    }
    public function updatePegawai()
    {
        $this->load->view('admin/editDataPegawai');
        $this->load->model('data_model');
        //Upadte data
        $data = $this->data_model->update_data();
        $where = array('id' => $this->input->post('id'));;
        $res = $this->data_model->Update('user', $data, $where);
        //kembali jika sudah update
        $id = $this->input->post('id');
        if ($res > 0) {
            redirect(base_url('admin/dataPegawai/' . $id), 'refresh');
        }
    }

    public function Tindakan($id)
    {

        $admin = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $this->db->get_where('user', array('id' => $id))->row_array();
        $data['tindakan'] = $this->input->post('tindakan');
        $data['kirim'] = $this->input->post('submit');
        $isi['data'] = array(
            'no' => $this->input->post('no'),
            'isi' => $this->input->post('isi'),
            'nama' => $this->input->post('nama1'),
            'jabatan' => $this->input->post('jabatan1'),
            'tanggal' => date('d F Y', time()),
            'admin' => $admin['name']
        );
        if ($data['kirim'] == 'Kirim') {
            $this->load->view('admin/cetak', $isi);
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/dataPegawai', $data);
        $this->load->view('templates/footer',);
    }

    public function cetakAbsen($cari)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $where = array('tanggal' => urldecode($cari));
        $data['cari'] = urldecode($cari);
        $data['tanggal'] = $this->db->get_where('absensi', $where)->result_array();
        $this->load->view('admin/cetakAbsen', $data);
    }
}
