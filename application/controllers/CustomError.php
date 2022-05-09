<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
class CustomError extends CI_Controller
{
   
    
    public function error_404()
    {
        $this->load->view("admin/error_404");
    }
    


    
    
    
}
 ?>