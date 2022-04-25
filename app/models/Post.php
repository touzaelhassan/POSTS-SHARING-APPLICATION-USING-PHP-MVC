<?php
class Post
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function add_post($data)
  {
    $this->db->query('INSERT INTO posts (user_id, post_title, post_body) VALUES (:user_id, :post_title, :post_body)');

    $this->db->bind(':user_id', $data['user_id']);
    $this->db->bind(':post_title', $data['post_title']);
    $this->db->bind(':post_body', $data['post_body']);

    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  function get_posts()
  {

    $this->db->query(
      'SELECT *,
      posts.post_id as postId,
      users.user_id as userId,
      posts.created_at as postCreated,
      users.created_at as userCreated 
      FROM posts
      INNER JOIN users
      ON posts.user_id = users.user_id
      ORDER BY posts.created_at DESC'
    );

    return $this->db->result_set();
  }

  public function get_post_by_id($post_id)
  {
    $this->db->query('SELECT * FROM posts WHERE post_id = :post_id');
    $this->db->bind(':post_id', $post_id);
    return $this->db->single();
  }

  public function update_post($data)
  {
    $this->db->query('UPDATE posts SET post_title = :post_title, post_body = :post_body WHERE post_id = :post_id');

    $this->db->bind(':post_id', $data['post_id']);
    $this->db->bind(':post_title', $data['post_title']);
    $this->db->bind(':post_body', $data['post_body']);

    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
}
