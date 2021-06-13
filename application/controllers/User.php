<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['perizinan'] = null;
        $nama = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['absensi'] = $this->db->get_where('absensi', ['nama' => $nama['name']])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer',);
    }

    public function Edit()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/edit', $data);
        $this->load->view('templates/footer',);
    }

    public function Update()
    {
        $this->load->view('user/edit');
        $this->load->model('data_model');
        //Upadte data
        $data = $this->data_model->update_data();
        $where = array('id' => $this->input->post('id'));
        $res = $this->data_model->Update('user', $data, $where);
        //kembali jika sudah update
        if ($res > 0) {
            redirect(base_url('user'), 'refresh');
        }
    }
    public function Perizinan()
    {
        $this->load->model('data_model');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['perizinan'] = $this->input->post('submit');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer',);
    }

    public function Absensi()
    {
        $this->load->model('data_model');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $nama = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['absensi'] = $this->db->get_where('absensi', ['nama' => $nama['name']])->row_array();
        $data['absen'] = $this->input->post('absen');
        if ($data['absen'] == 'Masuk') {
            $absen = array(
                'nama' => $nama['name'],
                'tanggal' => date('d F Y', time()),
                'masuk' => date('H:i', time())
            );
            $res = $this->data_model->Insert('absensi', $absen);
            if ($res > 0) {
                redirect(base_url('user'), 'refresh');
            }
        } elseif ($data['absen'] == 'Keluar') {
            $absen = array(
                'nama' => $nama['name'],
                'tanggal' => date('d F Y', time()),
                'keluar' => date('H:i', time())
            );
            $where = array('nama' => $absen['nama'], 'tanggal' => $absen['tanggal']);

            $res = $this->data_model->Update('absensi', $absen, $where);
            if ($res > 0) {
                redirect(base_url('user'), 'refresh');
            }
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer',);
    }
}
