<?php $this->load->view('templates/header')?>

<div class="wrapper">
     <div class="main-panel">
    <div class="content">
      <div class="row col-md-12">
        <div class="col-md-3"></div>
         <div class="col-md-6">
         <img src="<?php echo base_url()?>assets/img/logo.jpeg" alt="navbar brand" class="navbar-brand">
</div>
      </div>
      <div class="col-md-2"></div>

      <div class="col-md-8">
<div class="login-box">

<!-- /.login-logo -->
<div class="login-box-body">
  <p class="login-box-msg">welcome Login</p>
<p><?php if (isset($errors))  echo $errors; else   echo ""; ?> </p>
  <form action="<?php echo current_url() ?>" method="post">
    <div class="form-group has-feedback">
      <input type="text" class="form-control" name="username" id="username" placeholder="username" autocomplete="off">
      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
      <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off">
      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
    <div class="row">
      <div class="col-md-8">
        <div class="checkbox icheck">
          <label>
            <input type="checkbox"> Remember Me
          </label>
        </div>
      </div>
      <!-- /.col -->
      <div class="col-md-4">
        <button type="submit" class="btn btn-success btn-block btn-flat">Log In</button>
      </div>
      <!-- /.col -->
    </div>
  </form>


</div>
<!-- /.login-box-body -->
</div>
</div>
</div>
</div>
</div>


