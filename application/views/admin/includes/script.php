 <!-- Jquery Core Js -->
 <script src="<?php echo base_url()?>assets/bundles/libscripts.bundle.js"></script>
 <!-- toaster Js -->
 <script src="<?php echo base_url()?>assets/bundles/toaster.js"></script>

 <!-- Plugin Js -->
 <script src="<?php echo base_url()?>assets/bundles/apexcharts.bundle.js"></script>
 <script src="<?php echo base_url()?>assets/bundles/dataTables.bundle.js"></script>


 <!-- Jquery Page Js -->
 <script src="<?php echo base_url()?>assets/js/template.js"></script>
 <script src="<?php echo base_url()?>assets/js/page/index.js"></script>
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1Jr7axGGkwvHRnNfoOzoVRFV3yOPHJEU&amp;callback=myMap">
 </script>

 <!-- sweetalert -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.3.10/sweetalert2.all.min.js"
     integrity="sha512-IG3jJs+NhoPszr+n3I3AHLii1LFFGEVZoorGJFkrd+flS4dgdAVL0AAGiPHlXB0ZD5mgPmcpVKm4KBybCeXLLA=="
     crossorigin="anonymous" referrerpolicy="no-referrer"></script>


 <script>
     

toastr.options = {
    timeOut: 6000,
    // progressBar: true,
    showMethod: "slideDown",
    hideMethod: "slideUp",
    showDuration: 200,
    hideDuration: 200
};

<?php

$msg= $this->session->flashdata('success');
if ( $msg != "" )
{ 
echo "toastr.success('$msg')";
} 
$msg2= $this->session->flashdata('error');
if ( $msg2 != "" )
{
    echo "toastr.error('$msg2')";
}


if(isset($_SESSION['success'])){
    unset($_SESSION['success']);
}
if(isset($_SESSION['error'])){
    unset($_SESSION['error']);
}

?>

    // Example starter JavaScript for disabling form submissions if there are invalid fields

    'use strict'

// Fetch all the forms we want to apply custom Bootstrap validation styles to
var forms = document.querySelectorAll('.needs-validation')

// Loop over them and prevent submission
Array.prototype.slice.call(forms)
    .forEach(function(form) {
        form.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }

            form.classList.add('was-validated')
        }, false)
    })
 </script>