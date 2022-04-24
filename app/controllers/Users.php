<?php

class Users extends Controller
{
  public function __construct()
  {
  }

  public function register()
  {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    } else {
      $data = [
        'user_name' => '',
        'user_email' => '',
        'user_password' => '',
        'user_confirm_password' => '',
        'user_name_error' => '',
        'user_email_error' => '',
        'user_password_error' => '',
        'user_confirm_password_error' => '',
      ];

      $this->view('users/register', $data);
    }
  }

  public function login()
  {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    } else {
      $data = [
        'user_email' => '',
        'user_password' => '',
        'user_email_error' => '',
        'user_password_error' => '',
      ];

      $this->view('users/login', $data);
    }
  }
}
