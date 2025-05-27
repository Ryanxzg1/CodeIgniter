<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Article extends CI_Model {

    private $table = 'articles';

    public function get_all() {
        $this->db->select('articles.*, users.name as author, categories.name as category');
        $this->db->from($this->table);
        $this->db->join('users', 'users.id = articles.user_id', 'left');
        $this->db->join('categories', 'categories.id = articles.category_id', 'left');
        $this->db->order_by('published_at', 'DESC');
        return $this->db->get()->result();
    }

    public function get_by_id($id) {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    public function insert($data) {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data) {
        return $this->db->update($this->table, $data, ['id' => $id]);
    }

    public function delete($id) {
        return $this->db->delete($this->table, ['id' => $id]);
    }
}
