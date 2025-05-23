<div id="kt_content_container" class="container-xxl">

    <?php
    echo form_open_multipart('settings/edit_client', array('id' => 'client_save', 'role' => 'form', 'class' => 'form d-flex flex-column flex-lg-row'));
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
                    style="background-image: url(<?php echo base_url(); ?>uploads/<?php echo $client_data['file']; ?>)">
                    <div class="image-input-wrapper w-150px h-150px"></div>
                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                        data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar"
                        onclick="show_div()">
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
                                <h2>Edit Client</h2>
                            </div>
                        </div>

                        <div class="card-body pt-0">
                            <div class="d-flex flex-wrap gap-5">


                                <div class="fv-row w-100 flex-md-root">
                                    <label class="required form-label">Name</label>
                                    <input type="hidden" id="client_id" name="client_id" value="<?php echo $client_id; ?>">
                                    <input type="text" class="form-control mb-5" id="name" name="name"
                                        placeholder="Full Name" maxlength="50"
                                        value="<?php echo $client_data['name']; ?>">
                                </div>

                                <div class="fv-row w-100 flex-md-root">
                                    <label class="required form-label">Email</label>
                                    <input type="text" class="form-control mb-5" id="email" name="email"
                                        placeholder="Email" maxlength="50" value="<?php echo $client_data['email']; ?>">
                                </div>

                                <div class="fv-row w-100 flex-md-root">
                                    <label class="required form-label">Date of Birth</label>

                                    <input type="text" id="dob" name="dob"
                                        class="mb-5 form-control make-star" placeholder="Select your DOB" value="<?= ($client_data['dob']) ? $client_data['dob'] : '' ?>" autocomplete="off">
                                </div>
                                <!-- <div class="fv-row w-100 flex-md-root"></div> -->
                                <!-- <div class="fv-row w-100 flex-md-root"></div> -->



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
                                        class="form-control make-star mb-5"
                                        placeholder="Confirm Password">
                                </div>

                                <div class="fv-row w-100 flex-md-root">
                                    <label class="form-label">Phone No</label>
                                    <input type="text" id="phone" name="phone"
                                        class="form-control numeric mb-5"
                                        placeholder="Phone No" maxlength="12" value="<?php echo $client_data['phone']; ?>">
                                </div>


                            </div>
                            <div class="d-flex flex-wrap gap-5">
                                <div class="fv-row w-100 flex-md-root">
                                    <label class="form-label">Country</label>
                                    <select class="form-select" data-placeholder="Select an option" id="kt_ecommerce_edit_order_billing_country" name="country">
                                        <?php foreach ($countries as $country) { ?>
                                            <?php if ($client_data['country'] == $country->country_code) { ?>
                                                <option selected value="<?php echo $country->country_code; ?>" data-kt-select2-country="<?php echo base_url(); ?><?php echo $country->flag_image_url; ?>"><?php echo $country->country_name; ?></option>
                                            <?php } else { ?>
                                                <option value="<?php echo $country->country_code; ?>" data-kt-select2-country="<?php echo base_url(); ?><?php echo $country->flag_image_url; ?>"><?php echo $country->country_name; ?></option>
                                        <?php }
                                        } ?>
                                    </select>
                                </div>
                                <div class="fv-row w-100 flex-md-root">
                                    <label class="form-label">Manager</label>
                                    <select class="form-select" data-placeholder="Select an option" id="manager" name="manager">
                                        <?php foreach ($staff_details as $staff) { ?>
                                            <option value="<?php echo $staff->id; ?>"><?php echo $staff->fname; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="fv-row w-100 flex-md-root">

                                </div>
                                <!-- <div class="fv-row w-100 flex-md-root">

                                </div> -->


                            </div>
                            <div class="d-flex justify-content-end">

                                <a href="<?php echo base_url(); ?>user-management/client-show" id="kt_ecommerce_add_product_cancel"
                                    class="btn btn-light me-5">Cancel</a>

                                <a id="actual_submit" href="javascript:void(0);" class="btn btn-primary submit_butt" title="Save Changes"
                                    onclick="update_data()">Save Changes</a>
                                <a id="loader_submit" style="display:none;" href="javascript:void(0);" class="btn btn-primary" data-kt-indicator="on">
                                    <span class="indicator-label">Submit</span>
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </a>

                            </div>
                            <?php if ($document_upload_status == 1) { ?>
                                <div id="kt_billing_payment_tab_content" class="card-body tab-content">
                                    <div id="kt_billing_creditcard" class="tab-pane fade show active" role="tabpanel">
                                        <h3 class="mb-5">Uploaded Documents</h3>
                                        <div class="row gx-9 gy-6">

                                            <div class="col-xl-6">
                                                <div class="card card-dashed h-xl-100 flex-row flex-stack flex-wrap p-6">
                                                    <div class="d-flex flex-column py-2">
                                                        <div class="d-flex align-items-center fs-4 fw-bolder mb-5">Identity Front
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center py-2">
                                                        <?php if ($id_front == 0) { ?>
                                                            <div class="alert alert-warning d-flex align-items-center p-5 mb-4">
                                                                <div class="d-flex flex-column">
                                                                    <h4 class="mb-1 text-warning">Not Uploaded</h4>
                                                                </div>
                                                            </div>
                                                        <?php } else if ($id_front_status == 'new') { ?>
                                                            <a href="<?php echo base_url() ?>uploads/<?php echo $id_front; ?>" target="_blank" class="btn btn-sm btn-primary btn-active-light-primary me-3" title="View"><i class="fa fa-download" aria-hidden="true"></i></a>
                                                            <a href="javascript:void(0);" onclick="update_doc_status(<?php echo $id_id_front; ?>,5)" class="btn btn-sm btn-success btn-active-light-primary me-3" title="Approve"><i class="fa fa-check" aria-hidden="true"></i></a>
                                                            <a href="javascript:void(0);" onclick="update_doc_status(<?php echo $id_id_front; ?>,3)" class="btn btn-sm btn-danger btn-active-light-primary" title="Reject"><i class="fa fa-times" aria-hidden="true"></i></a>
                                                        <?php } else if ($id_front_status == 'rejected') { ?>
                                                            <a href="<?php echo base_url() ?>uploads/<?php echo $id_front; ?>" target="_blank" class="btn btn-sm btn-primary btn-active-light-primary me-3" title="View"><i class="fa fa-download" aria-hidden="true"></i></a>
                                                            <div class="alert alert-danger d-flex align-items-center p-5 mb-4">
                                                                <div class="d-flex flex-column">
                                                                    <h4 class="mb-1 text-danger">Rejected</h4>
                                                                </div>
                                                            </div>
                                                        <?php } else if ($id_front_status == 'approved') { ?>
                                                            <a href="<?php echo base_url() ?>uploads/<?php echo $id_front; ?>" target="_blank" class="btn btn-sm btn-primary btn-active-light-primary me-3" title="View"><i class="fa fa-download" aria-hidden="true"></i></a>
                                                            <div class="alert alert-success d-flex align-items-center p-5 mb-4">
                                                                <div class="d-flex flex-column">
                                                                    <h4 class="mb-1 text-success">Verified</h4>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="card card-dashed h-xl-100 flex-row flex-stack flex-wrap p-6">
                                                    <div class="d-flex flex-column py-2">
                                                        <div class="d-flex align-items-center fs-4 fw-bolder mb-5">Identity Bank
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center py-2">
                                                        <?php if ($id_back == 0) { ?>
                                                            <div class="alert alert-warning d-flex align-items-center p-5 mb-4">
                                                                <div class="d-flex flex-column">
                                                                    <h4 class="mb-1 text-warning">Not Uploaded</h4>
                                                                </div>
                                                            </div>
                                                        <?php } else if ($id_back_status == 'new') { ?>
                                                            <a href="<?php echo base_url() ?>uploads/<?php echo $id_front; ?>" target="_blank" class="btn btn-sm btn-primary btn-active-light-primary me-3" title="View"><i class="fa fa-download" aria-hidden="true"></i></a>
                                                            <a href="javascript:void(0);" onclick="update_doc_status(<?php echo $id_id_back; ?>,5)" class="btn btn-sm btn-success btn-active-light-primary me-3" title="Approve"><i class="fa fa-check" aria-hidden="true"></i></a>
                                                            <a href="javascript:void(0);" onclick="update_doc_status(<?php echo $id_id_back; ?>,3)" class="btn btn-sm btn-danger btn-active-light-primary" title="Reject"><i class="fa fa-times" aria-hidden="true"></i></a>
                                                        <?php } else if ($id_back_status == 'rejected') { ?>
                                                            <a href="<?php echo base_url() ?>uploads/<?php echo $id_front; ?>" target="_blank" class="btn btn-sm btn-primary btn-active-light-primary me-3" title="View"><i class="fa fa-download" aria-hidden="true"></i></a>
                                                            <div class="alert alert-danger d-flex align-items-center p-5 mb-4">
                                                                <div class="d-flex flex-column">
                                                                    <h4 class="mb-1 text-danger">Rejected</h4>
                                                                </div>
                                                            </div>
                                                        <?php } else if ($id_back_status = 'approved') { ?>
                                                            <a href="<?php echo base_url() ?>uploads/<?php echo $id_front; ?>" target="_blank" class="btn btn-sm btn-primary btn-active-light-primary me-3" title="View"><i class="fa fa-download" aria-hidden="true"></i></a>
                                                            <div class="alert alert-success d-flex align-items-center p-5 mb-4">
                                                                <div class="d-flex flex-column">
                                                                    <h4 class="mb-1 text-success">Verified</h4>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="card card-dashed h-xl-100 flex-row flex-stack flex-wrap p-6">
                                                    <div class="d-flex flex-column py-2">
                                                        <div class="d-flex align-items-center fs-4 fw-bolder mb-5">Sample Bill
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center py-2">
                                                        <?php if ($sample_bill == 0) { ?>
                                                            <div class="alert alert-warning d-flex align-items-center p-5 mb-4">
                                                                <div class="d-flex flex-column">
                                                                    <h4 class="mb-1 text-warning">Not Uploaded</h4>
                                                                </div>
                                                            </div>
                                                        <?php } else if ($sample_bill_status == 'new') { ?>
                                                            <a href="<?php echo base_url() ?>uploads/<?php echo $sample_bill; ?>" target="_blank" class="btn btn-sm btn-primary btn-active-light-primary me-3" title="View"><i class="fa fa-download" aria-hidden="true"></i></a>
                                                            <a href="javascript:void(0);" onclick="update_doc_status(<?php echo $id_bill; ?>,5)" class="btn btn-sm btn-success btn-active-light-primary me-3" title="Approve"><i class="fa fa-check" aria-hidden="true"></i></a>
                                                            <a href="javascript:void(0);" onclick="update_doc_status(<?php echo $id_bill; ?>,3)" class="btn btn-sm btn-danger btn-active-light-primary" title="Reject"><i class="fa fa-times" aria-hidden="true"></i></a>
                                                        <?php } else if ($sample_bill_status == 'rejected') { ?>
                                                            <a href="<?php echo base_url() ?>uploads/<?php echo $sample_bill; ?>" target="_blank" class="btn btn-sm btn-primary btn-active-light-primary me-3" title="View"><i class="fa fa-download" aria-hidden="true"></i></a>
                                                            <div class="alert alert-danger d-flex align-items-center p-5 mb-4">
                                                                <div class="d-flex flex-column">
                                                                    <h4 class="mb-1 text-danger">Rejected</h4>
                                                                </div>
                                                            </div>
                                                        <?php } else if ($sample_bill_status == 'approved') { ?>
                                                            <a href="<?php echo base_url() ?>uploads/<?php echo $sample_bill; ?>" target="_blank" class="btn btn-sm btn-primary btn-active-light-primary me-3" title="View"><i class="fa fa-download" aria-hidden="true"></i></a>
                                                            <div class="alert alert-success d-flex align-items-center p-5 mb-4">
                                                                <div class="d-flex flex-column">
                                                                    <h4 class="mb-1 text-success">Verified</h4>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="card card-dashed h-xl-100 flex-row flex-stack flex-wrap p-6">
                                                    <div class="d-flex flex-column py-2">
                                                        <div class="d-flex align-items-center fs-4 fw-bolder mb-5">Other
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center py-2">
                                                        <?php if ($other_doc == 0) { ?>
                                                            <div class="alert alert-warning d-flex align-items-center p-5 mb-4">
                                                                <div class="d-flex flex-column">
                                                                    <h4 class="mb-1 text-warning">Not Uploaded</h4>
                                                                </div>
                                                            </div>
                                                        <?php } else if ($other_doc_status == 'new') { ?>
                                                            <a href="<?php echo base_url() ?>uploads/<?php echo $other_doc; ?>" target="_blank" class="btn btn-sm btn-primary btn-active-light-primary me-3" title="View"><i class="fa fa-download" aria-hidden="true"></i></a>
                                                            <a href="javascript:void(0);" onclick="update_doc_status(<?php echo $id_other; ?>,5)" class="btn btn-sm btn-success btn-active-light-primary me-3" title="Approve"><i class="fa fa-check" aria-hidden="true"></i></a>
                                                            <a href="javascript:void(0);" onclick="update_doc_status(<?php echo $id_other; ?>,3)" class="btn btn-sm btn-danger btn-active-light-primary" title="Reject"><i class="fa fa-times" aria-hidden="true"></i></a>
                                                        <?php } else if ($other_doc_status == 'rejected') { ?>
                                                            <a href="<?php echo base_url() ?>uploads/<?php echo $other_doc; ?>" target="_blank" class="btn btn-sm btn-primary btn-active-light-primary me-3" title="View"><i class="fa fa-download" aria-hidden="true"></i></a>
                                                            <div class="alert alert-danger d-flex align-items-center p-5 mb-4">
                                                                <div class="d-flex flex-column">
                                                                    <h4 class="mb-1 text-danger">Rejected</h4>
                                                                </div>
                                                            </div>
                                                        <?php } else if ($other_doc_status == 'approved') { ?>
                                                            <a href="<?php echo base_url() ?>uploads/<?php echo $other_doc; ?>" target="_blank" class="btn btn-sm btn-primary btn-active-light-primary me-3" title="View"><i class="fa fa-download" aria-hidden="true"></i></a>
                                                            <div class="alert alert-success d-flex align-items-center p-5 mb-4">
                                                                <div class="d-flex flex-column">
                                                                    <h4 class="mb-1 text-success">Verified</h4>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>

                <?php } else { ?>
                    <div id="kt_billing_payment_tab_content" class="card-body tab-content">
                        <div id="kt_billing_creditcard" class="tab-pane fade show active" role="tabpanel">
                            <h3 class="mb-5">Uploaded Documents</h3>
                            <div class="row gx-9 gy-6">

                                <div class="col-xl-6">
                                    <div class="card card-dashed h-xl-100 flex-row flex-stack flex-wrap p-6">
                                        <div class="d-flex flex-column py-2">
                                            <div class="d-flex align-items-center fs-4 fw-bolder mb-5">Identity Front
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center py-2">
                                            <div class="alert alert-warning d-flex align-items-center p-5 mb-4">
                                                <div class="d-flex flex-column">
                                                    <h4 class="mb-1 text-warning">Not Uploaded</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="card card-dashed h-xl-100 flex-row flex-stack flex-wrap p-6">
                                        <div class="d-flex flex-column py-2">
                                            <div class="d-flex align-items-center fs-4 fw-bolder mb-5">Identity Back
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center py-2">
                                            <div class="alert alert-warning d-flex align-items-center p-5 mb-4">
                                                <div class="d-flex flex-column">
                                                    <h4 class="mb-1 text-warning">Not Uploaded</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="card card-dashed h-xl-100 flex-row flex-stack flex-wrap p-6">
                                        <div class="d-flex flex-column py-2">
                                            <div class="d-flex align-items-center fs-4 fw-bolder mb-5">Sample Bill
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center py-2">
                                            <div class="alert alert-warning d-flex align-items-center p-5 mb-4">
                                                <div class="d-flex flex-column">
                                                    <h4 class="mb-1 text-warning">Not Uploaded</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="card card-dashed h-xl-100 flex-row flex-stack flex-wrap p-6">
                                        <div class="d-flex flex-column py-2">
                                            <div class="d-flex align-items-center fs-4 fw-bolder mb-5">Other
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center py-2">
                                            <div class="alert alert-warning d-flex align-items-center p-5 mb-4">
                                                <div class="d-flex flex-column">
                                                    <h4 class="mb-1 text-warning">Not Uploaded</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if ($client_status == 90) { ?>
                    <div class="d-flex justify-content-end">
                        <button type="button" id="actual_submit" onclick="deactivate_account()" class="btn btn-lg btn-danger mb-5 me-2 actual_submit" title="Submit">
                            Deactivate Account
                        </button>
                        <button type="button" id="loader_submit" class="btn btn-lg btn-primary mb-5 loader_submit" data-kt-indicator="on" style="display: none;">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                    </div>
                <?php } else { ?>
                    <div class="d-flex justify-content-end">
                        <button type="button" id="actual_submit" onclick="activate_account()" class="btn btn-lg btn-primary mb-5 me-2 actual_submit" title="Submit">
                            Activate Account
                        </button>
                        <button type="button" id="loader_submit" class="btn btn-lg btn-primary mb-5 loader_submit" data-kt-indicator="on" style="display: none;">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                    </div>
                <?php } ?>

                </div>
            </div>

        </div>
    </div>
</div>
</div>
<?php echo form_close(); ?>
</div>
<script>
    $(document).ready(function() {
        KTUtil.onDOMContentLoaded(function() {
            KTAppEcommerceSalesSaveOrder.init();
        });
    });
    $('#manager').select2({
        placeholder: 'Select an option',
    });
    KTImageInput.init();
</script>
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
    function update_doc_status(doc_id, status) {
        var client_id = $('#client_id').val();
        var ops_url = baseurl + 'client-crm/update-doc-status';
        $.ajax({
            type: "POST",
            cache: false,
            async: true,
            url: ops_url,
            data: {
                doc_id: doc_id,
                status: status,
                client_id: client_id
            },
            success: function(result) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Status updated.'
                }).then(() => {
                    edit_client(client_id);
                });
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

    function activate_account() {
        $(".actual_submit").hide();
        $(".loader_submit").show();
        var ops_url = baseurl + 'client-crm/activate-client';
        var client_id = $('#client_id').val();
        var email = $('#email').val();
        Swal.fire({
            title: "Are you sure?",
            text: "Do you want to activate?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, activate it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    cache: false,
                    async: true,
                    url: ops_url,
                    data: {
                        client_id: client_id,
                        email: email,
                    },
                    success: function(result) {
                        $(".actual_submit").show();
                        $(".loader_submit").hide();
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Status updated.'
                        }).then(() => {
                            edit_client(client_id);
                        });
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
        });
    }

    function deactivate_account() {
        $(".actual_submit").hide();
        $(".loader_submit").show();
        var ops_url = baseurl + 'client-crm/deactivate-client';
        var client_id = $('#client_id').val();
        var email = $('#email').val();
        Swal.fire({
            title: "Are you sure?",
            text: "Do you want to deactivate?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    cache: false,
                    async: true,
                    url: ops_url,
                    data: {
                        client_id: client_id,
                        email: email,
                    },
                    success: function(result) {
                        $(".actual_submit").show();
                        $(".loader_submit").hide();
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Status updated.'
                        }).then(() => {
                            edit_client(client_id);
                        });
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
        });
    }

    function update_data() {
        $("#actual_submit").hide();
        $("#loader_submit").show();
        var ops_url = baseurl + 'user-management/update-client';
        var user_id = $('#user_id').val();
        var name = $('#name').val();
        var password = $('#password').val();
        var con_password = $('#con_password').val();
        var email = $('#email').val();
        var phone = $('#phone').val();
        var dob = $('#dob').val();
        var manager = $('#manager').val();
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
        if (dob == "") {
            Swal.fire({
                icon: 'info',
                title: '',
                text: 'DOB is required.'
            });
            $("#actual_submit").show();
            $("#loader_submit").hide();
            return false;
        }
        if (name.length < 3) {
            Swal.fire({
                icon: 'info',
                title: '',
                text: 'Enter at least three characters for Name.'
            });
            $("#actual_submit").show();
            $("#loader_submit").hide();
            return false;
        }

        if (!emailRegex.test(email)) {
            Swal.fire({
                title: 'Account updation failed',
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

        if (password != '') {
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
            if (con_password == '') {
                Swal.fire({
                    icon: 'info',
                    title: '',
                    text: 'Confirm Password is required.'
                });
                $("#actual_submit").show();
                $("#loader_submit").hide();
                return false;
            }
            if (password != con_password) {
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
                $("#actual_submit").show();
                $("#loader_submit").hide();
                var data = $.parseJSON(result);
                if (data.status == 1) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Client updated.'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
                } else if (data.status == 0) {
                    Swal.fire({
                        icon: 'info',
                        title: 'Info',
                        text: 'Email already exists.'
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

    function edit_client(id) {
        var ops_url = baseurl + 'user-management/edit-client';
        $.ajax({
            type: "POST",
            cache: false,
            async: false,
            url: ops_url,
            data: {
                "load": 1,
                "client_id": id,
            },
            success: function(result) {
                console.log(result);
                var data = $.parseJSON(result);
                $("#kt_post").html(data.view);
                $('#kt_post').addClass('in-down');
                $("html, body").animate({
                    scrollTop: 0
                }, "slow");
            }
        });
    }
</script>