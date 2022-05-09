<!doctype html>
<html class="no-js" lang="en" dir="ltr">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Contact Inquiry List </title>
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
                                <h3 class="fw-bold mb-0">Blog List</h3>

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
                                                <th> #SR </th>
                                                <th> #id </th>
                                                <th> Heading </th>
                                                <th>Comments</th>
                                                <th>Action</th>
                                                <th>Status</th>
                                                <th>Comments</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php  $i=0;
                                    	           foreach ($result as $row) {  
                                    	           $t_id = $row->blog_id;  $status = $row->blog_status;  $i++;
                                            ?>
                                            <tr>
                                                <td><strong><?php echo  $i; ?></strong></td>
                                                <td><strong>#BG-<?php echo  $t_id; ?></strong></td>
                                                <td> <?php echo substr($row->blog_name,0,30); ?></td>
                                                <td> <a href="<?php echo base_url()."admin/blog/blog_comments/".$t_id;?>"
                                                        type="button" class="btn btn-primary btn-sm  position-relative">
                                                        CMNT (<?php    $query = $this->db->query("SELECT * FROM blog_camment where blog_id='$t_id'" );
												   echo $query->num_rows(); ?>)
                                                        <span class="badge bg-danger ms-2">
                                                            NEW <?php  	$query = $this->db->query("SELECT * FROM blog_camment where blog_id='$t_id' AND  entry='1'" );
												  echo $query->num_rows();?>
                                                        </span> </a>

                                                <td>
                                                    <div class="btn-group" role="group"
                                                        aria-label="Basic outlined example">
                                                        <a title="Edit Details"
                                                            href="<?php echo base_url()."admin/blog/edit_blog/".$t_id;?>"
                                                            class="btn btn-outline-secondary"><i
                                                                class="icofont-edit text-success"></i>
                                                        </a>
                                                        <a title="Delete Details"
                                                            data="<?php echo base_url()."blogs/delete/".$t_id;?>"
                                                            class=" btn btn-outline-secondary delete_blog">
                                                            <i class="icofont-ui-delete text-danger"></i>
                                                        </a>

                                                    </div>
                                                </td>
                                                </td>
                                                <td class="text-center">
                                                    <?php if ($status == 1){ ?>
                                                    <a href="<?php echo base_url()."blogs/status/".$t_id."/0"?>">
                                                        <span
                                                            class="btn btn-primary btn-sm btn-set-task">Published</span></a>
                                                    <?php } else {?>
                                                    <a href="<?php echo base_url()."blogs/status/".$t_id."/1";?>">
                                                        <span class="btn btn-secondary btn-sm btn-set-task">Pedning
                                                        </span></a>
                                                    <?php }?>
                                                </td>
                                                <td class="text-center">
                                                    <?php if ($row->blog_comment == 1){ ?>
                                                    <a href="<?php echo base_url()."blogs/cmt_statusss/".$t_id."/0"?>">
                                                        <span class="btn btn-primary btn-sm btn-set-task">ON</span></a>
                                                    <?php } else {?>
                                                    <a href="<?php echo base_url()."blogs/cmt_statusss/".$t_id."/1";?>">
                                                        <span
                                                            class="btn btn-secondary btn-sm btn-set-task">OFF</span></a>
                                                    <?php }?>
                                                </td>


                                            </tr>
                                            <?php } ?>
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

    $(".delete_blog").click(function() {
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