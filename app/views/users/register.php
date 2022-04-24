<?php require APPROOT . "/views/includes/header.php"; ?>

<div class="row">
  <div class="col-md-6 mx-auto">
    <div class="card card-body bg-light mt-5">
      <h2 class="text-center">Create An Account</h2>
      <p class="text-center">Please fill out this form to register with us</p>
      <form action="<?php echo URLROOT; ?>/users/resgister" method="POST">
        <div class="form-group">
          <label for="user_name">Userame : <sup class="text-danger">*</sup></label>
          <input type="text" name="user_name" class="form-control form-control-lg <?php echo (!empty($data['user_name_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['user_name']; ?>">
          <span class="invalid-feedback"><?php echo $data['user_name_error']; ?></span>
        </div>
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
        <div class="form-group">
          <label for="user_confirm_password">Confirm Password : <sup class="text-danger">*</sup></label>
          <input type="password" name="user_confirm_password" class="form-control form-control-lg <?php echo (!empty($data['user_confirm_password_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['user_confirm_password']; ?>">
          <span class="invalid-feedback"><?php echo $data['user_confirm_password_error']; ?></span>
        </div>
        <div class="row mt-3">
          <div class="col">
            <input type="submit" value="Register" class="btn btn-success d-block">
          </div>
          <div class="col">
            <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-light btn-block">Have an
              account? Login</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<?php require APPROOT . "/views/includes/footer.php"; ?>