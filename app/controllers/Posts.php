<?php

class Posts extends Controller
{

  public function __construct()
  {
    if (!isset($_SESSION['user_id'])) {
      redirect('users/login');
    }

    $this->postModel  = $this->model('Post');
  }

  public function index()
  {
    $posts = $this->postModel->get_posts();

    $data = [
      'posts' => $posts
    ];
    $this->view('posts/index', $data);
  }

  public function add()
  {
    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
      $data = [
        'user_id' => trim($_SESSION['user_id']),
        'post_title' => trim($_POST['post_title']),
        'post_body' => trim($_POST['body']),
        'post_title_error' => '',
        'post_body_error' => '',
      ];

      if (empty($data['post_title'])) {
        $data['post_title_error'] = 'Please enter title';
      }

      if (empty($data['post_body'])) {
        $data['post_body_error'] = 'Please enter body';
      }

      if (empty($data['post_title_error']) && empty($data['post_body_error'])) {
        if ($this->postModel->add_post($data)) {
          redirect('posts');
        } else {
          die('Something went wrong');
        }
      } else {
        $this->view('posts/add', $data);
      }
    } else {
      $data = [
        'post_title' => '',
        'post_body' => ''
      ];

      $this->view('posts/add', $data);
    }
  }
}
