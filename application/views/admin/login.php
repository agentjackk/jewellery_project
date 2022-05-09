<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- link Files -->
    <?php $this->load->view('admin/includes/link')?>
    <!-- link Files -->
</head>

<body>
    <div id="ebazar-layout" class="theme-blue">

        <!-- main body area -->
        <div class="main p-2 py-3 p-xl-5 ">

            <?php
               $rem_user = $this->session->userdata('rem_user'); 
               $rem_pass = $this->session->userdata('rem_pass');
               $rem_check = $this->session->userdata('remember');
            ?>

            <!-- Body: Body -->
            <div class="body d-flex p-0 p-xl-5">
                <div class="container-xxl">

                    <div class="row g-0">
                        <div
                            class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center rounded-lg auth-h100">
                            <div style="max-width: 25rem;">
                                <div class="text-center mb-5">
                                    <i class="bi bi-bag-check-fill  text-primary" style="font-size: 90px;"></i>
                                </div>
                                <div class="mb-5">
                                    <h2 class="color-900 text-center">A few clicks is all it takes.</h2>
                                </div>
                                <!-- Image block -->
                                <div class="">
                                    <img src="<?php echo base_url()?>assets/images/login-img.svg" alt="login-img">
                                </div>
                            </div>
                        </div>

                        <div
                            class="col-lg-6 d-flex justify-content-center align-items-center border-0 rounded-lg auth-h100">
                            <div class="w-100 p-3 p-md-5 card border-0 shadow-sm" style="max-width: 32rem;">
                                <!-- Form -->

                                <?php  
                                  $attributes = array('class' => 'row g-1 p-3 p-md-4', 'id' => 'loginform');
                                  echo form_open('admin/admin_login', $attributes);
                                ?>


                                <div class="col-12 text-center mb-5">
                                    <h1>Sign in</h1>
                                    <!-- <span>Free access to our dashboard.</span> -->
                                </div>
                                <div class="col-12 text-center mb-4">
                                    <!-- <a class="btn btn-lg btn-light btn-block" href="#">
                                            <span class="d-flex justify-content-center align-items-center">
                                                <img class="avatar xs me-2" src="<?php echo base_url()?>assets/images/google.svg" alt="Image Description">
                                                Sign in with Google
                                            </span>
                                        </a> -->
                                    <!-- <span class="dividers text-muted mt-4">OR</span> -->
                                </div>
                                <div class="col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Email address</label>
                                        <input type="email" class="form-control form-control-lg" name="username"
                                            placeholder="name@example.com"
                                            <?php  if($rem_user){ echo 'value="'.$rem_user.'"'; } ?> required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-2">
                                        <div class="form-label">
                                            <span class="d-flex justify-content-between align-items-center">
                                                Password
                                                <a class="text-secondary" href="auth-password-reset.html">Forgot
                                                    Password?</a>
                                            </span>
                                        </div>
                                        <input type="password" class="form-control form-control-lg"
                                            placeholder="*******" name="password"
                                            <?php  if($rem_pass){ echo 'value="'.$rem_pass.'"'; } ?> required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"  id="flexCheckDefault"
                                            name="remember" <?php  if($rem_check != ""){ echo $rem_check; } ?>>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Remember me
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 text-center mt-4">
                                    <button type="submit" class="btn btn-lg btn-block btn-light lift text-uppercase"
                                        atl="signin">SIGN IN</button>

                                </div>

                                <?php  echo form_close();?>
                                <!-- End Form -->

                            </div>
                        </div>
                    </div> <!-- End Row -->

                </div>
            </div>

        </div>

    </div>

    <!-- Script -->
    <?php $this->load->view('admin/includes/script')?>
    <!-- Script -->

</body>

</html>