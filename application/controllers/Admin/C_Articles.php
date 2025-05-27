<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Articles extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Article');
        $this->load->model('M_Category');
        $this->load->model('M_User'); // Optional jika ingin dropdown author
        $this->load->helper(['url', 'form']);
        $this->load->library('form_validation');
    }

    public function index() {
        $data['articles'] = $this->M_Article->get_all();
        $this->load->view('admin/articles/V_index', $data);
    }

    public function create() {
        $data['categories'] = $this->M_Category->get_all();
        $this->load->view('admin/articles/V_create', $data);
    }

    public function store() {
        $this->form_validation->set_rules('title', 'Judul', 'required');
        $this->form_validation->set_rules('content', 'Konten', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = [
                'user_id'     => 1, // Sementara pakai user_id 1, bisa dari session nanti
                'category_id' => $this->input->post('category_id'),
                'title'       => $this->input->post('title'),
                'slug'        => url_title($this->input->post('title'), 'dash', TRUE),
                'content'     => $this->input->post('content'),
                'status'      => $this->input->post('status')
            ];
            $this->M_Article->insert($data);
            redirect('admin/c_articles');
        }
    }

    public function edit($id) {
        $data['article'] = $this->M_Article->get_by_id($id);
        $data['categories'] = $this->M_Category->get_all();
        $this->load->view('admin/articles/V_edit', $data);
    }

    public function update($id) {
        $data = [
            'category_id' => $this->input->post('category_id'),
            'title'       => $this->input->post('title'),
            'slug'        => url_title($this->input->post('title'), 'dash', TRUE),
            'content'     => $this->input->post('content'),
            'status'      => $this->input->post('status')
        ];
        $this->M_Article->update($id, $data);
        redirect('admin/c_articles');
    }

    public function delete($id) {
        $this->M_Article->delete($id);
        redirect('admin/c_articles');
    }
}
