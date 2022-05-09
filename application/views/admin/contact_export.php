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

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" />
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
                                <h3 class="fw-bold mb-0">Contact Export  </h3>

                                <?php 

                                $date1 = $mydate[0];
                                $date2 = $mydate[1];
                               
                                ?>
                                <a href="<?php echo base_url()."contact/contact_details_export/".$date1.'/'.$date2;?>"  class="btn btn-primary btn-set-task w-sm-100 "
                                    style="margin-left:5px !important"><i
                                        class="icofont-external-link me-2 fs-6"></i>Export</a>

                            </div>
                        </div>
                    </div> <!-- Row end  -->
                    <div class="card mb-2">
                        <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                            <h6 class="mb-0 fw-bold ">Select Date</h6>
                        </div>
                        <div class="card-body  ">
                            <?php  echo form_open_multipart('admin/contact/export_inquiry'); ?>
                            <div class="row g-3 " style="margin-top:-50px">
                                <div class="col-sm-4">
                                    <input type="hidden" name="url"
                                        value="<?php echo base_url().$this->uri->uri_string();?>">
                                    <input type="hidden" id="daterangepicker" name="daterangepicker">
                                    <input type="hidden" name="daterangepicker2" id="daterangepicker2">
                                    <div id="reportrange" class="m-2"
                                        style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%; border-radius:5px">
                                        <i class="icofont-calendar"></i>&nbsp;
                                        <span></span> <i class="icofont-arrow-down"></i>
                                    </div>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-primary " style="margin-left:10px">Show data</button>
                            <?php  echo form_close();?>
                        </div>
                        <h6 class="mb-3 fw-bold " style="margin-left:25px"><span
                                class="text-primary"><?php $msgg= $this->session->flashdata('export_msg');if ( $msgg != "" ) {   echo $msgg;   } ?></span>

                        </h6>

                    </div>
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
                                                <th>Mobile</th>
                                                <th>Date & time </th>
                                                <th>Subject</th>
                                                <th>Message</th>

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
                                                <td><?php echo $row->c_mobile; ?>
                                                </td>
                                                <td><?php  echo date("d-M-Y",strtotime($row->c_date)).' at '.date("h:i: A",strtotime($row->c_time));?>
                                                </td>
                                                <td><?php echo $row->c_subject; ?>
                                                </td>
                                                <td><?php echo $row->c_message; ?>
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

    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

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




    $('input[name="daterangepicker"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    });
    $('input[name="daterangepicker2"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    });

    $(function() {

        var start = moment().subtract(29, 'days');
        var end = moment();

        function cb(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            console.log("A new date selection was made: " + start.format('DD-MM-YYYY') + ' to ' + end.format(
                'DD-MM-YYYY'));
            var a = start.format('DD-MM-YYYY');
            var b = end.format('DD-MM-YYYY');
            $('input[name="daterangepicker"]').val(a);
            $('input[name="daterangepicker2"]').val(b);
        }

        $('#reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                    'month').endOf('month')]
            }
        }, cb);

        cb(start, end);


    });



    function myExport() {
           var date1 = $('input[name="daterangepicker"]').val();
           var date2 =  $('input[name="daterangepicker2"]').val();
       
    }
    </script>
</body>


</html>