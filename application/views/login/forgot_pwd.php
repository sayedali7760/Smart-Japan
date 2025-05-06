<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic - Bootstrap 5 HTML, VueJS, React, Angular & Laravel Admin Dashboard Theme
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
<!--begin::Head-->

<head>
    <title><?php echo APP_TITLE; ?></title>
    <meta charset="utf-8" />
    <meta name="description"
        content="" />
    <meta name="keywords"
        content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title"
        content="" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <link rel="canonical" href="" />
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/media/footer.png" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="<?php echo base_url(); ?>assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="bg-body">
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed"
            style="background-image: url(<?php echo base_url(); ?>assets/media/bg/login.png)">
            <!--begin::Content-->
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                <!--begin::Logo-->

                <!--end::Logo-->
                <!--begin::Wrapper-->
                <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                    <!--begin::Form-->

                    <!--begin::Heading-->
                    <div class="text-center mb-10">
                        <!--begin::Title-->
                        <a href="<?php echo base_url(); ?>../../demo8/dist/index.html" class="mb-12">
                            <img alt="Logo" src="<?php echo base_url(); ?>assets/media/logos/Logo.png" class="h-40px" />
                        </a>
                        <!--end::Title-->
                        <!--begin::Link-->
                        <div class="text-gray-400 fw-bold fs-4">Reset Password

                        </div>
                        <!--end::Link-->
                    </div>
                    <!--begin::Heading-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <!--begin::Label-->
                        <label class="form-label fs-6 fw-bolder text-dark">Enter your Registered Email</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-lg form-control-solid" autocomplete="off"
                            placeholder="Enter Email" id="username" name="username" value="<?php if (isset($_COOKIE["ecomm_username"])) {
                                                                                                echo $_COOKIE["green_username"];
                                                                                            } ?>">
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->




                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="text-center">
                        <!--begin::Submit button-->

                        <!-- <a href="javascript:void(0);" id="#actual_submit" onclick="submit()" class="btn btn-lg btn-primary w-100 mb-5 actual_submit"
                            title="Submit"><i class="icon-unlock2"></i> Get New Password</a>
                        <a id="loader_submit" style="display:none;" href="javascript:void(0);" class="btn btn-primary loader_submit" data-kt-indicator="on">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </a> -->
                        <button type="button" id="actual_submit" onclick="submit()" class="btn btn-lg btn-primary w-100 mb-5 actual_submit" title="Submit">
                            <i class="icon-unlock2"></i> Get New Password
                        </button>

                        <button type="button" id="loader_submit" class="btn btn-lg btn-primary w-100 mb-5 loader_submit" data-kt-indicator="on" style="display: none;">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                        <!--end::Submit button-->
                        <!--begin::Separator-->
                        <!-- <div class="text-center text-muted text-uppercase fw-bolder mb-5">or</div> -->
                        <!--end::Separator-->
                        <!--begin::Google link-->
                        <a href="<?php echo base_url(); ?>/login" class=" btn-lg w-100 mb-5">
                            <!-- <img alt="Logo" src="<?php echo base_url(); ?>assets/media/svg/brand-logos/google-icon.svg"
                                class="h-20px me-3" />Continue with Google</a> -->

                            Login </a>
                        <a id="loader_submit" style="display:none;" href="javascript:void(0);" class="btn btn-primary" data-kt-indicator="on">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </a>

                        <!--end::Google link-->
                        <!--begin::Google link-->

                        <!--end::Google link-->
                    </div>
                    <!--end::Actions-->

                    <!--end::Form-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Content-->
            <!--begin::Footer-->

            <!--end::Footer-->
        </div>
        <!--end::Authentication - Sign-in-->
    </div>
    <!--end::Root-->
    <!--end::Main-->
    <!--begin::Javascript-->
    <script>
        var hostUrl = "assets/";
    </script>
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="<?php echo base_url(); ?>assets/plugins/global/plugins.bundle.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/scripts.bundle.js"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="<?php echo base_url(); ?>assets/js/custom/authentication/sign-in/general.js"></script>
    <!--end::Page Custom Javascript-->
    <!--end::Javascript-->
    <script type="text/javascript">
        function submit() {
            $(".actual_submit").hide();
            $(".loader_submit").show();
            var baseurl = '<?php echo base_url(); ?>';
            var ops_url = baseurl + 'login/reset-password';
            var username = $('#username').val();
            var position = 1;
            if (username == '') {
                $(".actual_submit").show();
                $(".loader_submit").hide();
                Swal.fire({
                    title: 'Login failed',
                    text: 'Email is required',
                    icon: 'error'
                });
                return false;
            }

            $.ajax({
                type: "POST",
                cache: false,
                async: true,
                url: ops_url,
                data: {
                    "email": username,
                },
                success: function(result) {
                    var data = $.parseJSON(result);

                    if (data.status == 1) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Password Changed',
                            text: 'Updated password is sent to your registered Mail-Id.'
                        }).then(function(result) {
                            if (result.isConfirmed) {
                                window.location.href = baseurl + 'login';
                            }
                        });
                    }
                    if (data.status == 0) {
                        $(".actual_submit").show();
                        $(".loader_submit").hide();
                        Swal.fire({
                            icon: 'error',
                            title: 'Failed to Reset Password',
                            text: 'Please Provide your Registered Mail-Id'
                        });
                    }
                },
                error: function(xhr, status, error) {
                    $("#loader").hide();
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'An error occurred while processing your request.'
                    });
                }
            });

        }
    </script>

    <!-- <script type="text/javascript">
        function send_verification() {
            $("#loader").show();
            var email = $('#forgot_email').val();
            var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (email == '') {
                swal('', 'Email-Id Required.', 'info');
                $("#loader").hide();
                return false;
            } else if (!regex.test(email)) {
                swal('', 'Enter valid Email-id.', 'info');
                $("#loader").hide();
                return false;
            }
            var baseurl = '<?php echo base_url(); ?>';
            var ops_url = baseurl + 'login/forgot-password';
            $.ajax({
                type: "POST",
                cache: false,
                async: true,
                url: ops_url,
                data: {
                    "email": email
                },
                success: function(result) {
                    $("#loader").hide();
                    var data = $.parseJSON(result)
                    if (data.status == 1) {
                        swal({
                                title: "Success",
                                text: "Please check your Email.",
                                type: "success",
                                showCancelButton: false,
                                confirmButtonText: 'OK',
                                closeOnConfirm: false,
                                closeOnCancel: false
                            },
                            function(isConfirm) {

                                if (isConfirm) {
                                    window.location.reload(true);

                                } else {
                                    window.location.reload(true);
                                }
                            });
                    } else {
                        swal('', 'Email not registered.', 'error');
                    }
                }
            });

        }
    </script> -->
</body>

</html>
<?php ?>