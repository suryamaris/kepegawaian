<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function index()
    {
        $this->load->model('data_model');
        $info['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->library('pagination');
        $this->load->model('data_model');
        //Config Pagination
        $config['base_url'] = 'http://localhost/pegawai/admin/index/';
        $config['total_rows'] = $this->data_model->countAllPegawai();
        $config['per_page'] = 7;
        //Styling
        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</a></li>';

        $config['attributes'] = array('class' => 'page-link');
        //Inisialisasi Pagination
        $this->pagination->initialize($config);

        $start = $this->uri->segment(3);
        $data = $this->data_model->getPegawaiLimit($config['per_page'], $start);
        $data = array('data' => $data);


        $this->load->view('templates/header', $info);
        $this->load->view('templates/sidebar', $info);
        $this->load->view('templates/topbar', $info);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer',);
    }

    public function dataPegawai($id)
    {
        $data['user'] = $this->db->get_where('user', array('id' => $id))->row_array();
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
}
