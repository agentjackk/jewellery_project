<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
class Blogs extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('form_validation');
 
        $this->load->model('Blog_model');

        
    }
   
    public function status($t_id,$status)
    {
        $session_id = $this->session->userdata('client_login');
        if ($session_id == true)
        {
            $data = array('blog_status' => $status );
            $this->Blog_model->update_data($data,$t_id);
            $this->session->set_flashdata('success','Services Status change  Successfully!');
            redirect(base_url().'admin/blog/view_blog');
            
        }else {
            $data['message'] = 'Your login session has expired';
            $this->load->view('admin/login', $data);
        }
    }
    public function cmt_statusss($t_id,$status)
    {
        $session_id = $this->session->userdata('client_login');
        if ($session_id == true)
        {
            $data = array('blog_comment' => $status );
            $this->Blog_model->update_data($data,$t_id);
            $this->session->set_flashdata('success','Comment Status change  Successfully!');
            redirect(base_url().'admin/blog/view_blog');
            
        }else {
            $data['message'] = 'Your login session has expired';
            $this->load->view('admin/login', $data);
        }
    }

    
    public function delete($t_id)
    {
        $session_id = $this->session->userdata('client_login');
        if ($session_id == true)
        {
            $result=$this->Blog_model->get_single_data($t_id);
            $small_img=$long_img="";
            foreach ($result as $row)
            {
                $small_img =$row->small_img;  $long_img =$row->long_img;
            }
            $old_file_path = "assets/uploads/blogs/".$small_img;
            $old_file_path2 = "assets/uploads/blogs/".$long_img;
            if (file_exists($old_file_path))
            {
                unlink($old_file_path);
            }
            
            if (file_exists($old_file_path2))
            {
                unlink($old_file_path2);
            }
            
            $this->Blog_model->delete_id($t_id);
            $this->session->set_flashdata('success','Blog deleted successfully !');
            // redirect(base_url().'admin/blog/view_blog');
            $responce['html'] =' Blog Deleted successfully';
            echo json_encode( $responce);
        }else
        {
            $data['message'] = 'Your login session has expired';
            $this->load->view('admin/login', $data);
        }
    }
      
 


    public function create_blog()
    {   

        $admin_role = $this->session->userdata('admin_role');
        if ($admin_role !='3') {
                      
        
        $session_id = $this->session->userdata('client_login');
        if($session_id==true)
        {
             
            $admin_type = $this->session->userdata('admin_type');
            if ($admin_type =='1') {
                $data['cat_result'] = $this->Blog_model->get_blogcatedata();
			    $data['tag_result'] = $this->Blog_model->get_blogtagdata();
                $this->load->view('admin/blog_add', $data);
            } else {
                $this->session->set_flashdata('error', 'Permission Restricted to open Admin data ');
                redirect(base_url(). 'admin/');
            }
			    
        } else {
            $data['message'] = 'Your login session has expired';
            $this->load->view('admin/login', $data);
               }
            }else{
                redirect(base_url().'admin'); 
    
            }
    }
    
	public function external_img()
	{
		if(isset($_FILES['upload']['name']))
		{
		$file = $_FILES['upload']['tmp_name'];
		$file_name = $_FILES['upload']['name'];
		$file_name_array = explode(".", $file_name);
		$extension = end($file_name_array);
		$new_image_name = rand() . '.' . $extension;
		chmod('uploads', 0777);
		$allowed_extension = array("jpg", "gif", "png");
		if(in_array($extension, $allowed_extension))
		{
			move_uploaded_file($file, 'uploads/' . $new_image_name);
			$function_number = $_GET['CKEditorFuncNum'];
			$url = base_url().'uploads/' . $new_image_name;
			$message = '';
			echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '$url', '$message');</script>";
		} else{
			echo '<script>alert("Unable to upload the file")</script>'; 
		
		}
		}
		
	}


 
    public function update_Blog()
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
            $url = test_input($this->input->post('url'));
            $picture = "";
            $picture2 = "";
            
             $blog_id = test_input($this->input->post('blog_id'));
			 
           
             $picture2;
             $s_name = test_input($this->input->post('b_name'));
             $blog_url = test_input($this->input->post('blog_url'));
             $short_desc = test_input($this->input->post('short_desc'));
             
           /*   $long_desc1 =  $this->input->post('long_desc1');
             $long_desc2 = $this->input->post('long_desc2'); */
            
			$long_desc1 = htmlspecialchars($_POST['long_desc1']);
			$long_desc2 =  htmlspecialchars($_POST['long_desc2']);



             $old_profile =  test_input($this->input->post('old_profile'));
             $old_profile2 =  test_input($this->input->post('old_profile2'));
             
			 $category_id =  test_input($this->input->post('category_id'));
			 $tags_id = $this->input->post('tags_id');
			 $tags_id= implode(", ",$tags_id);
		   	$featured = $this->input->post('featured');
 			 $blog_status = test_input($this->input->post('blog_status'));
 			 $blog_comment = test_input($this->input->post('blog_comment'));
	 
 
             
             $picture = "";
             if (! empty($_FILES['smallImage']['name'])) {
                 $config['upload_path'] = 'assets/uploads/blogs';
                 $config['max_size'] = 2100;
                 // $config['allowed_types'] = 'jpg|jpeg|png|gif';
                 $config['allowed_types'] = 'jpg|jpeg|png|gif';
                 $config['file_name'] = time() . '-' . $_FILES['smallImage']['name'];
                 
                 // Load upload library and initialize configuration
                 $this->load->library('upload', $config);
                 $this->upload->initialize($config);
                 
                 if ($this->upload->do_upload('smallImage')) {
                     $uploadData = $this->upload->data();
                     $picture = $uploadData['file_name'];
                     
                     $old_file_path = "assets/uploads/blogs".$old_profile;
                     if (file_exists($old_file_path))
                     {
                         unlink($old_file_path);
                     }
                 } else {
                     $picture = $old_profile;
                     $this->session->set_flashdata('fileerror', 'Plase Must Choose jpg|jpeg|png|gif
                            formate file and size MAX 2 MB !');
                 }
             } else {     $picture = $old_profile; }
             
             $picture2 = "";
             if (! empty($_FILES['largeImage']['name'])) {
                 $config['upload_path'] = 'assets/uploads/blogs';
                 $config['max_size'] = 2100;
                 // $config['allowed_types'] = 'jpg|jpeg|png|gif';
                 $config['allowed_types'] = 'jpg|jpeg|png|gif';
                 $config['file_name'] = time() . '-' . $_FILES['largeImage']['name'];
                 
                 // Load upload library and initialize configuration
                 $this->load->library('upload', $config);
                 $this->upload->initialize($config);
                 
                 if ($this->upload->do_upload('largeImage')) {
                     $uploadData = $this->upload->data();
                     $picture2 = $uploadData['file_name'];
                     
                     $old_file_path2 = "assets/uploads/blogs/".$old_profile2;
                     if (file_exists($old_file_path2))
                     {
                         unlink($old_file_path2);
                     }
                 } else {
                     $picture2 = $old_profile2;
                     $this->session->set_flashdata('fileerror', 'Plase Must Choose jpg|jpeg|png|gif
                            formate file and size MAX 2 MB !');
                 }
             } else {     $picture2 = $old_profile2; }
             
             $data = array('blog_name' => $s_name,
                 'short_desc' => $short_desc,
                 'long_desc1' => $long_desc1,
                 'log_desc2'=> $long_desc2 ,
                 'blog_url'=> $blog_url ,
                 'small_img' => $picture,
                 'long_img' => $picture2,
			 	 'category_id'=>$category_id,'tags_id'=>$tags_id,'featured'=>$featured,
                  'blog_status'=>$blog_status,
                  'blog_comment'=>$blog_comment,
                );
           
             $this->Blog_model->update_data($data,$blog_id);
            
            $this->session->set_flashdata('success','Blog Updated Successfully!');
            redirect($url);            
            
        }else {
            $data['message'] = 'Your login session has expired';
            $this->load->view('admin/login', $data);
        }
        redirect(base_url() . 'admin/blog/view_blog');
    }
    
    public function creating_blog()
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
            
            $picture1="";
            $picture2="";
            $s_name = test_input($this->input->post('b_name'));
            $service_url = test_input($this->input->post('blog_url'));
            $short_desc = test_input($this->input->post('short_desc'));
        
			$long_desc1 = $_POST['long_desc1'];
			$long_desc2 = $_POST['long_desc2'];
			$category_id =  test_input($this->input->post('category_id'));
			$tags_id = $this->input->post('tags_id');
			$tags_id= implode(", ",$tags_id);
		   	$featured = $this->input->post('featured');
 			$blog_status = test_input($this->input->post('blog_status'));
 			$blog_comment = test_input($this->input->post('blog_comment'));
			 

            $date = date("Y-m-d");
            if(!empty($_FILES['smallImage']['name']))
            {
                $config['upload_path'] = 'assets/uploads/blogs';
                $config['max_size']  = 2100;
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                /*    $config['allowed_types'] = 'doc|pdf'; */
                $config['file_name'] = time().'-'.$_FILES['smallImage']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('smallImage'))
                {
                    $uploadData = $this->upload->data();
                    $picture1 = $uploadData['file_name'];
                    //   redirect($url);
                }else
                {
                    $this->session->set_flashdata('error','Please Choose Image JPG OR PNG format and file size must be MAX 2 MB!');
                    redirect(base_url() . 'admin/blog/add_blog');
                    exit();
                }
            } else
            {
                $this->session->set_flashdata('error','Please Choose Image!');
                redirect(base_url() . 'admin/blog/add_blog');
                exit();
            }
            
            if(!empty($_FILES['largeImage']['name']))
            {
                $config['upload_path'] = 'assets/uploads/blogs';
                $config['max_size']  = 2100;
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                /*    $config['allowed_types'] = 'doc|pdf'; */
                $config['file_name'] = time().'-'.$_FILES['largeImage']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('largeImage'))
                {
                    $uploadData = $this->upload->data();
                    $picture2 = $uploadData['file_name'];
                    //   redirect($url);
                }else
                {
                    $this->session->set_flashdata('error','Please Choose Image JPG OR PNG format and file size must be MAX 2 MB!');
                    redirect(base_url() . 'admin/blog/add_blog');
                    exit();
                }
            } else
            {
                $this->session->set_flashdata('error','Please Choose Image!');
                redirect(base_url() . 'admin/blog/add_blog');
                exit();
            }
            
			$user_id = $this->session->userdata('ci_user_id');
			
            $data = array('blog_name' => $s_name, 
                'short_desc' => $short_desc,
                'long_desc1' => $long_desc1,
                'log_desc2'=> $long_desc2 ,
                'blog_url'=> $service_url ,
                'small_img' => $picture1,
                'long_img' => $picture2,
                'blog_date' => $date,
				'category_id'=>$category_id,'tags_id'=>$tags_id, 
				'featured'=>$featured,'blog_status'=>$blog_status,    
				 'author_id'=>$user_id,      
				 'blog_comment'=>$blog_comment,      
            );
            
            $this->Blog_model->insert_data($data);
            $this->session->set_flashdata('success','Blog Added Successfully!');
            //   redirect($url);
            
                
             redirect(base_url() . 'admin/blog/add_blog');
       } else
        {	$data['message'] = 'Your login session has expired';
            $this->load->view('admin/login', $data);        
        }
    }
    public function view()
    {
       
        $session_id = $this->session->userdata('client_login');
        if($session_id==true)
        {   
            $admin_type = $this->session->userdata('admin_type');
            if ($admin_type =='1') {
                $data['result']=$this->Blog_model->get_blogdata();
           
                $this->load->view('admin/blog_view', $data);
            } else {
                $this->session->set_flashdata('error', 'Permission Restricted to open Admin data ');
                redirect(base_url(). 'admin/');
            }
            
        } else {
            $data['message'] = 'Your login session has expired';
            $this->load->view('admin/login', $data);
            
        }

    }
    



    public function edit($t_id)
    {
        $session_id = $this->session->userdata('client_login');
        if ($session_id == true)
        {
             
            
        	 $data['result'] = $this->Blog_model->get_single_data($t_id);
		 	 $data['cat_result'] = $this->Blog_model->get_blogcatedata();
			 $data['tag_result'] = $this->Blog_model->get_blogtagdata();
			//print_r( $data['cat_result']);
 		 $this->load->view('admin/blog_edit', $data);
        }else {
            $data['message'] = 'Your login session has expired';
            $this->load->view('admin/login', $data);
        }
    }
      
    public function creating_blog_cate()
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
            $bcat_name = test_input($this->input->post('catname'));            
            $bcat_url =test_input($this->input->post('caturl'));    
			$cat_desc =test_input($this->input->post('cat_desc'));

            $picture2="";

            if(!empty($_FILES['largeImage']['name']))
            {
                $config['upload_path'] = 'assets/img/category';
                $config['max_size']  = 2100;
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                /*    $config['allowed_types'] = 'doc|pdf'; */
                $config['file_name'] = time().'-'.$_FILES['largeImage']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('largeImage'))
                {
                    $uploadData = $this->upload->data();
                    $picture2 = $uploadData['file_name'];
                    //   redirect($url);
                }else
                {
                    $this->session->set_flashdata('error','Please Choose Image JPG OR PNG format and file size must be MAX 2 MB!');
                }
            } else
            {
                $this->session->set_flashdata('error','Please Choose Image!');
            }
              
            $data = array('b_cat_name' => $bcat_name,
                'b_cat_url' => $bcat_url,
                 'cat_desc' => $cat_desc,
                 'cat_img' => $picture2,
                 'special_status' => "0",
            );
            
            $this->Blog_model->insert_catedata($data);
            $this->session->set_flashdata('success','Blog Category Added Successfully!');
            //   redirect($url);
            redirect(base_url() . 'admin/blog/view_category');
        } else
        {$data['message'] = 'Your login session has expired';
        $this->load->view('admin/login', $data);
        }
        
    }
    
    public function view_blog_categories()
    {
        $session_id = $this->session->userdata('client_login');
        if($session_id==true)
        {

            $admin_type = $this->session->userdata('admin_type');
            if ($admin_type =='1') {
                $data['result']=$this->Blog_model->get_blogcatedata();
                $this->load->view('admin/blog_categoty_view', $data);
            } else {
                $this->session->set_flashdata('error', 'Permission Restricted to open Admin data ');
                redirect(base_url(). 'admin/');
            }
           
        } else {
            $data['message'] = 'Your login session has expired';
            $this->load->view('admin/login', $data);
            
        }
    }  
    
    public function edit_blog_categories($t_id)
    {
        $session_id = $this->session->userdata('client_login');
        if ($session_id == true)
        { 
            $data['result'] = $this->Blog_model->get_single_cate_data($t_id);
            $this->load->view('admin/blog_categoty_edit', $data);            
        }else {
            $data['message'] = 'Your login session has expired';
            $this->load->view('admin/login', $data);
        }
    }
    
    public function update_blog_cate()
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
                $url = test_input($this->input->post('blogcateurl'));            
                $blogcate_id = test_input($this->input->post('t_id'));             
                $s_name = test_input($this->input->post('bcatename'));
                $caturl = test_input($this->input->post('caturl'));
			    $cat_desc =test_input($this->input->post('cat_desc'));  
                $old_profile2 =  test_input($this->input->post('old_profile2'));
                
                $picture2 = "";
                if (! empty($_FILES['largeImage']['name'])) {
                    $config['upload_path'] = 'assets/img/category';
                    $config['max_size'] = 2100;
                    // $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['file_name'] = time() . '-' . $_FILES['largeImage']['name'];
                    
                    // Load upload library and initialize configuration
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    
                    if ($this->upload->do_upload('largeImage')) {
                        $uploadData = $this->upload->data();
                        $picture2 = $uploadData['file_name'];
                        
                        $old_file_path2 = "assets/img/category/".$old_profile2;
                        if (file_exists($old_file_path2))
                        {
                            unlink($old_file_path2);
                        }
                    } else {
                        $picture2 = $old_profile2;
                        $this->session->set_flashdata('fileerror', 'Plase Must Choose jpg|jpeg|png|gif
                               formate file and size MAX 2 MB !');
                    }
                } else {     $picture2 = $old_profile2; }

                $data = array('b_cat_name' => $s_name,
                 'b_cat_url' => $caturl,
                 'cat_img' => $picture2,
                  'cat_desc' => $cat_desc 
             );
           
             $this->Blog_model->updateblogcate_data($data,$blogcate_id);
            
            $this->session->set_flashdata('success','Blog Category Updated Successfully!');
            redirect($url);            
            
        }else {
            $data['message'] = 'Your login session has expired';
            $this->load->view('admin/login', $data);
        }
        redirect(base_url() . 'admin/blog/view_category');
    }
    
    
    public function delete_blogcate($t_id)
    {
        $session_id = $this->session->userdata('client_login');
        if ($session_id == true)
        {
            $result=$this->Blog_model->get_single_data($t_id);
            $this->Blog_model->deleteblogcate_id($t_id);
            $this->session->set_flashdata('success','Blog Category Deleted successfully !');
            redirect(base_url().'admin/blog/view_category');
        }else
        {
            $data['message'] = 'Your login session has expired';
            $this->load->view('admin/login', $data);
        }
    }
    
    public function blogcate_status($t_id,$status)
    {
        $session_id = $this->session->userdata('client_login');
        if ($session_id == true)
        {
            $data = array('b_cat_status' => $status );
            $this->Blog_model->updateblogcate_data($data,$t_id);
            $this->session->set_flashdata('success','Blog Category Status change  Successfully!');
            redirect(base_url().'admin/blog/view_category');
            
        }else {
            $data['message'] = 'Your login session has expired';
            $this->load->view('admin/login', $data);
        }
    }
    
    public function create_blog_tag()
    {
        $session_id = $this->session->userdata('client_login');
        if($session_id==true)
        {
            $this->load->view('admin/blog_tag_add');
            
        } else {
            $data['message'] = 'Your login session has expired';
            $this->load->view('admin/login', $data);
        }
    }
    
    
    public function creating_blog_tag()
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
            $btag_name = test_input($this->input->post('tagname'));
            $btag_url = test_input($this->input->post('tagurl'));
            $data = array('b_tag_name' => $btag_name,'b_tag_url'=>$btag_url );
            
            $this->Blog_model->insert_tagdata($data);
            $this->session->set_flashdata('success','Blog Category Added Successfully!');
            //   redirect($url);
            redirect(base_url() . 'admin/blog/view_tag');
        } else
        {$data['message'] = 'Your login session has expired';
        $this->load->view('admin/login', $data);
        }
         }
         
         public function view_blog_tag()
         {
             $session_id = $this->session->userdata('client_login');
             if($session_id==true)
             { 
                  
                $admin_type = $this->session->userdata('admin_type');
                if ($admin_type =='1') {
                    $data['result']=$this->Blog_model->get_blogtagdata();
                    $this->load->view('admin/blog_tag_view', $data);
                } else {
                    $this->session->set_flashdata('error', 'Permission Restricted to open Admin data ');
                    redirect(base_url(). 'admin/');
                }
                
             } else {
                 $data['message'] = 'Your login session has expired';
                 $this->load->view('admin/login', $data);
                 
             }
         } 
         
         public function edit_blog_tag($t_id)
         {
             $session_id = $this->session->userdata('client_login');
             if ($session_id == true)
             {
                 $data['result'] = $this->Blog_model->get_single_tag_data($t_id);
                 $this->load->view('admin/blog_tag_edit', $data);
             }else {
                 $data['message'] = 'Your login session has expired';
                 $this->load->view('admin/login', $data);
             }
         }
         
         public function update_blog_tag()
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
                 
                 $url = test_input($this->input->post('blogcateurl'));                 
                 $blogcate_id = test_input($this->input->post('t_id'));
                 $s_name = test_input($this->input->post('btagname'));
                 $tagurl= test_input($this->input->post('tagurl'));
				 	$cat_desc =test_input($this->input->post('cat_desc'));    

                 $data = array('b_tag_name' => $s_name,'b_tag_url'=>$tagurl,'cat_desc'=>$cat_desc);
                 
                 $this->Blog_model->updateblogtag_data($data,$blogcate_id);
                 
                 $this->session->set_flashdata('success','Blog Tag Updated Successfully!');
                 redirect($url);
                 
             }else {
                 $data['message'] = 'Your login session has expired';
                 $this->load->view('admin/login', $data);
             }
             redirect(base_url() . 'admin/blog/view_category');
         }
         
         
         public function delete_blogtag($t_id)
         {
             $session_id = $this->session->userdata('client_login');
             if ($session_id == true)
             {
                 $result=$this->Blog_model->get_single_data($t_id);
                 $this->Blog_model->deleteblogtag_id($t_id);
                 $this->session->set_flashdata('success','Blog Tag Deleted successfully !');
                 redirect(base_url().'admin/blog/view_tag');
             }else
             {
                 $data['message'] = 'Your login session has expired';
                 $this->load->view('admin/login', $data);
             }
         }
         
         public function blogtag_status($t_id,$status)
         {
             $session_id = $this->session->userdata('client_login');
             if ($session_id == true)
             {
                 $data = array('b_tag_status' => $status );
                 $this->Blog_model->updateblogtag_data($data,$t_id);
                 $this->session->set_flashdata('success','Blog Tag Status change  Successfully!');
                 redirect(base_url().'admin/blog/view_tag');
                 
             }else {
                 $data['message'] = 'Your login session has expired';
                 $this->load->view('admin/login', $data);
             }
         }
		 
         public function add_category($t_id)
         {
             $session_id = $this->session->userdata('client_login');
             if ($session_id == true)
             {
                 $data['result'] = $this->Blog_model->get_category_add($t_id);
                 $data['categories'] = $this->Blog_model->get_blogcategory();
                 $data['result_category'] = $this->Blog_model->added_blogcategory($t_id);
                 $this->load->view('admin/set_blog_category', $data);
             }else {
                 $data['message'] = 'Your login session has expired';
                 $this->load->view('admin/login', $data);
             }
         }
        
         public function category_add()
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
                 $url = test_input($this->input->post('url'));
                 $blog_id = test_input($this->input->post('blog_id'));
                 $categories = test_input($this->input->post('categories'));
                 
                 $data = array('blog_id' => $blog_id,'b_cat_id'=>$categories );
                 
                 $this->Blog_model->insert_blog_category($data);
                 
                 $this->session->set_flashdata('success','Blog Category Set Successfully!');
                 redirect($url);
                 
             }else {
                 $data['message'] = 'Your login session has expired';
                 $this->load->view('admin/login', $data);
             }
             redirect(base_url() . 'Blogs/add_category');
         }
         
         public function delete_set_category($t_id,$b_id)
         {
             $session_id = $this->session->userdata('client_login');
             if ($session_id == true)
             {
                 $data['result'] = $this->Blog_model->get_category_add($t_id);
                 $this->Blog_model->deleteblogcateset_id($t_id);
                 $this->session->set_flashdata('success','Blog Category Deleted successfully !');
                 redirect(base_url().'Blogs/add_category/'.$b_id);
           
             }else
             {
                 $data['message'] = 'Your login session has expired';
                 $this->load->view('admin/login', $data);
             }
         }
         
       
         public function add_tag($t_id)
         {
             $session_id = $this->session->userdata('client_login');
             if ($session_id == true)
             {
                 $data['result'] = $this->Blog_model->get_tag_add($t_id);
                 $data['tags'] = $this->Blog_model->get_blogtag();
                 $data['result_tags'] = $this->Blog_model->added_blogtag($t_id);
                 $this->load->view('admin/set_blog_tag', $data);
             }else {
                 $data['message'] = 'Your login session has expired';
                 $this->load->view('admin/login', $data);
             }
         }
         
         public function tag_add()
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
                 $url = test_input($this->input->post('url'));
                 $blog_id = test_input($this->input->post('blog_id'));
                 $tags = test_input($this->input->post('tags'));
                 
                 $data = array('blog_id' => $blog_id,'b_tag_id'=>$tags );
                 
                 $this->Blog_model->insert_blog_tag($data);
                 
                 $this->session->set_flashdata('success','Blog Tag Set Successfully!');
                 redirect($url);
                 
             }else {
                 $data['message'] = 'Your login session has expired';
                 $this->load->view('admin/login', $data);
             }
             redirect(base_url() . 'Blogs/add_category');
         }
         
         public function delete_set_tag($t_id,$b_id)
         {
             $session_id = $this->session->userdata('client_login');
             if ($session_id == true)
             {
                 $data['result'] = $this->Blog_model->get_tag_add($t_id);
                 $this->Blog_model->deleteblogtagset_id($t_id);
                 $this->session->set_flashdata('success','Blog Category Deleted successfully !');
                 redirect(base_url().'Blogs/add_tag/'.$b_id);
                 
             }else
             {
                 $data['message'] = 'Your login session has expired';
                 $this->load->view('admin/login', $data);
             }
         }
         public function blog_single($b_id)
         {
             
             $data['blog_result']=$this->Blog_model->get_recent_blogdata();
             $data['website_info']= $this->website_model->get_single_data();
             $data['res_blog']= $this->Blog_model->get_blogslug_data($b_id);
             $data['res_cate']= $this->Blog_model->get_blogcatedata();
             $data['res_tag']= $this->Blog_model->get_blogtagdata($b_id);
             $data['res_tags']= $this->Blog_model->get_blogtagsdata();
             $this->load->view('blog_single',$data);
         }
         
         public function blog_categorywise($b_id)
         {
             
             $data['website_info']= $this->website_model->get_single_data();
             $data['res_blog']= $this->Blog_model->get_blogslug_data($b_id);
             $data['res_category']= $this->Blog_model->get_categorywiseblog_data($b_id);
             $this->load->view('blog_categorywise',$data);
         }
         
         public function blog_tagwise($b_id)
         {
             
             $data['website_info']= $this->website_model->get_single_data();
             $data['res_blog']= $this->Blog_model->get_blogslug_data($b_id);
             $data['res_tag']= $this->Blog_model->get_tagwiseblog_data($b_id);
             $this->load->view('blog_tagwise',$data);
         }


	public function cmt_status($t_id,$status,$blog_id)
    {
        $session_id = $this->session->userdata('client_login');
        if ($session_id == true)
        {
            $data = array('status' => $status );
			print_r($data );

            $this->Blog_model->update_cmt_data($data,$t_id);
            $this->session->set_flashdata('success','Blog Comments Status change  Successfully!');
            redirect(base_url().'Blogs/comment/'.$blog_id);
            
        }else {
            $data['message'] = 'Your login session has expired';
            $this->load->view('admin/login', $data);
        }
    }
	public function edit__blog()
    {
        $session_id = $this->session->userdata('client_login');
        if ($session_id == true)
        {


            $blog_id =$this->input->post('t_id');
            $url =$this->input->post('url');
            $name= $this->input->post('name');
            $emaile= $this->input->post('email');
             $mobilem=  $this->input->post('mobile');
            $message= $this->input->post('message');
            $status= $this->input->post('status');
            
             $data= array( 
                 'name' =>$name,'email' => $emaile,
                 'mobile' => $mobilem,'message' => $message,
                 'status' =>$status,  
             ); //Transfering data to Model
             
            //  $url=  $this->input->post('url');
            // $data = array('status' => $status );
			// print_r($data );

            $this->Blog_model->update_cmt_data($data,$blog_id);
            $this->session->set_flashdata('success','Blog Comments Updated  Successfully!');
            redirect($url);
            
        }else {
            $data['message'] = 'Your login session has expired';
            $this->load->view('admin/login', $data);
        }
    }

    
    public function cmt_delete($t_id,$blog_id)
    {
        $session_id = $this->session->userdata('client_login');
        if ($session_id == true)
        { 
          
			$this->Blog_model->delete_cmt_id($t_id);
            $this->session->set_flashdata('success','Blog Comments delete successfully !');
            redirect(base_url().'Blogs/comment/'.$blog_id);
        }else
        {
            $data['message'] = 'Your login session has expired';
            $this->load->view('admin/login', $data);
        }
    }
	 public function comment($t_id)
    {
        $session_id = $this->session->userdata('client_login');
        if ($session_id == true)
        {
        	$data['result'] = $this->Blog_model->get_single_data($t_id);
			$data['blog_comment'] = $this->Blog_model->get_blog_comment($t_id);
	 
		
 		 $this->load->view('admin/blog_comment', $data);
        }else {
            $data['message'] = 'Your login session has expired';
            $this->load->view('admin/login', $data);
        }
    }

 		public function comments_view($b_id,$blog_id)
         {        
        	$data['result'] = $this->Blog_model->get_single_data($blog_id);  
            $data['cmt_blog']= $this->Blog_model->get_blog_single_comment($b_id);  

            $data007= array( 
                'entry' =>"0",  
            ); 
            $this->Blog_model->update_cmt_data($data007,$b_id);
            $this->Blog_model->get_blog_single_comment($b_id);
             $this->load->view('admin/blog_comment_single',$data);
         }
 		public function comments_edit($b_id,$blog_id)
         {        
        	$data['result'] = $this->Blog_model->get_single_data($blog_id);  
            $data['cmt_blog']= $this->Blog_model->get_blog_single_comment($b_id);  
             $this->load->view('admin/blog_comment_single_edit',$data);
         }

}
?>