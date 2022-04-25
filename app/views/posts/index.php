<?php require APPROOT . "/views/includes/header.php"; ?>

<div class="row my-3">
  <div class="col-md-6">
    <h1>Posts</h1>
  </div>
  <div class="col-md-6 text-end">
    <a href="<?php echo URLROOT; ?>/posts/add" class="btn btn-primary pull-right"><i class="fa-solid fa-plus pe-2"></i>ADD</a>
  </div>
</div>

<div class="posts">
  <?php foreach ($data['posts'] as $post) : ?>
    <div class="card card-body mb-3">
      <h4 class="card-title"><?php echo $post->post_title; ?></h4>
      <div class="bg-light p-2 mb-3">
        Written By <span><?php echo $post->user_name; ?></span> On <span><?php echo $post->postCreated; ?></span>
      </div>
      <p class="card-text"><?php echo $post->post_body  ?></p>
      <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->postId; ?>" class="btn btn-dark">Read More</a>
    </div>
  <?php endforeach; ?>
</div>

<?php require APPROOT . "/views/includes/footer.php"; ?>