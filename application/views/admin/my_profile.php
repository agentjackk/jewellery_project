<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>::eBazar:: Admin Profile </title>

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
                                <h3 class="fw-bold mb-0">Update Profile</h3>
                            </div>
                        </div>

                    </div> <!-- Row end  -->
                    <div class="row g-3">
                        <div class="col-xl-4 col-lg-5 col-md-12">
                            <div class="card profile-card flex-column mb-3">
                                <div
                                    class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                    <h6 class="mb-0 fw-bold ">Profile</h6>
                                </div>
                                <!-- left div -->
                                <?php 
                                $login_id =$this->session->userdata('ci_user_id');
                                $data = $this->db->query("SELECT * FROM `admin_login` WHERE user_id='$login_id' LIMIT 1"); 
                                foreach ($data->result() as $row) {
                                    $user_id = $row->user_id;
                                   
                                
                                ?>

                                <div class="card-body d-flex profile-fulldeatil flex-column">
                                    <div class="profile-block text-center w220 mx-auto">
                                        <a href="#">
                                            <img src="<?php echo base_url()."assets/uploads/client/".$row->profile?>"
                                                alt="admin_profile" class="avatar xl rounded img-thumbnail shadow-sm">
                                        </a>

                                        <div
                                            class="about-info d-flex align-items-center mt-3 justify-content-center flex-column">
                                            <span class="text-muted small">Admin ID : <?php echo $user_id;?></span>
                                        </div>
                                    </div>
                                    <div class="profile-info w-100">
                                        <h6 class="mb-0 mt-2  fw-bold d-block fs-6 text-center text-capitalize">
                                            <?php echo $row->name; echo'&nbsp'; echo $row->lname;?></h6>
                                        <span
                                            class="py-1 fw-bold small-11 mb-0 mt-1 text-muted text-center mx-auto d-block"><?php if($row->admin_type =='1'){
                             echo ' <span class="badge bg-danger">Superadmin</span>';
                         }else{
                             echo'<span class="badge bg-danger">Admin</span>';
                         }?></span>

                                        <div class="row g-2 pt-2">
                                            <div class="col-xl-12">
                                                <div class="d-flex align-items-center">
                                                    <i class="icofont-ui-touch-phone text-primary"></i>
                                                    <span class="ms-2"><?php echo $row->mobile?> </span>
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="d-flex align-items-center">
                                                    <i class="icofont-email text-danger"></i>
                                                    <span class="ms-2"><?php echo $row->email;?></span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                <!-- left div -->
                            </div>
                            <div class="card mb-3">
                                <div
                                    class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                    <h6 class="mb-0 fw-bold ">Change Password</h6>
                                </div>
                                <?php  echo form_open_multipart('Users/update_password' ,'class="needs-validation" novalidate'); ?>
                                <div class="card-body">

                                    <div data-label="Password " class="demo-code-preview row">
                                        <div class="col-md-12 mb-3">
                                            <label for="old_password">Old Password</label>
                                            <input name="old_password" id="old_password" type="password"
                                                class="form-control" placeholder="Old password" required>
                                            <div class="invalid-feedback">
                                                Please Enter Old Password.
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="password">New Password</label>
                                            <input name="password" id="password" type="password" class="form-control"
                                                placeholder="New password" required>
                                            <div class="invalid-feedback">
                                                Please Enter New Password.
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="password2">Confirm password</label>
                                            <input name="password2" id="password2" type="password" class="form-control"
                                                placeholder="Confirm password" required>

                                            <div class="invalid-feedback">
                                                Please Enter confirm password.
                                            </div>

                                        </div>




                                    </div>
                                    <br>
                                    <button class="btn btn-primary" type="submit">Update Password </button>
                                </div>
                                <?php  echo form_close();?>

                            </div>

                        </div>
                        <div class="col-xl-8 col-lg-7 col-md-12">
                            <div class="card mb-3">
                                <div
                                    class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                    <h6 class="mb-0 fw-bold ">Profile Settings</h6>
                                </div>
                                <div class="card-body">
                                    <?php 
                                            $ci="";$t_id="";
                                            foreach ($data->result() as $row) 
                                           {  
                                             $t_id = $row->user_id;  $status = $row->user_status;  
                                           ?>
                                    <form action="<?php echo base_url()?>users/update_admin"
                                        class=" g-3 needs-validation" method="post" accept-charset="utf-8"
                                        enctype="multipart/form-data" novalidate>
                                        <div class="row g-3 mb-3">
                                            <div class="col-sm-6">


                                                <input name="user_id" id="user_id" value="<?php echo $t_id?>"
                                                    type="hidden" class="form-control">
                                                <input type="hidden" name="url"
                                                    value="<?php echo base_url().$this->uri->uri_string();?>">



                                                <label for="name" class="form-label">First Name</label>
                                                <input type="text" class="form-control" name="name" id="name"
                                                    placeholder="First Name" value="<?php echo $row->name;?>" required>
                                                <div class="invalid-feedback">
                                                    Please Enter First Name.
                                                </div>

                                            </div>


                                            <div class="col-sm-6">
                                                <label for="lname" class="form-label">Last Name </label>
                                                <input type="text" class="form-control" name="lname" id="lname"
                                                    placeholder="Last Name" value="<?php echo $row->lname;?>" required>
                                                <div class="invalid-feedback">
                                                    Please Enter Last Name.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3 mb-3">
                                            <div class="col-sm-6">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" name="email" id="email"
                                                    placeholder="Email" value="<?php echo $row->email;?>" required>
                                                <div class="invalid-feedback">
                                                    Please Enter Valid Email.
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="mobile" class="form-label">Mobile Number</label>
                                                <input type="text" class="form-control" name="mobile" id="mobile"
                                                    value="<?php echo $row->mobile;?>" placeholder="Mobile"
                                                    maxlength="10" minlength="10"
                                                    onkeyup="this.value=this.value.replace(/[^\d]/,'')"
                                                    pattern="[789][0-9]{9}" autocomplete="off" required>
                                                <div class="invalid-feedback">
                                                    Please Enter Mobile Number.
                                                </div>
                                            </div>
                                        </div>
                                        <!-- for Super Admin -->
                                        <?php if($row->admin_type == "1"){ ?>
                                        <div class="row g-3 mb-3">
                                            <div class="col-sm-6">
                                                <label for="admin_type" class="form-label">Admin Role</label>
                                                <select class="form-select" aria-label="Default select example"
                                                    name="admin_type" id="admin_type" required>
                                                    <option value="">Select</option>
                                                    <option <?php if($row->admin_type == "1"){ echo 'selected';}?>
                                                        value="1">Super Admin</option>
                                                    <option <?php if($row->admin_type == "2"){ echo 'selected';}?>
                                                        value="2">ABD Admin</option>
                                                    <option <?php if($row->admin_type == "3"){ echo 'selected';}?>
                                                        value="3">BEED Admin</option>
                                                    <option <?php if($row->admin_type == "4"){ echo 'selected';}?>
                                                        value="4">ABD Staff</option>
                                                    <option <?php if($row->admin_type == "5"){ echo 'selected';}?>
                                                        value="5">BEED Staff</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please Select Admin Role.
                                                </div>
                                            </div>
                                        </div>

                                        <?php }else{ ?>
                                        <input name="admin_type" id="admin_type" value="<?php echo $row->admin_type?>"
                                            type="hidden" class="form-control">
                                        <?php } ?>

                                        <!-- for Super Admin -->
                                        <div class="row g-3 mb-3">
                                            <br><br>
                                        </div>

                                        <div class="row g-3 mb-3">
                                            <div class="col-sm-6">
                                                <label for="userImage" class="form-label">Profile </label>
                                                <input type="File" class="form-control" name="userImage" id="userImage">
                                                <code>( Height=350px  and width=350px; Max Image Size 2MB )</code>

                                                <div class="invalid-feedback">
                                                    Please Select User Image.
                                                </div>
                                            </div>
                                            <div class="col-sm-6 d-flex justify-content-center ">

                                                <input type="hidden" name="old_profile"
                                                    value="<?php echo $row->profile;?>">


                                                <img src="<?php echo base_url()."assets/uploads/client/".$row->profile;?>"
                                                    id="pre_profile" alt="profile-image"
                                                    style="max-width: 200px; max-height: 200px;">
                                            </div>

                                        </div>
                                        <div class="col-auto d-flex w-sm-100 justify-content-end m-4">
                                            <button type="submit"
                                                class="btn btn-primary btn-set-task w-sm-100">&nbsp;Submit&nbsp;</button>
                                        </div>


                                    </form>
                                    <?php  } ?>
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
    $(function() {

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#pre_profile').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#userImage").change(function() {
            readURL(this);
        });


    });
    </script>
</body>

</html>