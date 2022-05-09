<!doctype html>
<html class="no-js" lang="en" dir="ltr">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Inquiry Details </title>
    <!-- link Files -->
    <?php $this->load->view('admin/includes/link')?>
    <!-- link Files -->
</head>

<body>
    <div id="ebazar-layout" class="theme-blue">

        <!-- navbar   -->
        <?php $this->load->view('admin/includes/navbar')?>
        <!-- navbar  -->


        <!-- main body area -->
        <div class="main px-lg-4 px-md-4">

            <!-- header   -->
            <?php $this->load->view('admin/includes/header')?>
            <!-- header  -->

            <?php 
                 foreach ($result as $row) {  
                    $t_id = $row->c_id;  $status = $row->c_status;           
              } ?>


            <!-- Body: Body -->
            <div class="body d-flex py-3">
                <div class="container-xxl">
                    <div class="row ">
                        <div class="border-0 mb-4 ">
                            <div
                                class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                                <h3 class="fw-bold mb-0">Contact Details</h3>
                                <a href="<?php echo base_url()."contact/contact_details_export/".$t_id;?>"
                                    class="btn btn-primary btn-set-task w-sm-100 " style="margin-left:5px !important"><i
                                        class="icofont-external-link me-2 fs-6"></i>Export</a>
                            </div>
                        </div>
                    </div> <!-- Row end  -->
                    <div class="row g-3">

                        <?php 
                            foreach ($result as $row) {  
                                $t_id = $row->c_id;  $status = $row->c_status;
                        ?>
                        <div class="col-xl-12 col-md-12">
                            <div class="card auth-detailblock">
                                <div class="card-header py-3 d-flex  bg-transparent border-bottom-0">
                                    <h6 class="mb-0 fw-bold ">Personal Details</h6>
                                </div>
                                <div class="card-body col-md-12">
                                    <div class=" col-md-12 row ">
                                        <div class="col-md-6 ">
                                            <i class="icofont-ui-user"></i>
                                            <label class="form-label col-md-3 "> Name :</label>
                                            <span><strong><?php echo $row->c_name; ?></strong></span>
                                        </div>
                                        <div class="col-md-6 ">
                                            <i class="icofont-ui-touch-phone"></i>
                                            <label class="form-label col-md-4 "> Mobile Number :</label>
                                            <span><strong> <?php echo $row->c_mobile; ?></strong></span>
                                        </div>
                                    </div>

                                    <div class=" col-md-12 row ">
                                        <div class="col-md-6 ">
                                            <i class="icofont-email"></i>
                                            <label class="form-label col-md-3 ">Email Id:</label>
                                            <span><strong><?php echo $row->c_email;  ?></strong></span>
                                        </div>
                                        <div class="col-md-6 ">
                                            <i class="icofont-ui-calendar"></i>
                                            <label class="form-label col-md-4 "> Inquiry Date :</label>
                                            <span><strong> <?php  echo date("d-M-Y",strtotime($row->c_date)).' at '.date("h:i: A",strtotime($row->c_time));?></strong></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card auth-detailblock mt-4">
                                <div
                                    class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                    <h6 class="mb-0 fw-bold ">Additional Details</h6>
                                </div>
                                <div class="card-body">
                                    <div class=" col-md-12 row ">
                                        <div class="col-md-6 ">
                                            <i class="icofont-address-book"></i>
                                            <label class="form-label col-md-3 "> Subject :</label>
                                            <span><strong> <?php echo $row->c_subject; ?></strong></span>
                                        </div>
                                        <div class="col-md-6 ">
                                            <i class="icofont-email"></i>
                                            <label class="form-label col-md-4 "> Message :</label>
                                            <span><strong> <?php echo $row->c_message; ?></strong></span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>


        </div>

    </div>

    <!-- Jquery Core Js -->
    <script src="<?php echo base_url()?>assets/bundles/libscripts.bundle.js"></script>

    <!-- Plugin Js -->
    <script src="<?php echo base_url()?>assets/bundles/dataTables.bundle.js"></script>

    <!-- Jquery Page Js -->
    <script src="<?php echo base_url()?>assets/js/template.js"></script>
    <script>
    $('#myDataTable')
        .addClass('nowrap')
        .dataTable({
            responsive: true,
            columnDefs: [{
                targets: [-1, -3],
                className: 'dt-body-right'
            }]
        });
    $('.deleterow').on('click', function() {
        var tablename = $(this).closest('table').DataTable();
        tablename
            .row($(this)
                .parents('tr'))
            .remove()
            .draw();

    });
    </script>
</body>


</html>