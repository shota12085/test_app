<?php 
  class Comments extends CI_Controller{
    public function create($news_id){
      $this->form_validation->set_rules('text', 'Text', 'required');

      $data['comments'] = $this->comment_model->create_comment($news_id);
      redirect('news/'.$news_id);
    }
  }