<?php
  class Comment_model extends CI_Model{
    public function __construct(){
      $this->load->database();
    }

    public function get_comment($id){
      $query = $this->db->get_where('comments', array('news_id' => $id));
      return $query->result_array();
    }

    public function create_comment($news_id){
      $data = [
        'news_id' => $news_id,
        'text' => $this->input->post('text')
      ];
      return $this->db->insert('comments', $data);
    }
  }