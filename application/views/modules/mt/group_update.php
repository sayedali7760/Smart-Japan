<div id="kt_content_container" class="container-xxl">


    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">

        <div class="tab-content">

            <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
                <div class="d-flex flex-column gap-7 gap-lg-10">

                    <div class="card card-flush py-4">

                        <div class="card-header">
                            <div class="card-title">
                                <h2>Edit MT Group</h2>
                            </div>
                        </div>

                        <div class="card-body pt-0">
                            <div class="d-flex flex-wrap gap-5">


                                <div class="fv-row w-100 flex-md-root">
                                    <label class="required form-label">Login</label>
                                    <input type="text" class="form-control mb-5" id="login" name="login" value="<?php echo $login ?>" disabled>
                                </div>

                                <div class="fv-row w-100 flex-md-root">
                                    <label class="required form-label">Group Name</label>
                                    <select class="form-select mb-5" data-control="select2"
                                        name="group" id="group">
                                        <option value="" selected disabled><?php echo $group ?></option>
                                        <?php
                                        if (isset($group_data) && !empty($group_data)) {
                                            foreach ($group_data as $account) {
                                                echo '<option value ="' . $account->group . '">' . $account->group . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="fv-row w-100 flex-md-root">
                                    <label class="required form-label">User ID</label>
                                    <input type="text" class="form-control mb-5" id="user_id" name="user_id" value="<?php echo $user_id; ?>" disabled>
                                </div>

                            </div>

                            <div class="d-flex justify-content-end">

                                <a href="<?php echo base_url(); ?>mt-account/live-account" id="kt_ecommerce_add_product_cancel"
                                    class="btn btn-light me-5">Cancel</a>

                                <a href="javascript:void(0);" class="btn btn-primary" title="Save Changes" onclick="update_data()">Save
                                    Changes</a>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

<script>
    $(document).ready(function() {
        KTUtil.onDOMContentLoaded(function() {
            KTAppEcommerceSalesSaveOrder.init();
        });
    });
    $('#group').select2({
        value: '<?php echo $group ?>',
    });
    KTImageInput.init();
</script>
<script>
    function update_data() {
        $("#loader").show();
        var ops_url = baseurl + 'mt/group_change';
        var group_name = $('#group').val();
        var client_id = $('#user_id').val();
        var login = $('#login').val();

        if (group_name == "") {
            Swal.fire({
                icon: 'info',
                title: '',
                text: 'Group Name is required.'
            });
            $("#loader").hide();
            return false;
        }


        $.ajax({
            type: "POST",
            url: ops_url,
            data: {
                group_name: group_name,
                client_id: client_id,
                login: login,
            },
            success: function(result) {
                $("#loader").hide();
                var data = $.parseJSON(result);
                if (data.status == 1) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Group updated.'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
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