<?php require APPROOT . "/views/includes/header.php"; ?>
<a href="<?php echo URLROOT; ?>/posts" class="btn btn-light"><i class="fa fa-backward"></i>Back</a>
<h1><?php echo $data['post']->post_title; ?></h1>
<div class="mb-3 p-2 text-white bg-secondary">
  Written by <span><?php echo $data['user']->user_name; ?></span> On <?php echo $data['post']->created_at; ?>
</div>
<p><?php echo $data['post']->post_body; ?></p>
<?php if ($data['post']->user_id == $_SESSION['user_id']) : ?>
  <hr>
  <div class="d-flex justify-content-between">
    <a href="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['post']->post_id; ?>" class="btn btn-dark px-4">Edit</a>
    <form action="<?php echo URLROOT ?>/posts/delete/<?php echo $data['post']->post_id; ?>" method="POST">
      <input type="submit" value="Delete" class="btn btn-danger">
    </form>
  </div>
<?php endif ?>
<?php require APPROOT . "/views/includes/footer.php"; ?>