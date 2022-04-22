<?php

class Pages extends Controller
{
  public function __construct()
  {
  }

  public function index()
  {
    $this->view("Hello From View");
  }

  public function about($id)
  {
    echo $id;
  }
}
