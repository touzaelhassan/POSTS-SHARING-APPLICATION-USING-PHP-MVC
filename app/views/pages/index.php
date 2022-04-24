<?php require APPROOT . "/views/includes/header.php"; ?>

<div class="h-100 p-5 bg-light border rounded-3 text-center mt-5">
  <div class="container">
    <h1 class="display-3"><?php echo $data['title']; ?></h1>
    <p class="lead text-secondary"><?php echo $data['description']; ?></p>
  </div>
</div>

<?php require APPROOT . "/views/includes/footer.php"; ?>