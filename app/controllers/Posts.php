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
}
