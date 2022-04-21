<?php

class Pages
{
  public function __construct()
  {
  }

  public function index()
  {
    echo "The Index Method";
  }

  public function about($id)
  {
    echo $id;
  }
}
