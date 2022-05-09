<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>::eBazar:: 404 Page </title>
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/ebazar.style.min.css">
</head>

<body>
    <div id="ebazar-layout" class="theme-blue">

        <!-- main body area -->
        <div class="main p-2 py-3 p-xl-5">

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
                                <form class="row g-1 p-3 p-md-4">
                                    <div class="col-12 text-center mb-4">
                                        <img src="<?php echo base_url()?>assets/images/not_found.svg"
                                            class="w240 mb-4" alt="" />
                                        <h5><?php echo $heading; ?></h5>
                                        <span class=""><?php echo $message; ?></span>
                                    </div>
                                    <div class="col-12 text-center">

                                     
                                        <a onclick="history.back()" title=""
                                            class="btn btn-lg btn-block btn-light lift text-uppercase">GO BACK</a>
                                    </div>
                                </form>
                                <!-- End Form -->
                            </div>
                        </div>
                    </div> <!-- End Row -->

                </div>
            </div>

        </div>

    </div>

    <!-- Jquery Page Js -->
    <script src="<?php echo base_url()?>assets/js/template.js"></script>
    <script src="<?php echo base_url()?>assets/js/index.js"></script>
</body>

</html>