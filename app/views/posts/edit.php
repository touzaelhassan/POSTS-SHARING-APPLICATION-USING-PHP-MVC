<?php require APPROOT . "/views/includes/header.php"; ?>
<a href="<?php echo URLROOT; ?>/posts" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
<div class="card card-body bg-light nt-5">
  <h2>Edit Post</h2>
  <p>Edit your post</p>
  <form action="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['post_id']; ?>" method="post">
    <div class="form-group">
      <label for="post_title">Post Title: <sup>*</sup></label>
      <input type="text" name="post_title" class="form-control form-control-lg <?php echo (!empty($data['post_title_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['post_title']; ?>">
      <span class="invalid-feedback"><?php echo $data['post_title_error']; ?></span>
    </div>
    <div class="form-group">
      <label for="post_body">Body: <sup>*</sup></label>
      <textarea name="body" class="form-control form-control-lg <?php echo (!empty($data['post_body_error'])) ? 'is-invalid' : ''; ?>"><?php echo $data['post_body']; ?></textarea>
      <span class="invalid-feedback"><?php echo $data['post_body_error']; ?></span>
    </div>
    <input type="submit" class="btn btn-success" value="Edit">
  </form>
</div>

<?php require APPROOT . "/views/includes/footer.php"; ?>