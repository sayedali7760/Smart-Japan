<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

    <div class="post d-flex flex-column-fluid" id="kt_post">

        <div id="kt_content_container" class="container-xxl">

            <?php
            echo form_open_multipart('settings/add_client', array('id' => 'client_save', 'role' => 'form', 'class' => 'form d-flex flex-column flex-lg-row'));
            ?>


            <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                <div class="card card-flush py-4">
                    <div class="card-header">
                        <div class="card-title">
                            <h2>Thumbnail</h2>
                        </div>
                    </div>
                    <div class="card-body text-center pt-0">
                        <div class="image-input image-input-empty image-input-outline mb-3" data-kt-image-input="true"
                            style="background-image: url(assets/media/svg/files/blank-image.svg)">
                            <div class="image-input-wrapper w-150px h-150px"></div>
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                <i class="bi bi-pencil-fill fs-7"></i>
                                <input type="file" name="avatar[]" id="avatar" accept=".png, .jpg, .jpeg" />
                                <input type="hidden" name="avatar_remove" />
                            </label>
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                        </div>
                        <div class="text-muted fs-7">Set the product thumbnail image. Only *.png, *.jpg and *.jpeg image
                            files are accepted</div>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">

                <div class="tab-content">

                    <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
                        <div class="d-flex flex-column gap-7 gap-lg-10">

                            <div class="card card-flush py-4">

                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Add Client</h2>
                                    </div>
                                </div>

                                <div class="card-body pt-0">
                                    <div class="d-flex flex-wrap gap-5">
                                        <!-- <div class="fv-row w-100 flex-md-root">
                                            <label class="required form-label">Role</label>
                                            <select class="form-select mb-5" data-control="select2"
                                                data-placeholder="Select an option" data-allow-clear="true"
                                                name="position" id="position">
                                                <option value=""></option>
                                                <php
                                            if (isset($user_role) && !empty($user_role)) {
                                                foreach ($user_role as $pos) {

                                                    echo '<option value ="' . $pos->role_id . '">' . $pos->description . '</option>';
                                                }
                                            }
                                            ?>
                                            </select>
                                        </div> -->

                                        <div class="fv-row w-100 flex-md-root">
                                            <label class="required form-label">Full Name</label>
                                            <input type="text" class="form-control mb-5" id="name" name="name"
                                                placeholder="First Name" maxlength="50">
                                        </div>


                                        <div class="fv-row w-100 flex-md-root">
                                            <label class="required form-label">Email</label>
                                            <input type="text" class="form-control mb-5" id="email" name="email"
                                                placeholder="Email" maxlength="50">
                                        </div>


                                        <div class="fv-row w-100 flex-md-root">
                                            <label class="required form-label">Date of Birth</label>
                                            <input type="text" id="dob" name="dob"
                                                class="mb-5 form-control make-star" placeholder="Select your DOB" autocomplete="off">
                                        </div>



                                    </div>
                                    <div class="d-flex flex-wrap gap-5">

                                        <div class="fv-row w-100 flex-md-root">
                                            <label class="required form-label">Password</label>
                                            <input type="text" id="password" maxlength="15" name="password"
                                                class="mb-5 form-control make-star" id="" placeholder="Password">
                                        </div>

                                        <div class="fv-row w-100 flex-md-root">
                                            <label class="required form-label">Confirm Password</label>
                                            <input type="text" id="con_password" maxlength="15" name="con_password"
                                                class="form-control make-star mb-5" id=""
                                                placeholder="Confirm Password">
                                        </div>


                                        <div class="fv-row w-100 flex-md-root">
                                            <label class="form-label">Country</label>
                                            <select class="form-select" data-placeholder="Select an option" id="kt_ecommerce_edit_order_billing_country" name="country">
                                                <?php foreach ($countries as $country) { ?>
                                                    <option value="<?php echo $country->country_code; ?>" data-kt-select2-country="<?php echo base_url(); ?><?php echo $country->flag_image_url; ?>"><?php echo $country->country_name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="d-flex flex-wrap gap-5">

                                        <div class="fv-row w-100 flex-md-root">
                                            <label class="form-label">Phone No</label>
                                            <input type="text" id="phone" name="phone"
                                                class="form-control numeric mb-5" id=""
                                                placeholder="Phone No" maxlength="12">
                                        </div>

                                        <div class="fv-row w-100 flex-md-root">
                                            <label class="form-label">Manager</label>
                                            <select class="form-select mb-5" data-control="select2" data-placeholder="Select an option" id="manager" name="manager">
                                                <option value=""></option>
                                                <?php foreach ($staff_details as $staff) { ?>
                                                    <option value="<?php echo $staff->id; ?>"><?php echo $staff->fname; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="fv-row w-100 flex-md-root">
                                        </div>

                                    </div>
                                    <div class="d-flex flex-wrap gap-5">
                                        <div class="fv-row w-100 flex-md-root">
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">

                                        <a href="<?php echo base_url(); ?>home" id="kt_ecommerce_add_product_cancel"
                                            class="btn btn-light me-5">Cancel</a>


                                        <a id="actual_submit" href="javascript:void(0);" class="btn btn-primary submit_butt" title="Save Changes"
                                            onclick="submit_data()">Save</a>
                                        <a id="loader_submit" style="display:none;" href="javascript:void(0);" class="btn btn-primary" data-kt-indicator="on">
                                            <span class="indicator-label">Submit</span>
                                            <span class="indicator-progress">Please wait...
                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </a>

                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>

                </div>


            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

<script>
    $(function() {
        $('#dob').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            autoUpdateInput: false,
            locale: {
                format: 'YYYY-MM-DD'
            },
            maxDate: moment(), // Optional: prevent future dates
            minYear: 1900,
            maxYear: parseInt(moment().format('YYYY'), 10)
        });

        $('#dob').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('YYYY-MM-DD'));
        });
        $('#dob').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });
    })
</script>

<script>
    function submit_data() {
        $("#actual_submit").hide();
        $("#loader_submit").show();
        var ops_url = baseurl + 'user-management/save-client';
        var name = $('#name').val();
        var password = $('#password').val();
        var email = $('#email').val();
        var phone = $('#phone').val();
        var confirm_password = $('#con_password').val();
        var manager = $('#manager').val();
        var dob = $('#dob').val();
        var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

        if (name == "") {
            Swal.fire({
                icon: 'info',
                title: '',
                text: 'Name is required.'
            });
            $("#actual_submit").show();
            $("#loader_submit").hide();
            return false;
        }
        if (!emailRegex.test(email)) {
            Swal.fire({
                title: 'Account creation failed',
                text: 'Email is not valid',
                icon: 'error'
            });
            $("#actual_submit").show();
            $("#loader_submit").hide();
            return false;
        }
        if (email == "") {
            Swal.fire({
                icon: 'info',
                title: '',
                text: 'Email is required.'
            });
            $("#actual_submit").show();
            $("#loader_submit").hide();
            return false;
        }
        if (dob == "") {
            Swal.fire({
                icon: 'info',
                title: '',
                text: 'Date of birth is required.'
            });
            $("#actual_submit").show();
            $("#loader_submit").hide();
            return false;
        }
        if (phone == "") {
            Swal.fire({
                icon: 'info',
                title: '',
                text: 'Phone is required.'
            });
            $("#actual_submit").show();
            $("#loader_submit").hide();
            return false;
        }

        if (password == '') {
            Swal.fire({
                icon: 'info',
                title: '',
                text: 'Password is required.'
            });
            $("#actual_submit").show();
            $("#loader_submit").hide();
            return false;
        }
        if (password.length < 3) {
            Swal.fire({
                icon: 'info',
                title: '',
                text: 'Enter at least three characters for Password.'
            });
            $("#actual_submit").show();
            $("#loader_submit").hide();
            return false;
        }
        if (confirm_password == '') {
            Swal.fire({
                icon: 'info',
                title: '',
                text: 'Confirm Password is required.'
            });
            $("#actual_submit").show();
            $("#loader_submit").hide();
            return false;
        }
        if (password != confirm_password) {
            Swal.fire({
                icon: 'info',
                title: '',
                text: 'Password and Confirm Password must be the same.'
            });
            $("#actual_submit").show();
            $("#loader_submit").hide();
            return false;
        }
        if (manager == '') {
            Swal.fire({
                icon: 'info',
                title: '',
                text: 'Manager is required.'
            });
            $("#actual_submit").show();
            $("#loader_submit").hide();
            return false;
        }


        var form = $("#client_save");
        var formData = new FormData(form[0]);

        $.ajax({
            type: "POST",
            cache: false,
            async: true,
            url: ops_url,
            processData: false,
            contentType: false,
            data: formData,
            success: function(result) {
                var data = $.parseJSON(result);
                if (data.status == 1) {
                    $("#actual_submit").show();
                    $("#loader_submit").hide();
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Client created.'
                    });
                    $('#client_save').trigger("reset");
                } else if (data.status == 0) {
                    $("#actual_submit").show();
                    $("#loader_submit").hide();
                    Swal.fire({
                        icon: 'info',
                        title: 'Info',
                        text: 'Client already exists.'
                    });
                } else {
                    $('#faculty_loader').removeClass('sk-loading');
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