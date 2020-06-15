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
              $this->db->order_by('news.id','DESC');
              $query = $this->db->join('categories', 'news.category_id = categories.id')
                        ->select('news.id,news.title,news.text,news.image,news.created_at,categories.name')->get('news');
              return $query->result_array();
            }
          
            $query = $this->db->get_where('news', array('id' => $id));
            return $query->row_array();
          }

          public function get_categories(){
            $this->db->order_by('name');
            $query = $this->db->get('categories');
            return $query->result_array();
          }

          public function get_category($data){
            if($data){
              $query = $this->db->get_where('categories', array('id' => $data['category_id']));
              return $query->row_array();
            }
          }

          public function create_news($image){
            $slug = url_title($this->input->post('title'), 'dash', TRUE);

            $data = [
              'title' => $this->input->post('title'),
              'slug' => $slug,
              'text' => $this->input->post('text'),
              'category_id' => $this->input->post('category_id'),
              'image' => $image
            ];

            return $this->db->insert('news', $data);
          }

          public function update_news(){
            $slug = url_title($this->input->post('title'), 'dash', TRUE);

            $data = [
              'title' => $this->input->post('title'),
              'slug' => $slug,
              'text' => $this->input->post('text'),
              'category_id' => $this->input->post('category_id')
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