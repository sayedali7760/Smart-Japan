<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

    <div class="post d-flex flex-column-fluid" id="kt_post">

        <div id="kt_content_container" class="container-xxl">

            <?php
            echo form_open_multipart('transaction/add_withdraw', array('id' => 'withdraw_save', 'role' => 'form', 'class' => 'form d-flex flex-column flex-lg-row'));
            ?>


            <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                <div class="card card-flush py-2">
                    <div class="card-body text-center pt-3">
                        <div class="image-input mb-3" data-kt-image-input="true">
                            <div class="image-input-wrapper w-150px h-150px d-flex align-items-center justify-content-center">
                                <span class="svg-icon svg-icon-primary svg-icon-5hx">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M20 19.725V18.725C20 18.125 19.6 17.725 19 17.725H5C4.4 17.725 4 18.125 4 18.725V19.725H3C2.4 19.725 2 20.125 2 20.725V21.725H22V20.725C22 20.125 21.6 19.725 21 19.725H20Z" fill="currentColor" />
                                        <path opacity="0.3" d="M22 6.725V7.725C22 8.325 21.6 8.725 21 8.725H18C18.6 8.725 19 9.125 19 9.725C19 10.325 18.6 10.725 18 10.725V15.725C18.6 15.725 19 16.125 19 16.725V17.725H15V16.725C15 16.125 15.4 15.725 16 15.725V10.725C15.4 10.725 15 10.325 15 9.725C15 9.125 15.4 8.725 16 8.725H13C13.6 8.725 14 9.125 14 9.725C14 10.325 13.6 10.725 13 10.725V15.725C13.6 15.725 14 16.125 14 16.725V17.725H10V16.725C10 16.125 10.4 15.725 11 15.725V10.725C10.4 10.725 10 10.325 10 9.725C10 9.125 10.4 8.725 11 8.725H8C8.6 8.725 9 9.125 9 9.725C9 10.325 8.6 10.725 8 10.725V15.725C8.6 15.725 9 16.125 9 16.725V17.725H5V16.725C5 16.125 5.4 15.725 6 15.725V10.725C5.4 10.725 5 10.325 5 9.725C5 9.125 5.4 8.725 6 8.725H3C2.4 8.725 2 8.325 2 7.725V6.725L11 2.225C11.6 1.925 12.4 1.925 13.1 2.225L22 6.725ZM12 3.725C11.2 3.725 10.5 4.425 10.5 5.225C10.5 6.025 11.2 6.725 12 6.725C12.8 6.725 13.5 6.025 13.5 5.225C13.5 4.425 12.8 3.725 12 3.725Z" fill="currentColor" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <div class="text-danger fs-7">The minimum withdraw amount is <span style="font-size:20px;">$100</span>.</div>
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
                                        <h2>Withdraw from MT5</h2>
                                    </div>
                                </div>

                                <div class="card-body pt-0">
                                    <div class="d-flex flex-wrap gap-5">

                                        <div class="fv-row w-100 flex-md-root">
                                            <label class="required form-label">Account</label>
                                            <select class="form-select mb-5" data-control="select2"
                                                data-placeholder="Select an option"
                                                name="account" id="account" onchange="get_account_details()">
                                                <option value=""></option>
                                                <?php
                                                if (isset($account_details) && !empty($account_details)) {
                                                    foreach ($account_details as $account) {
                                                        echo '<option value ="' . $account->login . '">' . $account->login . '</option>';
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="fv-row w-100 flex-md-root">
                                            <label class="required form-label">Withdraw Method</label>
                                            <select class="form-select mb-5" data-control="select2"
                                                data-placeholder="Select an option"
                                                name="method" id="method">
                                                <option value=""></option>
                                                <option value="1">NexusPay</option>
                                                <option value="2">SticPay</option>
                                                <option value="3">Bank Transfer</option>
                                            </select>
                                        </div>
                                        <div class="fv-row w-100 flex-md-root">
                                            <label class="required form-label">Currency</label>
                                            <select class="form-select mb-5" data-control="select2"
                                                data-placeholder="Select an option"
                                                name="currency" id="currency">
                                                <option value="1">USD</option>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="d-flex flex-wrap gap-5">




                                        <div class="fv-row w-100 flex-md-root">
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">

                                        <a href="<?php echo base_url(); ?>home" id="kt_ecommerce_add_product_cancel"
                                            class="btn btn-light me-5">Cancel</a>

                                        <a href="javascript:void(0);" class="btn btn-primary" title="Save Changes"
                                            onclick="submit_data()">Withdraw</a>

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
    function get_account_details() {
        var ops_url = baseurl + 'transaction/get-mtaccount-details';
        var account = $('#account').val();
        var form = $("#withdraw_save");
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
                        text: 'Deposit Completed.',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
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

    function submit_data() {
        $("#loader").show();
        var ops_url = baseurl + 'transaction/withdraw-save';
        var account = $('#account').val();
        var currency = $('#currency').val();
        var method = $('#method').val();

        if (account == "") {
            Swal.fire({
                icon: 'info',
                title: '',
                text: 'Account is required.'
            });
            $("#loader").hide();
            return false;
        }
        if (method == "") {
            Swal.fire({
                icon: 'info',
                title: '',
                text: 'Method is required.'
            });
            $("#loader").hide();
            return false;
        }
        if (currency == "") {
            Swal.fire({
                icon: 'info',
                title: '',
                text: 'Currency is required.'
            });
            $("#loader").hide();
            return false;
        }
        var form = $("#deposit_save");
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
                        text: 'Deposit Completed.',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
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

<script>
    document.getElementById('discount').addEventListener('input', function(e) {
        var value = parseInt(e.target.value);
        if (value > 200) {
            e.target.value = 200;
        }
    });
</script>