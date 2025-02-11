<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
|    example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|    https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|    $route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|    $route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|    $route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:    my-controller/index    -> my_controller/index
|        my-controller/my-method    -> my_controller/my_method
 */

$route['settings'] = 'Dashboard_controller/settings';
$route['logout'] = 'Login/logout';
$route['home'] = 'dashboard_controller';
$route['error'] = 'Login/error';
$route['login/login'] = 'Login/loginaction';
$route['home/dashboard'] = 'dashboard_controller';
$route['login/forgot-password'] = 'Login/forgot_password_check';
$route['update-forgot-password?(:any)'] = 'Login/change_password_user';
$route['forgot-password/update-password'] = 'Login/update_password';
$route['signup'] = 'Login/signup';

// user management
$route['user-management/user-add'] = 'settings/User_management/user_add';
$route['user-management/save-user'] = 'settings/User_management/save_user';
$route['user-management/user-show'] = 'settings/User_management/user_list';
$route['user-management/edit-user'] = 'settings/User_management/edit_user';
$route['user-management/update-user'] = 'settings/User_management/update_user';
$route['user-management/change_status'] = 'settings/User_management/change_status';
$route['user-management/edit-profile'] = 'settings/User_management/edit_profile_self';
$route['user-management/client-add'] = 'settings/User_management/client_add';
$route['user-management/save-client'] = 'settings/User_management/save_client';
$route['user-management/client-show'] = 'settings/User_management/client_list';
$route['user-management/edit-client'] = 'settings/User_management/edit_client';
$route['user-management/update-client'] = 'settings/User_management/update_client';

// organization section
$route['organization/organization-show'] = 'settings/Organization/organization_show';
$route['organization/organization-add'] = 'settings/Organization/organization_add';
$route['organization/save-organization'] = 'settings/Organization/organization_save';
$route['organization/edit-organization'] = 'settings/Organization/edit_organization';
$route['organization/update-organization'] = 'settings/Organization/update_organization';
$route['organization/change_status'] = 'settings/Organization/change_status';

$route['product/category-add'] = 'settings/Product/add_product_cat';
$route['product/category-save'] = 'settings/Product/save_product_cat';
$route['product/category-show'] = 'settings/Product/show_product_cat';
$route['product/change_status'] = 'settings/Product/change_status';
$route['product/edit-category'] = 'settings/Product/edit_category';
$route['product/update-category'] = 'settings/Product/update_category';
$route['product/add-product'] = 'settings/Product/add_product';
$route['product/product-save'] = 'settings/Product/save_product';
$route['product/product-show'] = 'settings/Product/show_product';
$route['product/change_status'] = 'settings/Product/change_product_status';
$route['product/view-product'] = 'settings/Product/view_product';
$route['product/edit-product'] = 'settings/Product/edit_product';
$route['product/product-update'] = 'settings/Product/update_product';

$route['client/client-show'] = 'settings/Client/show_client';
$route['client/change_status'] = 'settings/Client/change_status';

$route['client-crm/show-product'] = 'settings/Client_crm/show_product';
$route['client-crm/view-product'] = 'settings/Client_crm/view_product';


$route['default_controller'] = 'Login';
$route['404_override'] = 'Login/error';
$route['translate_uri_dashes'] = false;