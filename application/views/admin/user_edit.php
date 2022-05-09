<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<!-- Mirrored from www.pixelwibes.com/template/ebazar/html/dist/customers.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Apr 2022 09:34:41 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>User Edit</title>
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
            <div class="body d-flex py-lg-3 py-md-2">
                <div class="container-xxl">
                    <div class="row align-items-center">
                        <div class="border-0 mb-4">
                            <div
                                class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                                <h3 class="fw-bold mb-0">Edit User</h3>
                                <!-- <div class="col-auto d-flex w-sm-100">
                                    <button type="button" class="btn btn-primary btn-set-task w-sm-100"
                                        data-bs-toggle="modal" data-bs-target="#expadd"><i
                                            class="icofont-plus-circle me-2 fs-6"></i>Add New User</button>
                                </div> -->
                            </div>
                        </div>
                    </div> <!-- Row end  -->
                    <div class="row clearfix g-3">
                        <div class="col-sm-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="deadline-form">
                                        <?php 
                                            $ci="";$t_id="";
                                            foreach ($result as $row) 
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
                                                        placeholder="First Name" value="<?php echo $row->name;?>"
                                                        required>
                                                    <div class="invalid-feedback">
                                                        Please Enter First Name.
                                                    </div>

                                                </div>


                                                <div class="col-sm-6">
                                                    <label for="lname" class="form-label">Last Name </label>
                                                    <input type="text" class="form-control" name="lname" id="lname"
                                                        placeholder="Last Name" value="<?php echo $row->lname;?>"
                                                        required>
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
                                            <div class="row g-3 mb-3">
                                                <!-- <div class="col-sm-6">
                                                    <label for="password" class="form-label">Password</label>
                                                    <input type="password" class="form-control" name="password"
                                                        id="password" placeholder="Password" required>
                                                    <div class="invalid-feedback">
                                                        Please Enter Password.
                                                    </div>
                                                </div> -->
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
                                            <div class="row g-3 mb-3">
                                                <br><br>
                                            </div>

                                            <div class="row g-3 mb-3">
                                                <div class="col-sm-6">
                                                    <label for="userImage" class="form-label">Profile </label>
                                                    <input type="File" class="form-control" name="userImage"
                                                        id="userImage">
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
                                                <button type="submit" class="btn btn-primary btn-set-task w-sm-100"><i
                                                        class="icofont-save me-2 fs-6"></i>&nbsp;Submit&nbsp;</button>
                                            </div>


                                        </form>
                                        <?php  } ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Password Form -->
                        <div class="col-sm-12">


                            <div class="row align-items-center">
                                <div class="border-0 mb-4">
                                    <div
                                        class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                                        <h3 class="fw-bold mb-0">Change Password </h3>

                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="deadline-form">

                                        <form action="<?php echo base_url()?>users/update_user_password"
                                            class=" g-3 needs-validation" method="post" accept-charset="utf-8"
                                            enctype="multipart/form-data" novalidate>
                                            <div class="row g-3 mb-3">
                                                <div class="col-sm-6">


                                                    <input name="user_id" id="user_id" value="<?php echo $t_id?>"
                                                        type="hidden" class="form-control">
                                                    <input type="hidden" name="url"
                                                        value="<?php echo base_url().$this->uri->uri_string();?>">



                                                    <label for="password" class="form-label"> New Password</label>
                                                    <input type="password" class="form-control" name="password"
                                                        id="password" placeholder="New Password"
                                                        required>
                                                    <div class="invalid-feedback">
                                                        Please Enter New Pasword.
                                                    </div>

                                                </div>
                                                <div class="col-sm-6">

                                                    <label for="password2" class="form-label">Confirm Password</label>
                                                    <input type="password" class="form-control" name="password2"
                                                        id="password2" placeholder="Confirm Password"                                                    
                                                        required>
                                                    <div class="invalid-feedback">
                                                        Please Confirm New Password.
                                                    </div>

                                                </div>



                                            </div>

                                            <div class="col-auto d-flex w-sm-100 justify-content-end m-4">
                                                <button type="submit" class="btn btn-primary btn-set-task w-sm-100"><i
                                                        class="icofont-save me-2 fs-6"></i>&nbsp;Update Password &nbsp;</button>
                                            </div>


                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row End -->
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