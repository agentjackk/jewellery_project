<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Contact Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">

    <!-- External CSS libraries -->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url()?>assets/pdf/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet"
        href="<?php echo base_url()?>assets/pdf/fonts/font-awesome/css/font-awesome.min.css">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="<?php echo base_url()?>assets/images/favicon.ico" type="image/x-icon">

    <!-- Google fonts -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900">

    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url()?>assets/pdf/css/style.css">
</head>

<body>

    <!-- Invoice 2 start -->
    <div class="invoice-2 invoice-content">
        <div class="container ">
            <div class="row">
                <div class="col-lg-12">
                    <div class="invoice-inner-2">
                        <div class="invoice-info" id="invoice_wrapper">
                            <div class="invoice-inner">
                                <div class="invoice-top">
                                    <div class="row align-items-center">
                                        <div class="col-sm-6 invoice-name">
                                            <h4 class="inv-header-2">Invoice: #943249</h4>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="title-logo text-end">
                                                <div class="logo">
                                                    <a href="#">
                                                        <img src="<?php echo base_url()?>assets/images/dummy_logo.png"
                                                            alt="logo">
                                                    </a>
                                                </div>
                                                <p>Bandung, West Java, Indonesia<br>Fax 621113</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="order-summary">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4>Contact Details</h4>
                                            <div class="table-responsive">
                                                <table class="table invoice-table">

                                                    <?php 
                                                         foreach ($result as $row) {  
                                                         $t_id = $row->c_id;  $status = $row->c_status;
                                                    ?>

                                                    <tbody>
                                                        <tr>
                                                            <td class="col-md-4" colspan="1">
                                                                <div class="text-center fw-bold">
                                                                    <span>Name</span>

                                                                </div>
                                                            </td>
                                                            <td colspan="3" class="text-center "><?php echo $row->c_name; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="col-md-4" colspan="1">
                                                                <div class="text-center fw-bold">
                                                                    <span>Email</span>

                                                                </div>
                                                            </td>
                                                            <td colspan="3" class="text-center "><?php echo $row->c_mobile; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="col-md-4" colspan="1">
                                                                <div class="text-center fw-bold">
                                                                    <span>Mobile</span>

                                                                </div>
                                                            </td>
                                                            <td colspan="3" class="text-center "><?php echo $row->c_email;  ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="col-md-4" colspan="1">
                                                                <div class="text-center fw-bold">
                                                                    <span>Inquiry Date</span>

                                                                </div>
                                                            </td>
                                                            <td colspan="3" class="text-center "><?php  echo date("d-M-Y",strtotime($row->c_date)).' at '.date("h:i: A",strtotime($row->c_time));?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="col-md-4" colspan="1">
                                                                <div class="text-center fw-bold">
                                                                    <span>Subject</span>

                                                                </div>
                                                            </td>
                                                            <td colspan="3" class="text-center "> <?php echo $row->c_subject; ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="col-md-4" colspan="1">
                                                                <div class="text-center fw-bold">
                                                                    <span>Message</span>

                                                                </div>
                                                            </td>
                                                            <td colspan="3" class="text-center "> <?php echo $row->c_message; ?></td>
                                                        </tr>

                                                    </tbody>

                                                    <?php } ?>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="invoice-center invisible" style="height:200px">

                                </div>


                            </div>
                        </div>
                        <div class="invoice-btn-section clearfix d-print-none">
                            <a href="javascript:window.print()" class="btn btn-lg btn-print">
                                <i class="fa fa-print"></i> Print Details
                            </a>
                            <a id="invoice_download_btn" class="btn btn-lg btn-download">
                                <i class="fa fa-download"></i> Download as PDF
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Invoice 2 end -->

    <script src="<?php echo base_url()?>assets/pdf/js/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/pdf/js/jspdf.min.js"></script>
    <script src="<?php echo base_url()?>assets/pdf/js/html2canvas.js"></script>
    <script>
    $(function() {
        'use strict';
        $(document).on('click', '#invoice_download_btn', function() {
            var contentWidth = $("#invoice_wrapper").width();
            var contentHeight = $("#invoice_wrapper").height();
            var topLeftMargin = 20;
            var pdfWidth = contentWidth + (topLeftMargin * 2);
            var pdfHeight = (pdfWidth * 1.5) + (topLeftMargin * 2);
            var canvasImageWidth = contentWidth;
            var canvasImageHeight = contentHeight;
            var totalPDFPages = Math.ceil(contentHeight / pdfHeight) - 1;

            html2canvas($("#invoice_wrapper")[0], {
                allowTaint: true
            }).then(function(canvas) {
                canvas.getContext('2d');
                var imgData = canvas.toDataURL("image/jpeg", 1.0);
                var pdf = new jsPDF('p', 'pt', [pdfWidth, pdfHeight]);
                pdf.addImage(imgData, 'JPG', topLeftMargin, topLeftMargin, canvasImageWidth,
                    canvasImageHeight);
                for (var i = 1; i <= totalPDFPages; i++) {
                    pdf.addPage(pdfWidth, pdfHeight);
                    pdf.addImage(imgData, 'JPG', topLeftMargin, -(pdfHeight * i) + (
                        topLeftMargin * 4), canvasImageWidth, canvasImageHeight);
                }
                pdf.save("sample-invoice.pdf");
            });
        });
    })
    </script>

</body>

</html>