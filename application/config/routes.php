<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Admin';
$route['404_override'] = 'CustomError/error_404';
$route['505_override'] = '';
$route['translate_uri_dashes'] = FALSE;




// /*  Blogs  Routing */

// $route['n/(:any)'] = "Home/index/$1"; 
// $route['blog/(:any)'] = "Home/single/$1"; 
// $route['blog-tag/(:any)'] = "home/blog_tag/$1";
// $route['blog-categories/(:any)'] = "home/blog_categories/$1";
// $route['blog-search'] = "home/search_blogs/"; 


//Backend Custom Routes  ↓
// Admin Users
$route['admin/users'] = "Users";
$route['admin/add'] = "Users/create";
$route['admin/profile'] = "Users/update_profile";
$route['admin/user_edit/(:any)'] = "Users/edit/$1";

// Contact us
$route['admin/contact/view_inquiry'] = "Contact/view_contact";
$route['admin/contact/export_inquiry'] = "Contact/export";
$route['admin/contact/inquiry_details/(:any)'] = "Contact/view_details/$1";


// Blogs Backend
$route['admin/blog/view_blog'] = "Blogs/view";
$route['admin/blog/add_blog'] = "Blogs/create_blog";
$route['admin/blog/view_category'] = "Blogs/view_blog_categories";
$route['admin/blog/view_tag'] = "Blogs/view_blog_tag";
$route['admin/blog/blog_comments/(:any)'] = "Blogs/comment/$1";
$route['admin/blog/comment_view/(:any)/(:any)'] = "blogs/comments_view/$1/$2";
$route['admin/blog/comment_edit/(:any)/(:any)'] = "blogs/comments_edit/$1/$2";
$route['admin/blog/edit_blog/(:any)'] = "Blogs/edit/$1";
$route['admin/blog_category/edit/(:any)'] = "Blogs/edit_blog_categories/$1";
$route['admin/blog_tag/edit/(:any)'] ="Blogs/edit_blog_tag/$1";

