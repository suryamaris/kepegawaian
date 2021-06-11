<?php
defined('BASEPATH') or exit('No direct script acces allowed');


class Data_model extends CI_Model
{

    public function getHosting($table)
    {
        $res = $this->db->get($table);
        return $res->result_array();
    }

    public function getWhere($table, $data)
    {
        $res = $this->db->get_where($table, $data);
        return $res->result_array();
    }

    public function Insert($table, $data)
    {
        $res = $this->db->insert($table, $data);
        return $res;
    }

    public function Update($table, $data, $where)
    {
        $res = $this->db->update($table, $data, $where);
        return $res;
    }

    public function Delete($table, $where)
    {
        $res = $this->db->delete($table, $where);
        return $res;
    }

    public function update_data()
    {
        $this->load->view('user/edit');
        $data = array(
            'name' => $this->input->post('name'),
            'jabatan' => $this->input->post('jabatan'),
            'agama' => $this->input->post('agama'),
            'alamat' => $this->input->post('alamat'),
            'email' => $this->input->post('email'),
            'hp' => $this->input->post('hp')
        );
        return $data;
    }
}
