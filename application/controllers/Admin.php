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
        $this->load->model('data_model');
        $admin = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $this->db->get_where('user', array('id' => $id))->row_array();
        $data['tindakan'] = $this->input->post('tindakan');

        // masukan data tindakan

        $data['kirim'] = $this->input->post('submit');



        $isi['data'] = array(
            'no' => $this->input->post('no'),
            'isi' => $this->input->post('isi'),
            'perihal' => $this->input->post('perihal'),
            'tujuan' => $this->input->post('tujuan'),
            'nama' => $this->input->post('nama'),
            'jabatan1' => $this->input->post('jabatan1'),
            'jabatan2' => $this->input->post('jabatan2'),
            'bagian1' => $this->input->post('bagian1'),
            'bagian2' => $this->input->post('bagian2'),
            'tanggal' => date('d F Y', time()),
            'admin' => $admin['name']
        );

        if ($data['kirim'] == 'Kirim') {

            $masuk = array(
                'nama' => $isi['data']['nama'],
                'tanggal' => $isi['data']['tanggal'],
                'jenis' => 'Peringatan'
            );

            $this->data_model->Insert('tindakan', $masuk);
            $this->load->view('admin/cetak', $isi);
        } elseif ($data['kirim'] == 'Submit') {
            $masuk = array(
                'nama' => $isi['data']['nama'],
                'tanggal' => $isi['data']['tanggal'],
                'jenis' => $isi['data']['tujuan'],
                'jabatan1' => $isi['data']['jabatan1'],
                'jabatan2' => $isi['data']['jabatan2'],
                'bagian1' => $isi['data']['bagian1'],
                'bagian2' => $isi['data']['bagian2']
            );
            $update = array(
                'jabatan' => $isi['data']['jabatan2'],
                'bagian' => $isi['data']['bagian2']
            );

            $this->data_model->Insert('tindakan', $masuk);
            $this->data_model->Update('user', $update, ['name' => $isi['data']['nama']]);
            $this->load->view('admin/cetakMutasi', $isi);
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
    public function cetakAbsenHadir($cari)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $where = array('tanggal' => urldecode($cari));
        $data['cari'] = urldecode($cari);
        $selain = array('Cuti', 'Iizn');
        $this->db->where_not_in('masuk', $selain);
        $data['tanggal'] = $this->db->get_where('absensi', $where)->result_array();
        $this->load->view('admin/cetakAbsen', $data);
    }
    public function cetakAbsenCuti($cari)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $where = array('tanggal' => urldecode($cari), 'masuk' => 'Cuti');
        $data['cari'] = urldecode($cari);
        $data['tanggal'] = $this->db->get_where('absensi', $where)->result_array();
        $this->load->view('admin/cetakAbsen', $data);
    }
    public function cetakAbsenIzin($cari)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $where = array('tanggal' => urldecode($cari), 'masuk' => 'Izin');
        $data['cari'] = urldecode($cari);
        $data['tanggal'] = $this->db->get_where('absensi', $where)->result_array();
        $this->load->view('admin/cetakAbsen', $data);
    }
    public function cetakAbsenPegawai($nama)
    {
        $data['nama'] = urldecode($nama);
        $where = array('nama' => $data['nama']);
        $data['pegawai'] = $this->db->get_where('absensi', $where)->result_array();
        $this->load->view('admin/cetakAbsenPegawai', $data);
    }

    public function cetakTindakan($bulan)
    {

        $data['bulan'] = $bulan;
        $this->db->like('tanggal', $bulan);
        $data['pencarian'] = $this->db->get('tindakan')->result_array();
        $this->load->view('admin/cetakTindakan', $data);
    }
    public function cetakTindakanMutasi($bulan)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->db->like('tanggal', $bulan);
        $data['bulan'] = $bulan;
        $data['pencarian'] = $this->db->get_where('tindakan', ['jenis' => 'Mutasi'])->result_array();
        $this->load->view('admin/cetakTindakan', $data);
    }
    public function cetakTindakanPromosi($bulan)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->db->like('tanggal', $bulan);
        $data['bulan'] = $bulan;
        $data['pencarian'] = $this->db->get_where('tindakan', ['jenis' => 'Promosi'])->result_array();
        $this->load->view('admin/cetakTindakan', $data);
    }
    public function cetakTindakanDemosi($bulan)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->db->like('tanggal', $bulan);
        $data['bulan'] = $bulan;
        $data['pencarian'] = $this->db->get_where('tindakan', ['jenis' => 'Demosi'])->result_array();
        $this->load->view('admin/cetakTindakan', $data);
    }
}
