<?php require APPROOT . "/views/includes/header.php"; ?>

<section class="hero">
  <div class="container p-0">
    <div class="p-5 bg-light border rounded-3 text-center mt-5 hero__header">
      <h1 class="display-3"><?php echo $data['title']; ?></h1>
      <p class="lead text-secondary"><?php echo $data['description']; ?></p>
    </div>
  </div>
</section>

<?php require APPROOT . "/views/includes/footer.php"; ?>