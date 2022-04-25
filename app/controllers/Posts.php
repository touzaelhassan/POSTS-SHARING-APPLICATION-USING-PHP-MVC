<?php

class Posts extends Controller
{

  public function __construct()
  {
    if (!isset($_SESSION['user_id'])) {
      redirect('users/login');
    }
    $this->postModel  = $this->model('Post');
    $this->userModel  = $this->model('User');
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

  public function edit($post_id)
  {
    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
      $data = [
        'user_id' => trim($_SESSION['user_id']),
        'post_id' => $post_id,
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
        if ($this->postModel->update_post($data)) {
          redirect('posts');
        } else {
          die('Something went wrong');
        }
      } else {
        $this->view('posts/edit', $data);
      }
    } else {
      $post = $this->postModel->get_post_by_id($post_id);
      if ($post->user_id != $_SESSION['user_id']) {
        redirect('posts');
      }
      $data = [
        'post_id' => $post_id,
        'post_title' => $post->post_title,
        'post_body' => $post->post_body
      ];

      $this->view('posts/edit', $data);
    }
  }


  public function show($post_id)
  {
    $post = $this->postModel->get_post_by_id($post_id);
    $user_id = $post->user_id;
    $user = $this->userModel->get_user_by_id($user_id);

    $data = [
      'post' => $post,
      'user' => $user
    ];

    $this->view('posts/show', $data);
  }
}
