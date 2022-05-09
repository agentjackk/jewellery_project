<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();

class Users extends CI_Controller
{
    function __construct()
    {
        
        parent::__construct();
        #Libariry Coll
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('User_model');
        $this->load->model('admin_model');
        
        
        
        
    }
    
    
    
    public function index()
    {
        $session_id = $this->session->userdata('client_login');
        
        $admin_type = $this->session->userdata('admin_type');
        if ($admin_type =='1') {
            if ($session_id == true)
            {
                $data['result']=$this->User_model->get_all_user();
                $this->load->view("admin/user_list", $data);   
                
            } else
            { $data['message'] = 'Your login session has expired';
            $this->load->view('admin/login', $data);}
        } else {
            $this->session->set_flashdata('error', 'Permission Restricted to open Admin data ');
            redirect(base_url(). 'admin/');
        }
        
        
    }
    

    
    public function edit($t_id)
    {
        
        $session_id = $this->session->userdata('client_login');
        if ($session_id == true)
        {
            $admin_type = $this->session->userdata('admin_type');
            if ($admin_type =='1') {
            $data['result'] = $this->User_model->get_user($t_id);
            $this->load->view('admin/user_edit', $data);
            } else {
                $this->session->set_flashdata('error', 'Permission Restricted to open Admin data ');
                redirect(base_url(). 'Admin/');
            }
            
        }else {
            $data['message'] = 'Your login session has expired';
            $this->load->view('admin/login', $data);
        }
    } 
    
    
    public function status($t_id,$status)
    {
        $session_id = $this->session->userdata('client_login');
        if ($session_id == true)
        {
            $result=$this->User_model->get_user($t_id);
           $admin_type="";
            foreach ($result as $row)
            {   $admin_type=$row->admin_type;   }
            if ($admin_type != '1')
            {   $data = array('user_status' => $status );
                $this->User_model->update_data($data,$t_id);
                $this->session->set_flashdata('success','User status changed successfully!');
            }else
            {
                $this->session->set_flashdata('error', 'You can&#39;t change the super admin status');
                
            }
              redirect(base_url(). 'Users/');
            
        }else {
            $data['message'] = 'Your login session has expired';
            $this->load->view('admin/login', $data);
        }
    }
    
    
    public function delete_user($t_id)
    {
        $session_id = $this->session->userdata('client_login');
        if ($session_id == true)
        {
            $result=$this->User_model->get_user($t_id);
            $img_path="";$admin_type="";
            foreach ($result as $row)
            {
                $img_path =$row->profile;
                $admin_type=$row->admin_type;
            }
            if ($admin_type != '0')
            {
                $old_file_path = "assets/uploads/client/".$img_path;
                if (file_exists($old_file_path))
                {
                    unlink($old_file_path);
                }
                
                $this->User_model->delete($t_id);
                $this->session->set_flashdata('success', 'Admin deleted successfully');
            }else {
                $this->session->set_flashdata('error', 'Super Admin can not be delete');
                
            }
            
            
            redirect(base_url().'users');
        }else
        {
            $data['message'] = 'Your login session has expired';
            $this->load->view('admin/login', $data);
        }
    }
    
    
    
    
    public function update_profile()
    {
        $session_id = $this->session->userdata('client_login');
        if ($session_id == true)
        {
            // $this->load->library('encryption');
            $data['result']=$this->User_model->myprofile_Detils();
            $this->load->view("admin/my_profile", $data);   
           
        } else
        { $data['message'] = 'Your login session has expired';
        $this->load->view('admin/login', $data);}
    }
    
    public function update_user_password()
    {
        $session_id = $this->session->userdata('client_login');
        if ($session_id == true)
        {
            function test_input($data)
            {
                $data = trim($data);
                $data = stripslashes($data);
                $data = strip_tags($data);
                $data = htmlspecialchars($data);
                return $data;
            }
         
            $password= test_input($this->input->post('password'));
            $password2 = test_input($this->input->post('password2'));
            $user_id = test_input($this->input->post('user_id'));
            $url = test_input($this->input->post('url'));
            if ($password == $password2)
            {
                   $password =$this->admin_model->encrypt_decrypt('encrypt', $password);
                    $data = array('psw' => $password);
                    $this->User_model->update_data($data,$user_id);
                    $this->session->set_flashdata('success','Password updated successfully!');
                 
            } else {
                $this->session->set_flashdata('error','Password and Confirm password Not Match !');
                
            }
            
            redirect($url);
        }else
        {  $data['message'] = 'Your login session has expired';
        $this->load->view('admin/login', $data);}
        
    }
    
    public function update_password()
    {
        $session_id = $this->session->userdata('client_login');
        if ($session_id == true)
        {
            function test_input($data)
            {
                $data = trim($data);
                $data = stripslashes($data);
                $data = strip_tags($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            $old_password = test_input($this->input->post('old_password'));
            $password= test_input($this->input->post('password'));
            $password2 = test_input($this->input->post('password2'));
            if ($password == $password2)
            {
                $userid= $this->session->userdata('ci_user_id');
               
                $old_password =$this->admin_model->encrypt_decrypt('encrypt', $old_password);
                
                $query6= $this->db->query("SELECT * FROM `admin_login` WHERE psw ='$old_password' AND user_id='$userid'");
                $coutnt =$query6->result();
               $coutnt = count($coutnt);
                 
             if($coutnt==1)
                {
                    
                    $password =$this->admin_model->encrypt_decrypt('encrypt', $password);
               
                   
                    $userid= $this->session->userdata('ci_user_id');
                    $data = array('psw' => $password);
                    $this->User_model->update_data($data,$userid);
                    $this->session->set_flashdata('success','Password updated successfully!');
                  }
                else 
                {
                       $this->session->set_flashdata('error','You Entered Wrong Password');
                    
                  }
                
            } else {
                $this->session->set_flashdata('error','Password and Confirm password Not match !');
              
            }
                 
                 redirect(base_url() . 'admin/profile'); 
        }else
        {  $data['message'] = 'Your login session has expired';
        $this->load->view('admin/login', $data);}
        
    }
    
   
    public function add_user()
    {
        $session_id = $this->session->userdata('client_login');
        if ($session_id == true)
        {
            function test_input($data)
            {
                $data = trim($data);
                $data = stripslashes($data);
                $data = strip_tags($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            $name = test_input($this->input->post('name'));
            $lname = test_input($this->input->post('lname'));
            $email = test_input($this->input->post('email'));
            $mobile = test_input($this->input->post('mobile'));
            $admin_type = test_input($this->input->post('admin_type'));

            if($admin_type == "1"){
                $admin_role_default = "1";	
            }else if($admin_type == "2"){
                $admin_role_default = "2";	
            }else if($admin_type == "3"){
                $admin_role_default = "3";	
            }else if($admin_type == "4"){
                $admin_role_default = "2";	
            }else if($admin_type == "5"){
                $admin_role_default = "3";	
            }
            
            $password = test_input($this->input->post('password'));
            $password =$this->admin_model->encrypt_decrypt('encrypt', $password);
           
            $picture = "";
            if (! empty($_FILES['userImage']['name'])) {
                $config['upload_path'] = 'assets/uploads/client';
                $config['max_size'] = 2100;
                // $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = time() . '-' . $_FILES['userImage']['name'];
                
                // Load upload library and initialize configuration
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                if ($this->upload->do_upload('userImage')) {
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];
                    
                    
                } else {
                    $picture = "";
                    $this->session->set_flashdata('fileerror', 'Plase Must Choose jpg|jpeg|png|gif
                            formate file and size MAX 2 MB !');
                }
            } else {  $picture = ""; }
            
            
            
            $data = array('name' => $name,
                'lname' => $lname,
                'email' => $email,'psw' => $password,
                'mobile'=> $mobile,'profile'=> $picture ,
                'admin_type'=>$admin_type,
                'admin_role_default'=>$admin_role_default,
                'user_status'=> '1'  );
            $this->User_model->insert($data);
            
           $this->session->set_flashdata('success','User Added Successfully!');
            redirect(base_url() . 'admin/add');
            
            
            
        } else
        { $data['message'] = 'Your login session has expired';
        $this->load->view('admin/login', $data);}
        
        
    }
    
    
    
    public function update_admin()
    {
        $session_id = $this->session->userdata('client_login');
        if ($session_id == true)
        {
            function test_input($data)
            {
                $data = trim($data);
                $data = stripslashes($data);
                $data = strip_tags($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            $name = test_input($this->input->post('name'));
            $lname = test_input($this->input->post('lname'));
            $email = test_input($this->input->post('email'));
            $mobile = test_input($this->input->post('mobile'));
            $admin_type = test_input($this->input->post('admin_type'));
            $user_id = test_input($this->input->post('user_id'));
            $url = test_input($this->input->post('url'));
            $old_profile = test_input($this->input->post('old_profile'));

            
            if($admin_type == "1"){
                $admin_role_default = "1";	
            }else if($admin_type == "2"){
                $admin_role_default = "2";	
            }else if($admin_type == "3"){
                $admin_role_default = "3";	
            }else if($admin_type == "4"){
                $admin_role_default = "2";	
            }else if($admin_type == "5"){
                $admin_role_default = "3";	
            }
            
            $picture = "";
            if (! empty($_FILES['userImage']['name'])) {
                $config['upload_path'] = 'assets/uploads/client';
                $config['max_size'] = 2100;
                // $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = time() . '-' . $_FILES['userImage']['name'];
                
                // Load upload library and initialize configuration
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                if ($this->upload->do_upload('userImage')) {
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];
                    
                    $old_file_path = "assets/uploads/client/".$old_profile;
                    if (file_exists($old_file_path))
                    {
                        unlink($old_file_path);
                    }
                } else {
                    $picture = "";
                    $this->session->set_flashdata('fileerror', 'Plase Must Choose jpg|jpeg|png|gif
                            formate file and size MAX 2 MB !');
                }
            } else {  $picture = $old_profile; }
            
            
         
            $data = array('name' => $name,
                'lname' => $lname,
                'email' => $email,
                'mobile'=> $mobile,
                'admin_type'=> $admin_type,
                'admin_role_default'=> $admin_role_default,
                'profile'=> $picture );
            $this->User_model->update_data($data,$user_id);
            
              
            $this->session->set_flashdata('success','Profile Updated Successfully!');
            redirect($url);
            
        } else
        { $data['message'] = 'Your login session has expired';
        $this->load->view('admin/login', $data);}
        
        
    }
    
    
    public function edit_profile()
    {
        $session_id = $this->session->userdata('client_login');
        if ($session_id == true)
        {
            function test_input($data)
            {
                $data = trim($data);
                $data = stripslashes($data);
                $data = strip_tags($data);
                $data = htmlspecialchars($data);
                return $data;
            }
                $name = test_input($this->input->post('name'));
                $lname = test_input($this->input->post('lname'));
                $email = test_input($this->input->post('email'));
                $mobile = test_input($this->input->post('mobile'));
             
                $old_profile = test_input($this->input->post('old_profile'));
                
                $picture = "";
                if (! empty($_FILES['userImage']['name'])) {
                    $config['upload_path'] = 'assets/uploads/client';
                    $config['max_size'] = 2100;
                    // $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['file_name'] = time() . '-' . $_FILES['userImage']['name'];
                    
                    // Load upload library and initialize configuration
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    
                    if ($this->upload->do_upload('userImage')) {
                        $uploadData = $this->upload->data();
                        $picture = $uploadData['file_name'];
                        
                         $old_file_path = "assets/uploads/client/".$old_profile;
                        if (file_exists($old_file_path))
                        {
                            unlink($old_file_path);
                        } 
                    } else {
                        $picture = "";
                        $this->session->set_flashdata('fileerror', 'Plase Must Choose jpg|jpeg|png|gif
                            formate file and size MAX 2 MB !');
                    }
                } else {  $picture = $old_profile; }
                
                
                $userid= $this->session->userdata('ci_user_id');
                $data = array('name' => $name,
                    'lname' => $lname,
                    'email' => $email,
                    'mobile'=> $mobile,'profile'=> $picture );
                  $this->User_model->update_data($data,$userid);
               
               
                  $this->session->set_userdata('ci_name',$name);
                  $this->session->set_userdata('ci_email',$email);
                  $this->session->set_userdata('ci_profile',$picture);
                  
                  
                  $this->session->set_flashdata('success','Profile Update Successfully!');
                redirect(base_url() . 'admin/profile');
                  
        } else
        { $data['message'] = 'Your login session has expired';
        $this->load->view('admin/login', $data);}
        
        
    }
    
    
    

  
    
    public function create()
    {
        $session_id = $this->session->userdata('client_login');
        if ($session_id == true)
        {
            $admin_type = $this->session->userdata('admin_type');
            if ($admin_type =='1') {
              $this->load->view('admin/user_create');
            } else {
                $this->session->set_flashdata('error', 'Permission Restricted to open Admin data');
                redirect(base_url(). 'admin/');
            }
            
            
        } else
        {  $data['message'] = 'Your login session has expired';
        $this->load->view('admin/login', $data); }
    }
    
    
   
    
}
