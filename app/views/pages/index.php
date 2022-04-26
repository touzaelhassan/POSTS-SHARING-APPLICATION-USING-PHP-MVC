<?php require APPROOT . "/views/includes/header.php"; ?>

<section class="hero">
  <div class="container p-0">
    <div class="p-5 bg-light border rounded-3 text-center hero__header">
      <h1 class="display-3"><?php echo $data['title']; ?></h1>
      <p class="lead text-secondary"><?php echo $data['description']; ?></p>
    </div>
  </div>
</section>

<section class="intro-images">
  <div class="intro__content">
    <div class="intro__item">
      <img src="<?php echo URLROOT; ?>/images/share-1.jpg" alt="item">
    </div>
    <div class="intro__item">
      <img src="<?php echo URLROOT; ?>/images/share-2.jpg" alt="item">
    </div>
    <div class="intro__item">
      <img src="<?php echo URLROOT; ?>/images/share-3.jpg" alt="item">
    </div>
  </div>
</section>

<section class="intro-text">
  <div class="intro-text__content">
    <p class="intro__sub__title"><i class="fa-solid fa-share-from-square"></i></p>
    <h2 class="intro__title">Share your thoughts with others</h2>
    <a href="<?php echo URLROOT; ?>/users/register" class="intro__btn">SIGN UP</a>
  </div>
</section>

<?php require APPROOT . "/views/includes/footer.php"; ?>