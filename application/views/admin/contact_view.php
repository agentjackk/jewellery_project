<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Contact Us Inquiry </title>
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
            <div class="body d-flex py-3">
                <div class="container-xxl">
                    <div class="row align-items-center">
                        <div class="border-0 mb-4">
                            <div
                                class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                                <h3 class="fw-bold mb-0">Contact Inquiry List</h3>

                            </div>
                        </div>
                    </div> <!-- Row end  -->
                    <div class="row g-3 mb-3">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <table id="myDataTable" class="table table-hover align-middle mb-0"
                                        style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th> #sr </th>
                                                <th> #id </th>
                                                <th> Name </th>
                                                <th> Email</th>
                                                <th>Date & time </th>
                                                <th>Action</th>
                                                <th>Entery Type </th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php $sr=0;
                                    	    foreach ($result as $row) {  $sr= $sr+1;
                                    	    $t_id = $row->c_id;  $status = $row->c_status;
                                    	    ?>

                                            <tr>
                                                <td> <strong><?php echo $sr; ?></strong></td>
                                                <td> <strong>#CT-<?php echo $t_id ?></strong></td>
                                                <td>
                                                    <?php echo substr($row->c_name,0,30); ?>
                                                </td>
                                                <td><?php echo substr($row->c_email,0,30); ?>
                                                </td>
                                                <td><?php  echo date("d-M-Y",strtotime($row->c_date)).' at '.date("h:i: A",strtotime($row->c_time));?>
                                                </td>

                                                <td>
                                                    <div class="btn-group" role="group"
                                                        aria-label="Basic outlined example">
                                                        <a title="View Details"
                                                            href="<?php echo base_url()."admin/contact/inquiry_details/".$t_id;?>"
                                                            class="btn btn-outline-secondary"><i
                                                                class="icofont-eye text-success"></i>
                                                        </a>
                                                        <a title="Delete Details"
                                                            data="<?php echo base_url()."contact/delete_contact/".$t_id;?>"
                                                            class=" btn btn-outline-secondary  delete_contact">
                                                            <i class="icofont-ui-delete text-danger"></i>
                                                            <!-- deleterow | class to delete row in Frontend end -->
                                                        </a>

                                                    </div>
                                                </td>



                                                <td>

                                                    <?php if ($status == 1){ ?>
                                                    <span class="badge bg-success">New </span>
                                                    <?php } else {?>
                                                    <span class="badge bg-danger">Old </span>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <?php  } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>

    <!-- Script -->
    <?php $this->load->view('admin/includes/script')?>
    <!-- Script -->
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


    $(".delete_contact").click(function() {
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
                            location.reload()
                        }
                        
                    });
                    

                }
            })



        })

    </script>
</body>


</html>