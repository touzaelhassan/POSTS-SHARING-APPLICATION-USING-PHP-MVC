<?php

class User
{
  private $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function register($data)
  {
    $this->db->query('INSERT INTO users (user_name, user_email, user_password) VALUES (:user_name, :user_email, :user_password)');

    $this->db->bind(':user_name', $data['user_name']);
    $this->db->bind(':user_email', $data['user_email']);
    $this->db->bind(':user_password', $data['user_password']);

    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function get_user_by_email($user_email)
  {
    $this->db->query('SELECT * FROM users WHERE user_email= :user_email');
    $this->db->bind(':user_email', $user_email);
    $this->db->single();

    if ($this->db->row_count() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function login($user_email, $user_password)
  {
    $this->db->query('SELECT * FROM users WHERE user_email = :user_email');
    $this->db->bind(':user_email', $user_email);
    $db_user = $this->db->single();
    $db_user_password = $db_user->user_password;

    if (password_verify($user_password, $db_user_password)) {
      return $db_user;
    } else {
      return false;
    }
  }
}
