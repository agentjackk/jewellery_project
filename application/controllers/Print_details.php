<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
require FCPATH.'vendor/autoload.php';
class Print_details extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Contact_model');
   
    }








 
    function contact_us($t_id){


        $session_id = $this->session->userdata('client_login');
        if ($session_id == true)
        {
            

            $result= $this->Contact_model->get_single_data($t_id);
            foreach ($result as $row) {  
            $c_name = $row->c_name;
            $c_mobile = $row->c_mobile;
            $c_email = $row->c_email;
            $c_date = $row->c_date;
            $c_subject = $row->c_subject;
            $c_message = $row->c_message;

            $c_bstatus_s = $row->c_bstatus;
            if($c_bstatus_s == "0"){
                $c_bstatus = "Aurangabad";
            } else if($c_bstatus_s == "1") {
                $c_bstatus = "Beed";
            }
          
            
          }
        $html = '<!DOCTYPE html>
        <html>
        
        <head>
            <title>PDF</title>
            <style>
            @import url("https://fonts.googleapis.com/css2?family=Roboto:wght@100&family=Ubuntu&display=swap");
            </style>
        
            <style>
            h1 {
                text-align: center;
                color: #8A0829;
            }
        
            h2 {
                margin-bottom: 3px;
                margin-left: 2.5px;
                font-family: "Roboto", sans-serif;
                border-bottom: 1px solid black;
            }
        
            td {
                height: 30px;
                font-family: "Roboto", sans-serif;
            }
        
            section {
                padding: 5%;
            }
        
            .p-details {
                padding: 2%;
                padding-top: 0%;
                margin-bottom: 2%;
                background-color: #f7f7f8;
                border-radius: 10px;
                font-family: Geneva, Verdana, sans-serif;

            }
        
            .remark-table {
                margin-top: 5px;
                background-color: #f7f7f8;
                color: black;
                padding: 2%;
                border-radius: 10px;
            }
        
            .tagging{
                margin-top: 5px;
                background-color: #f7f7f8;
                color: black;
                padding: 2%;
                border-radius: 10px;
            }
            </style>
        </head>
        
        <body>
            <section>
                <div style="border-bottom: 1px solid #2A0A0A; height:90%;">
                    <h1 style=" text-align: center; color: #2A0A0A; font-family: "Roboto", sans-serif; border-bottom: 1px solid #2A0A0A; width: 50%;">Contact Enquiry Details</h1>
                    <div>
                        <div class="p-details">
                            <h2>Personal Details</h2>
                            <table width="100%" style="font-size: 15px;">
                                <tr class="tr">
                                    <td><span><strong>Name: </strong>'.$c_name.'</span></td>
                                </tr>
                                <tr>
                                    <td><span><strong>Email: </strong>'.$c_email.'</span></td>
                                </tr>
                                <tr>
                                    <td><span><strong>Mobile: </strong>'.$c_mobile.'</span></td>
                                </tr>
                                <tr>
                                    <td><span><strong>Date: </strong>'.$c_date.'</span></td>
                                </tr>
                            
                            </table>
                        </div>
                        <div class="remark-table">
                            <table width="100%" style="color:black;">
                                <tr>
                                    <td style="font-size: 16px;"><span><strong style="font-size: 16px;">Subject :
                                        </strong>'.$c_subject.'</span></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="tagging">
                            <table width="100%">
                                <tr>
                                  
                                    <td style="font-size: 16px;"><span><strong style="font-size: 16px;">Message :
                                        </strong>'.$c_message.'</span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        
        </body>
        
        </html>
        
        ';
        $mpdf = new \Mpdf\Mpdf([
            'format'=>'A4',
            'margin_top'=>0,
            'margin_left'=>0,
            'margin_right'=>0,
            'margin_bottom'=>0
        ]);
      
  
        $mpdf->WriteHTML($html);
        $mpdf->Output(''.$c_name.'.pdf', 'I');

            
        }else {
            $data['message'] = 'Your login session has expired';
            $this->load->view('admin/login', $data);
        }



    }

    

    
   
    
}
?>