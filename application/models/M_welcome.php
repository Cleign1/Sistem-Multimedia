<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_welcome extends CI_Model {
    public function create($id, $filename) {
        $data = [
            'id'=> $id,
            'name'=> $this->input->post('name', TRUE),
            'description'=> $this->input->post('description', TRUE),
            'filename'=> $filename
        ];

        $this->db->insert('post', $data);
    }

    public function read($id = FALSE) {
        if ($id == false) {
            return $this->db->get('Post') -> result_array();
        } else {
            $query = $this -> db -> get_where('post', ['id' => $id]);
            return $query->row();
        }
    }

    public function update($id) {
        $data = [
            'name'=> $this->input->post('name', TRUE),
            'description'=> $this->input->post('description', TRUE),
        ];
        $this->db->where('id', $id);
        $this->db->update('post', $data);
    }
}