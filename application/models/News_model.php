<?php
  class News_model extends CI_Model {
  
          public function __construct()
          {
            $this->load->database();
          }
  

          public function get_news($id = FALSE)
          {
            if ($id === FALSE)
            { 
              $this->db->order_by('id','DESC');
              $query = $this->db->get('news');
              return $query->result_array();
            }
          
            $query = $this->db->get_where('news', array('id' => $id));
            return $query->row_array();
          }

          public function create_news(){
            $slug = url_title($this->input->post('title'), 'dash', TRUE);

            $data = [
              'title' => $this->input->post('title'),
              'slug' => $slug,
              'text' => $this->input->post('text')
            ];

            return $this->db->insert('news', $data);
          }

          public function update_news(){
            $slug = url_title($this->input->post('title'), 'dash', TRUE);

            $data = [
              'title' => $this->input->post('title'),
              'slug' => $slug,
              'text' => $this->input->post('text')
            ];
            $this->db->where('id', $this->input->post('id'));
            return $this->db->update('news', $data);
          }

          public function delete_news($id){
            $this->db->where('id', $id);
            $this->db->delete('news');
            return true;
          }
  }