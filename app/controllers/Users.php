<?php

class Users extends Controller
{
  public function __construct()
  {
    $this->userModel = $this->model('User');
  }

  public function register()
  {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $data = [
        'user_name' => trim($_POST['user_name']),
        'user_email' => trim($_POST['user_email']),
        'user_password' => trim($_POST['user_password']),
        'user_confirm_password' => trim($_POST['user_confirm_password']),

        'user_name_error' => '',
        'user_email_error' => '',
        'user_password_error' => '',
        'user_confirm_password_error' => '',
      ];

      if (empty($data['user_name'])) {
        $data['user_name_error'] = 'Pleae enter name';
      }

      if (empty($data['user_email'])) {
        $data['user_email_error'] = 'Pleae enter email';
      } else {
        if ($this->userModel->get_user_by_email($data['user_email'])) {
          $data['user_email_error'] = 'Email is already taken';
        }
      }

      if (empty($data['user_password'])) {
        $data['user_password_error'] = 'Pleae enter password';
      } elseif (strlen($data['user_password']) < 6) {
        $data['user_password_error'] = 'Password must be at least 6 characters';
      }

      if (empty($data['user_confirm_password'])) {
        $data['user_confirm_password_error'] = 'Pleae confirm password';
      } else {
        if ($data['user_password'] != $data['user_confirm_password']) {
          $data['user_confirm_password_error'] = 'Password do not match';
        }
      }

      if (empty($data['user_name_error']) && empty($data['user_email_error']) && empty($data['user_password_error']) && empty($data['user_confirm_password_error'])) {

        $data['user_password'] = password_hash($data['user_password'], PASSWORD_DEFAULT);

        if ($this->userModel->register($data)) {
          $this->view('users/signup-success', []);
        } else {

          die('Something went wrong');
        }
      } else {
        $this->view('users/register', $data);
      }
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

      $data = [
        'user_email' => trim($_POST['user_email']),
        'user_password' => trim($_POST['user_password']),

        'user_email_error' => '',
        'user_password_error' => '',
      ];

      if (empty($data['user_email'])) {
        $data['user_email_error'] = 'Pleae enter email';
      } elseif (!$this->userModel->get_user_by_email($data['user_email'])) {
        $data['user_email_error'] = 'User email not found';
      }

      if (empty($data['user_password'])) {
        $data['user_password_error'] = 'Pleae enter password';
      }

      if (empty($data['user_email_error']) && empty($data['user_password_error'])) {
        $logged_in_user = $this->userModel->login($data['user_email'], $data['user_password']);
        if ($logged_in_user) {

          $this->create_user_session($logged_in_user);
        } else {
          $data['user_password_error'] = 'Password incorret';
          $this->view('users/login', $data);
        }
      } else {
        $this->view('users/login', $data);
      }
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

  public function create_user_session($logged_in_user)
  {
    $_SESSION["user_id"] = $logged_in_user->user_id;
    $_SESSION["user_name"] = $logged_in_user->user_name;
    $_SESSION["user_email"] = $logged_in_user->user_email;
    $this->view('users/login-success', []);
  }

  public function logout()
  {
    unset($_SESSION["user_id"]);
    unset($_SESSION["user_name"]);
    unset($_SESSION["user_email"]);
    session_destroy();
    $this->view('users/logout-confirm', []);
  }
}
