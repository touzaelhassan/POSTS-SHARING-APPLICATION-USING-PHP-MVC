<?php

class Pages extends Controller
{
  public function __construct()
  {
  }

  public function index()
  {
    $data = ['title' => 'WELCOME TO THE HOMEPAGE'];
    $this->view('pages/index', $data);
  }

  public function about()
  {
    $data = ['title' => 'WELCOME TO THE ABOUT PAGE'];
    $this->view('pages/about', $data);
  }
}
