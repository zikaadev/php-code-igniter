<?php
class Posts extends CI_Controller{

  // get all posts
  public function index(){
    $data['title'] = 'Latest Posts';
    $data['posts'] = $this->post_model->get_posts();
    // print_r($data['posts']);

    $this->load->view('templates/header');
    $this->load->view('posts/index', $data);
    $this->load->view('templates/footer');
  }

// get 1 post
  public function view($slug = NULL){

    $data['post'] = $this->post_model->get_posts($slug);
    $data['category'] = $this->post_model->get_category($slug);

    if(empty($data['post'])){
      show_404;
    }

    $data['title'] = $data['post']['title'];

    $this->load->view('templates/header');
    $this->load->view('posts/view', $data);
    $this->load->view('templates/footer');
  }

// create post
  public function create()
  {
    $data['title'] = 'Create Post';
    $data['categories'] = $this->post_model->get_categories();

    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('body', 'Body', 'required');

    if($this->form_validation->run() === FALSE){
      $this->load->view('templates/header');
      $this->load->view('posts/create', $data);
      $this->load->view('templates/footer');
    } else{
      // Upload image
      $config['upload_path'] = './assets/images/posts';
      $config['allowed_types'] = 'gif|jpg|png';
      $config['max_size'] = '2048';
      $config['max_width'] = '300';
      $config['max_height'] = '300';
      $this->load->library('upload', $config);
      if(!$this->upload->do_upload()){
        $errors = array('error' => $this->upload->display_errors());
        $post_image = 'noimage.png';
      } else{
        $data = array('upload_data' => $this->upload->data());
        $post_image = $_FILES['userfile']['name'];
      }

      $this->post_model->create_post($post_image);
      // $this->load->view('posts/success');
      // ili
      // $this->load->view('templates/header');
      // $this->load->view('posts/index', $data);
      // $this->load->view('templates/footer');
      // IntlIterator
      redirect('posts');
    }
  }

  // delete post
    public function delete($id)
    {
      $this->post_model->delete_post($id);
      $data['title'] = 'Delete Post';
      redirect('posts');
    }

    // edit post
      public function edit($slug)
      {
        $data['post'] = $this->post_model->get_posts($slug);
        $data['categories'] = $this->post_model->get_categories();

        if(empty($data['post'])){
          show_404;
        }

        $data['title'] = 'Edit Post';

        $this->load->view('templates/header');
        $this->load->view('posts/edit', $data);
        $this->load->view('templates/footer');
      }

    // update post
      public function update()
      {
        $data['post'] = $this->post_model->update_post();
        redirect('posts');
      }
}
