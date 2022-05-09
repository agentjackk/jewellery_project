<!doctype html>
<html class="no-js" lang="en" dir="ltr">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Blog Add </title>
    <!-- link Files -->
    <?php $this->load->view('admin/includes/link')?>
    <!-- link Files -->


    <link href="<?php echo base_url();?>assets/vendors/select2/css/select2.min.css" rel="stylesheet">

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
                                <h3 class="fw-bold mb-0">Edit Blog</h3>

                            </div>
                        </div>
                    </div> <!-- Row end  -->

                    <div class="row g-5 mb-3  d-flex justify-content-center">

                        <?php  echo form_open_multipart('blogs/update_Blog' ,'class="needs-validation row g-4" novalidate'); ?>

                        <?php foreach ($result as $row) {    $t_id = $row->blog_id;  $status = $row->blog_status;  ?>
                        <div class="col-xl-9 col-lg-7 col-md-12 ">
                            <div class="card mb-3 ">
                                <div
                                    class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                    <h6 class="mb-0 fw-bold ">Blog Details</h6>
                                </div>
                                <div class="card-body ">


                                    <div class="col-12 mb-2">
                                        <div class="form-group">
                                            <input name="blog_id" id="blog_id" value="<?php echo $t_id?>" type="hidden"
                                                class="form-control">
                                            <input type="hidden" name="url"
                                                value="<?php echo base_url().$this->uri->uri_string();?>">


                                            <label class="form-label">Blog Heading </label>
                                            <input name="b_name" id="b_name" type="text" class="form-control"
                                                value="<?php echo $row->blog_name;?>" onload="convertToSlug(this.value)"
                                                onkeyup="convertToSlug(this.value)" required>
                                            <div class="invalid-feedback"> Please Enter Blog Heading. </div>
                                            <code>	Permalink:*  <?php echo  base_url();?><span id="blog_slug"><?php echo $row->blog_url;?></span> </code>
                                        </div>
                                    </div>
                                    <div class="col-12 ">
                                        <div class="form-group">

                                            <label class="form-label">Blog Url</label>
                                            <input name="blog_url" id="blog_url" type="text"
                                                class="form-control" " value=" <?php echo $row->blog_url;?>" required>
                                            <div class="invalid-feedback">Please Enter Blog Url Permalink. </div>
                                        </div>
                                    </div>


                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label">Short Description</label>
                                            <textarea class="form-control" name="short_desc" id="short_desc" rows="2"
                                                value="" required minlength="100"
                                                maxlength="1000"><?php echo $row->short_desc;?></textarea>
                                            <div class="invalid-feedback"> Please Enter Blog Short
                                                Description. </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label">Long Description</label>
                                            <textarea class="editor form-control" name="long_desc1" id="long_desc1"
                                                rows="3"><?php echo $row->long_desc1;?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 d-none">
                                        <div class="form-check form-switch mt-4">
                                            <label class="form-label">Long Description 2</label>
                                            <textarea class="editor form-control " name="long_desc2" id="long_desc2"
                                                rows="3" value=""> </textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label class="form-label">Large Image</label>
                                                    <input name="largeImage" id="largeImage" type="file"
                                                        class="form-control" onchange="PreviewImage();" >
                                                </div>
                                                <br>
                                                <div class="form-group text-center">
                                                <input type="hidden" name="old_profile2"
                                                                value="<?php echo $img_path2=  $row->long_img;?>">

                                                    <img id="prelg_profile" class="img-responsive"
                                                        src="<?php echo base_url()."assets/uploads/blogs/".$img_path2;?>"
                                                        alt="uploadPreview" style="max-width: 50vw;">
                                                </div>



                                            </div>
                                        </div>
                                    </div>



                                </div>
                            </div>

                        </div>
                        <div class="col-xl-3 col-lg-5 col-md-12 ">
                            <div class="card mb-3">
                                <div
                                    class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                    <h6 class="mb-0 fw-bold ">Publish </h6>
                                </div>
                                <div class="card-body">
                                    <div class="payment-info text-center">
                                        <button type="submit" class="btn btn-primary btn-set-task w-sm-100"><i
                                                class="icofont-save me-2 fs-6"></i>&nbsp;Submit&nbsp;</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div
                                    class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                    <h6 class="mb-0 fw-bold ">Blog Status <span style="color :red">*</span></h6>
                                </div>
                                <div class="card-body text-center">
                                    <div class="row">
                                        <?php  $blog_status =  $row->blog_status;?>
                                        <select name="blog_status" id="blog_status" required class="form-control"
                                            required>
                                            <option value="">Select</option>
                                            <option value="1" <?php if ($blog_status == 1) { echo "selected";} ?>>
                                                Published
                                            </option>
                                            <option value="0" <?php if ($blog_status == 0) { echo "selected";} ?>>
                                                Pending
                                            </option>
                                        </select>
                                        <div class="invalid-tooltip"> Please Select Blog Status </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div
                                    class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                    <h6 class="mb-0 fw-bold ">Blog Comments <span style="color :red">*</span></h6>
                                </div>
                                <div class="card-body text-center">
                                    <div class="row">
                                        <?php  $cmt =  $row->blog_comment;?>
                                        <select name="blog_comment" id="blog_comment" required class="form-control"
                                            required>
                                            <option value="">Select</option>
                                            <option value="1" <?php if ($cmt == 1) { echo "selected";} ?>>Turn
                                                On
                                            </option>
                                            <option value="0" <?php if ($cmt == 0) { echo "selected";} ?>>Turn
                                                Off
                                            </option>
                                        </select>
                                        <div class="invalid-tooltip"> Please Select Blog Status </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div
                                    class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                    <h6 class="mb-0 fw-bold ">Blog Category<span style="color :red">*</span></h6>
                                </div>
                                <div class="card-body text-center">
                                    <div class="row">
                                        <?php     $category_id =  $row->category_id;  	?>

                                        <select name="category_id" id="category_id" required class="form-control"
                                            required>
                                            <option value="">Select</option>
                                            <?php

                                           foreach ($cat_result as $prow) 
                                           {     $gc_id=  $prow->b_cat_id; 
                                                $service_nm=  $prow->b_cat_name; 
                                                if ($category_id == $gc_id) { 
                                           ?>
                                            <option value="<?php  echo $gc_id?>" selected="selected">
                                                <?php  echo $service_nm?></option>

                                            <?php   } else {  ?>
                                            <option value="<?php echo $gc_id?>"><?php echo $service_nm?>
                                            </option>

                                            <?php   } } ?>
                                        </select>

                                        <div class="invalid-tooltip"> Please Select Blog Category </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div
                                    class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                    <h6 class="mb-0 fw-bold ">Blog Tag's <span style="color :red"></span></h6>
                                </div>
                                <div class="card-body text-center">
                                    <?php     $tags_id =  $row->tags_id;
                                                $tags_id= explode(",",$tags_id)	
                                              ?>
                                    <div class="form-grup">
                                        <select name="tags_id[]" id="tags_id" required
                                            class="select2-example form-control" multiple>
                                            <option value="">Select</option>
                                            <?php foreach ($tag_result as $prow) 
                                                      {     $gc_id=  $prow->b_tag_id; 
                                                $service_nm=  $prow->b_tag_name; 

                                                if (in_array($gc_id , $tags_id))
                                                {
                                                      ?>
                                            <option value="<?php  echo $gc_id?>" selected="selected">
                                                <?php  echo $service_nm?></option>

                                            <?php   } else {  ?>
                                            <option value="<?php echo $gc_id?>"><?php echo $service_nm?>
                                            </option>

                                            <?php   } } ?>
                                        </select>


                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div
                                    class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                    <h6 class="mb-0 fw-bold ">Blog Thumbnel <span style="color :red">*</span></h6>
                                </div>
                                <div class="card-body text-center">
                                    <?php  $category_id =  $row->category_id;?>
                                    <div class="form-row">
                                        <div class="col-md-12">

                                            <input type="hidden" name="old_profile"
                                                value="<?php echo $img_path=  $row->small_img;?>">
                                            <img src="<?php echo base_url()."assets/uploads/blogs/".$img_path;?>"
                                                id="presm_profile" alt="profile-image" style="max-width: 200px;">
                                            <div class="form-group">
                                                <label for="smallImage">Small Image</label>
                                                <input name="smallImage" id="smallImage" type="file"
                                                    class="form-control" PreviewImage2>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div
                                        class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                        <h6 class="mb-0 fw-bold ">Publish </h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="payment-info text-center">
                                            <button type="submit" class="btn btn-primary btn-set-task w-sm-100"><i
                                                    class="icofont-save me-2 fs-6"></i>&nbsp;Submit&nbsp;</button>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <?php } ?>

                            <?php  echo form_close();?>


                        </div><!-- Row end  -->

                    </div>
                </div>




            </div>

        </div>

        <!-- Script -->
        <?php $this->load->view('admin/includes/script')?>
        <!-- Script -->


        <script src="<?php echo base_url();?>assets/vendors/select2/js/select2.min.js"></script>


        <script src="<?= base_url("assets/tinymce/js/tinymce/tinymce.min.js"); ?>"></script>
        <script>
        tinymce.init({
            selector: ('#long_desc1'),
            theme: "modern",
            height: 500,
            relative_urls: false,
            remove_script_host: false,
            convert_urls: false,
            codesample_languages: [{
                    text: 'HTML/XML',
                    value: 'markup'
                },
                {
                    text: 'JavaScript',
                    value: 'javascript'
                },
                {
                    text: 'CSS',
                    value: 'css'
                },
                {
                    text: 'PHP',
                    value: 'php'
                },
                {
                    text: 'Ruby',
                    value: 'ruby'
                },
                {
                    text: 'Python',
                    value: 'python'
                },
                {
                    text: 'Java',
                    value: 'java'
                },
                {
                    text: 'C',
                    value: 'c'
                },
                {
                    text: 'C#',
                    value: 'csharp'
                },
                {
                    text: 'C++',
                    value: 'cpp'
                }
            ],
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking codesample",
                "table contextmenu directionality emoticons paste textcolor responsivefilemanager code "
            ],
            toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
            toolbar2: "| responsivefilemanager | link unlink anchor | codesample image media | forecolor backcolor  | print preview code ",
            image_advtab: true,

            external_filemanager_path: "<?php echo base_url(); ?>filemanager/",
            filemanager_title: "Responsive Filemanager",
            external_plugins: {
                "filemanager": "<?php echo base_url(); ?>filemanager/plugin.min.js"
            }
        });


        $('.select2-example').select2({
            placeholder: 'Select'
        });

        $('#tags_id').select2({
            placeholder: 'Select'
        });

        function PreviewImage() {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("largeImage").files[0]);

            oFReader.onload = function(oFREvent) {
                document.getElementById("prelg_profile").src = oFREvent.target.result;
            };
        };

        function PreviewImage2() {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("largeImage").files[0]);

            oFReader.onload = function(oFREvent) {
                document.getElementById("prelg_profile").src = oFREvent.target.result;
            };
        };



        function convertToSlug(str) {
            //replace all special characters | symbols with a space
            str = str.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ').toLowerCase();
            // trim spaces at start and end of string
            str = str.replace(/^\s+|\s+$/gm, '');
            // replace space with dash/hyphen
            str = str.replace(/\s+/g, '-');
            document.getElementById('blog_url').value = str;
            document.getElementById('blog_slug').innerHTML = str;

        }

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#presm_profile').attr('src', e.target.result);

                }
                reader.readAsDataURL(input.files[0]);

            }
        }
        $("#smallImage").change(function() {
            readURL(this);

        });
        </script>

</body>

</html>