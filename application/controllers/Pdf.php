<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();

class Pdf extends CI_Controller
{
    function __construct()
    {     
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Contact_model');
    }
    
    
    
    
    

   
    
}
