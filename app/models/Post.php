<?php
class Post
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
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
}
