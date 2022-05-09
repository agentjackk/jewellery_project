<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<!-- Mirrored from www.pixelwibes.com/template/ebazar/html/dist/customers.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Apr 2022 09:34:41 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>User List</title>
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

            <!-- Body: Body -->
            <div class="body d-flex py-lg-3 py-md-2">
                <div class="container-xxl">
                    <div class="row align-items-center">
                        <div class="border-0 mb-4">
                            <div
                                class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                                <h3 class="fw-bold mb-0">Users Information</h3>
                                <div class="col-auto d-flex w-sm-100">
                                    <a href="<?php echo base_url();?>admin/add"
                                        class="btn btn-primary btn-set-task w-sm-100"><i
                                            class="icofont-plus-circle me-2 fs-6"></i>Add New User</a>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Row end  -->
                    <div class="row clearfix g-3">
                        <div class="col-sm-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <table id="myProjectTable" class="table table-hover align-middle mb-0"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>User Name</th>
                                                <th>Mail</th>
                                                <th>Phone</th>
                                                <th>Roll</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                    	    foreach ($result as $row) {  
                                    	    $t_id = $row->user_id;  
                                    	    $status = $row->user_status; $extra=$row->extra; 
                                    	    $admin_type  =$row->admin_type;
                                            ?>
                                            <tr>
                                                <td><strong>#AD-<?php echo $t_id ?></strong></td>
                                                <td>
                                                    <a href="customer-detail.html">
                                                        <img class="avatar rounded"
                                                            src="<?php echo  base_url()."assets/uploads/client/".$row->profile;?>"
                                                            alt="Admin Image">
                                                        <span class="fw-bold ms-1">
                                                            <?php echo $row->name." ".$row->lname; ?></span>
                                                    </a>
                                                </td>

                                                <td><?php echo $row->email; ?></td>
                                                <td><?php echo $row->mobile; ?></td>
                                                <td><?php if( $admin_type == '1'){
                                                          echo '<span class="badge bg-danger">Superadmin</span></td>';

                                                      }else {
                                                          echo '<span class="badge bg-info">Admin</span></td>';

                                                      } ?>
                                                <td>
                                                    <?php 
                                             
                                                   if ($extra !='1') {

                                                      $id = $this->session->userdata('ci_user_id');
                                                      if($id!=$t_id)
                                                
                                                        if ($status == 1){ ?>
                                                    <a href="<?php echo base_url()."users/status/".$t_id."/0"?>">
                                                        <span class="btn btn-primary btn-sm btn-set-task "
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="Click to Change">&emsp;Active&emsp;</span></a>
                                                    <?php } else {?>
                                                    <a href="<?php echo base_url()."users/status/".$t_id."/1";?>">
                                                        <span class="btn btn-secondary btn-sm btn-set-task "
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="Click to Change">Deactivate </span></a>
                                                    <?php } }   ?>
                                                </td>
                                                <td>

                                                    <?php 
                                             
                                                   if ($extra !='1') {

                                                    $id = $this->session->userdata('ci_user_id');
                                                      if($id!=$t_id){ ?>

                                                    <div class="btn-group" role="group"
                                                        aria-label="Basic outlined example">
                                                        <a href="<?php echo base_url()."admin/user_edit/".$t_id;?>"
                                                            class="btn btn-outline-secondary"><i
                                                                class="icofont-edit text-success"></i></a>
                                                        <a data="<?php echo base_url()."users/delete_user/".$t_id;?>"
                                                            class="btn btn-outline-secondary delete_user" ><i
                                                                class="icofont-ui-delete text-danger"></i></a>

                                                    </div>

                                                    <?php } } ?>



                                                </td>
                                            </tr>

                                            <?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row End -->
                </div>
            </div>




        </div>

    </div>

    <!-- Script -->
    <?php $this->load->view('admin/includes/script')?>
    <!-- Script -->

    <script>
    // project data table
    $(document).ready(function() {
        $('#myProjectTable')
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


        $(".delete_user").click(function() {
            $url = $(this).attr("data");
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {


                    $.ajax({
                        url: $url,
                        type: 'POST',
                        dataType: 'json',
                        success: function(responce) {
                            // location.reload()
                        }
                        
                    });
                    location.reload()

                }
            })



        })
    });
    </script>
</body>

</html>