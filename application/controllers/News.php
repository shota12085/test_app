<?php
class News extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('news_model');
                $this->load->helper('url_helper');
                $this->load->helper('text');
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

        public function show($id)
        {
        $data['news'] = $this->news_model->get_news($id);
        $data['category'] = $this->news_model->get_category($data['news']);
        $data['comments'] = $this->comment_model->get_comment($id);
        // print_r($data['category']);
        if (empty($data['news']))
        {
                show_404();
        }

        $data['title'] = $data['news']['title'];

        $this->load->view('templates/header', $data);
        $this->load->view('news/show', $data);
        $this->load->view('templates/footer');
        }

        public function create(){
          $data['title'] = 'Create News';

          $data['categories'] = $this->news_model->get_categories();

          $this->form_validation->set_rules('title', 'Title', 'required');
          $this->form_validation->set_rules('text', 'Text', 'required');

          if($this->form_validation->run() === FALSE){
            $this->load->view('templates/header', $data);
            $this->load->view('news/create', $data);
            $this->load->view('templates/footer', $data);
          }else{
            // upload image
            $config['upload_path'] = './assets/images/news';
            $config['allowed_types'] = "gif|jpg|png|jpeg|pdf";
            $config['encrypt_name'] = TRUE;
            $config['max_size'] = '2048';
            // $config['max_width'] = '500';
            // $config['max_height'] = '500';

            $this->load->library('upload', $config);

            if(!$this->upload->do_upload('userfile')){
              $errors = array('error' => $this->upload->display_errors());
              $image = 'noimage.png';
            }else{
              $data = array('upload_data' => $this->upload->data());
              $image = $data['upload_data']['file_name'];
              // print_r($data['upload_data']['file_name']);
            }

            $this->news_model->create_news($image);
            redirect('news');
          }
        }

        public function edit($id){
          $data['news'] = $this->news_model->get_news($id);
          $data['categories'] = $this->news_model->get_categories();
          // $data['set'] = $this->news_model->get_category($data['news']);
          // print_r($data['set']);
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

