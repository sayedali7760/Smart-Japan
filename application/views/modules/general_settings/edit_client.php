<div id="kt_content_container" class="container-xxl">

    <?php
    echo form_open_multipart('settings/edit_client', array('id' => 'client_save', 'role' => 'form','class' => 'form d-flex flex-column flex-lg-row'));
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
                    style="background-image: url(<?php echo base_url();?>uploads/<?php echo $client_data['file'];?>)">
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
                                    <label class="required form-label">First Name</label>
                                    <input type="hidden" id="user_id" name="user_id" value="<?php echo $client_id; ?>">
                                    <input type="text" class="form-control mb-5" id="fname" name="fname"
                                        placeholder="First Name" maxlength="50"
                                        value="<?php echo $client_data['fname']; ?>">
                                </div>

                                <div class="fv-row w-100 flex-md-root">
                                    <label class="required form-label">Last Name</label>
                                    <input type="text" class="form-control mb-5" id="lname" name="lname"
                                        placeholder="Last Name" maxlength="50"
                                        value="<?php echo $client_data['lname']; ?>">
                                </div>
                                <div class="fv-row w-100 flex-md-root">
                                    <label class="required form-label">Email</label>
                                    <input type="text" class="form-control mb-5" id="email" name="email"
                                        placeholder="Email" maxlength="50" value="<?php echo $client_data['email']; ?>">
                                </div>

                            </div>
                            <div class="d-flex flex-wrap gap-5">

                                
                                <div class="fv-row w-100 flex-md-root">
                                    <label class="required form-label">Username</label>
                                    <input type="text" class="form-control mb-5" id="username" name="username"
                                        placeholder="Username" maxlength="50"
                                        value="<?php echo $client_data['username']; ?>"
                                        >
                                </div>
                                <div class="fv-row w-100 flex-md-root">
                                    <label class="required form-label">Password</label>
                                    <input type="text" id="password" maxlength="15" name="password"
                                        class="mb-5 form-control make-star" id="" placeholder="Password">
                                </div>
                                <div class="fv-row w-100 flex-md-root">
                                    <label class="required form-label">Discount</label>
                                    <input type="text" id="discount" name="discount"
                                        class="form-control numeric mb-5" placeholder="Discount" maxlength="2">
                                </div>

                            </div>
                            

                        </div>

                    </div>

                </div>
            </div>

        </div>

        <div class="d-flex justify-content-end">

            <a href="<?php echo base_url();?>user-management/client-show" id="kt_ecommerce_add_product_cancel"
                class="btn btn-light me-5">Cancel</a>

            <a href="javascript:void(0);" class="btn btn-primary" title="Save Changes" onclick="update_data()">Save
                Changes</a>

        </div>
    </div>
    <?php echo form_close(); ?>
</div>
<script>
$(document).ready(function() {
    $('#position').select2({
        placeholder: 'Select an option',
        allowClear: true
    });
});
KTImageInput.init();
</script>
<script>
function show_div() {

}

function update_data() {
    $("#loader").show();
    var ops_url = baseurl + 'user-management/update-client';
    var user_id = $('#user_id').val();
    var fname = $('#fname').val();
    var lname = $('#lname').val();
    var username = $('#username').val();
    var password = $('#password').val();
    var email = $('#email').val();
    var discount = $('#discount').val();

    if (fname == "") {
        Swal.fire({
            icon: 'info',
            title: '',
            text: 'Firstname is required.'
        });
        return false;
    }
    if (fname.length < 3) {
        Swal.fire({
            icon: 'info',
            title: '',
            text: 'Enter at least three characters for Name.'
        });
        return false;
    }
    if (lname == "") {
        Swal.fire({
            icon: 'info',
            title: '',
            text: 'Lastname is required.'
        });
        return false;
    }
    if (email == "") {
        Swal.fire({
            icon: 'info',
            title: '',
            text: 'Email is required.'
        });
        return false;
    }
    if (username == "") {
        Swal.fire({
            icon: 'info',
            title: '',
            text: 'Username is required.'
        });
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
            $("#loader").hide();
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
                    text: 'Username already exists.'
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

<script>
    document.getElementById('discount').addEventListener('input', function (e) {
        var value = parseInt(e.target.value);
        if (value > 200) {
            e.target.value = 200;
        }
    });
</script>