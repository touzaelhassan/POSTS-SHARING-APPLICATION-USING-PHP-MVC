<?php

class User
{
  private $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function get_user_by_email($user_email)
  {
    $this->db->query('SELECT * FROM users WHERE user_email= :user_email');
    $this->db->bind(':user_email', $user_email);
    $user = $this->db->single();

    if ($this->db->row_count() > 0) {
      return true;
    } else {
      return false;
    }
  }
}
