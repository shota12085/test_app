<?php
class News extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('news_model');
                $this->load->helper('url_helper');
        }

        public function index()
        {
          $data['news'] = $this->news_model->get_news();
          $data['title'] = 'News Topic';
          // print_r($data['news']);
  
          $this->load->view('templates/header', $data);
          $this->load->view('news/index', $data);
          $this->load->view('templates/footer');
        }

        public function view($id)
        {
        $data['news'] = $this->news_model->get_news($id);

        if (empty($data['news']))
        {
                show_404();
        }

        $data['title'] = $data['news']['title'];

        $this->load->view('templates/header', $data);
        $this->load->view('news/view', $data);
        $this->load->view('templates/footer');
        }

        public function create(){
          $data['title'] = 'Create News';

          $this->form_validation->set_rules('title', 'Title', 'required');
          $this->form_validation->set_rules('text', 'Text', 'required');

          if($this->form_validation->run() === FALSE){
            $this->load->view('templates/header', $data);
            $this->load->view('news/create', $data);
            $this->load->view('templates/footer', $data);
          }else{
            $this->news_model->create_news();
            redirect('news');
          }
        }

        public function edit($id){
          $data['news'] = $this->news_model->get_news($id);

          if (empty($data['news']))
          {
                  show_404();
          }

          $data['title'] = 'Edit News';

          $this->load->view('templates/header', $data);
          $this->load->view('news/edit', $data);
          $this->load->view('templates/footer');
        }

        public function update(){
          $this->news_model->update_news();
          redirect('news');
        }

        public function delete($id){
            $this->news_model->delete_news($id);
            redirect('news');
        }
}

