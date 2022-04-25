<?php require APPROOT . "/views/includes/header.php"; ?>

<div class="row form__container pb-5">
  <div class="col-md-6 mx-auto mb-5">
    <div class="card card-body bg-light mt-5">
      <h2 class="text-center">LOGIN</h2>
      <p class="text-center">Please fill your credentials to login</p>
      <form action="<?php echo URLROOT; ?>/users/login" method="POST">
        <div class="form-group">
          <label for="user_email">Email : <sup class="text-danger">*</sup></label>
          <input type="email" name="user_email" class="form-control form-control-lg <?php echo (!empty($data['user_email_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['user_email']; ?>">
          <span class="invalid-feedback"><?php echo $data['user_email_error']; ?></span>
        </div>
        <div class="form-group">
          <label for="user_password">Password : <sup class="text-danger">*</sup></label>
          <input type="password" name="user_password" class="form-control form-control-lg <?php echo (!empty($data['user_password_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['user_password']; ?>">
          <span class="invalid-feedback"><?php echo $data['user_password_error']; ?></span>
        </div>
        <div class="row mt-3 form__footer">
          <div class="col form__footer__right">
            <input type="submit" value="Login" class="btn btn-success d-block form__btn">
          </div>
          <div class="col form__footer__left">
            <a href="<?php echo URLROOT; ?>/users/register" class="btn btn-light">Don't have account ? <span class="text-success text-decoration-underline">Register</span></a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<?php require APPROOT . "/views/includes/footer.php"; ?>