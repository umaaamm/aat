<!-- page-wrapper Start-->
<div class="page-wrapper">
      <div class="container-fluid p-0">
        <!-- login page start-->
        <div class="authentication-main mt-0">
          <div class="row">
            <div class="col-md-12">
              <div class="auth-innerright auth-bg">
                <div class="authentication-box">
                  <div class="mt-4">
                    <div class="card-body p-0">
                    <?php echo $this->session->flashdata('notif');?>
                      <div class="cont text-center">
                        <div> 
                          <form class="theme-form needs-validation" method="post" action="<?php echo base_url('auth/authentification')?>">
                            <h4>LOGIN</h4>
                            <h6>Enter your Username and Password</h6>
                            <div class="form-group">
                              <label class="col-form-label pt-0">Username</label>
                              <input class="form-control" type="text" name="username" required="Username Tidak Boleh Kosong">
                            </div>
                            <div class="form-group">
                              <label class="col-form-label">Password</label>
                              <input class="form-control" type="password" name="password" required="Password Tidak Boleh Kosong">
                            </div>
                            <div class="form-group row mt-3 mb-0">
                              <button class="btn btn-primary btn-block" type="submit">LOGIN</button>
                            </div>
                            <div class="login-divider"></div>
                          </form>
                        </div>
                        <div class="sub-cont">
                          <div class="img">
                            <div class="img__text m--up">
                              <h2>New User?</h2>
                              <p>Sign up and discover great amount of new opportunities!</p>
                            </div>
                          </div>
                          <div>
                            <form class="theme-form">
                            <h4>LOGIN</h4>
                            <h6>Enter your Username and Password</h6>
                            <div class="form-group">
                              <label class="col-form-label pt-0">Your Name</label>
                              <input class="form-control" type="text" required="">
                            </div>
                            <div class="form-group">
                              <label class="col-form-label">Password</label>
                              <input class="form-control" type="password" required="">
                            </div>
                            <div class="form-group row mt-3 mb-0">
                              <button class="btn btn-primary btn-block" type="submit">LOGIN</button>
                            </div>
                            <div class="login-divider"></div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- login page end-->
      </div>
    </div>