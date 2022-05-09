<!-- sidebar -->
<div class="sidebar px-4 py-4 py-md-4 me-0">
    <div class="d-flex flex-column h-100">
        <a href="<?php echo base_url()?>" class="mb-0 brand-icon">
            <span class="logo-icon">
                <i class="bi bi-bag-check-fill fs-4"></i>
            </span>
            <span class="logo-text">eBazar</span>
        </a>
        <!-- Menu: main ul -->
        <ul class="menu-list flex-grow-1 mt-3">
            <li><a class="m-link " href="<?php echo base_url();?>admin"><i class="icofont-dashboard fs-5"></i>
                    <span>Dashboard</span></a></li>
            <li class="collapsed">
                <a class="m-link" data-bs-toggle="collapse" data-bs-target="#admin-users" href="#">
                    <i class="icofont-users-alt-5 fs-5"></i> <span>Users</span> <span
                        class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                <!-- Menu: Sub menu ul -->
                <ul class="sub-menu collapse" id="admin-users">
                    <li><a class="ms-link" href="<?php echo base_url();?>admin/users">View List</a></li>
                    <li><a class="ms-link" href="<?php echo base_url();?>admin/add">Add User</a></li>

                </ul>
            </li>
            <li class="collapsed">
                <a class="m-link" data-bs-toggle="collapse" data-bs-target="#contact-us" href="#">
                    <i class="icofont-chat fs-5"></i> <span>Contact</span> <span
                        class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                <!-- Menu: Sub menu ul -->
                <ul class="sub-menu collapse" id="contact-us">
                    <li><a class="ms-link"
                            href="<?php echo base_url();?>admin/contact/view_inquiry">View Contacts</a>
                    </li>
                    <li><a class="ms-link" href="<?php echo base_url();?>admin/contact/export_inquiry">Export </a></li>

                </ul>
            </li>
            <li class="collapsed">
                <a class="m-link" data-bs-toggle="collapse" data-bs-target="#blogs" href="#">
                    <i class="icofont-blogger fs-5"></i> <span>Blogs</span> <span
                        class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                <!-- Menu: Sub menu ul -->
                <ul class="sub-menu collapse" id="blogs">
                    <li><a class="ms-link" href="<?php echo base_url();?>admin/blog/view_blog">View Blogs</a></li>
                    <li><a class="ms-link" href="<?php echo base_url();?>admin/blog/add_blog">Add Blog </a></li>
                    <li><a class="ms-link" href="<?php echo base_url();?>admin/blog/view_category">Blog Category</a>
                    </li>
                    <li><a class="ms-link" href="<?php echo base_url();?>admin/blog/view_tag">Blog Tag's</a></li>

                </ul>
            </li>

        </ul>
        <!-- Menu: menu collepce btn -->
        <a href="<?php echo base_url() .'admin/logout' ?>" class="btn btn-link sidebar-mini-btn text-light">
            <span class="ms-2"><i class="icofont-sign-out"></i></span>
        </a>
    </div>
</div>