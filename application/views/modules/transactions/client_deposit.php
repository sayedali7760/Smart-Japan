<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

    <div class="post d-flex flex-column-fluid" id="kt_post">

        <div id="kt_content_container" class="container-xxl">

            <?php
            echo form_open_multipart('transaction/add_deposit', array('id' => 'deposit_save', 'role' => 'form', 'class' => 'form d-flex flex-column flex-lg-row'));
            ?>



            <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                <div class="card card-flush py-2">
                    <div class="card-body text-center pt-3">
                        <div class="image-input mb-3" data-kt-image-input="true">
                            <div class="image-input-wrapper w-150px h-150px d-flex align-items-center justify-content-center">
                                <span class="svg-icon svg-icon-primary svg-icon-5hx">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3" d="M3.20001 5.91897L16.9 3.01895C17.4 2.91895 18 3.219 18.1 3.819L19.2 9.01895L3.20001 5.91897Z" fill="currentColor" />
                                        <path opacity="0.3" d="M13 13.9189C13 12.2189 14.3 10.9189 16 10.9189H21C21.6 10.9189 22 11.3189 22 11.9189V15.9189C22 16.5189 21.6 16.9189 21 16.9189H16C14.3 16.9189 13 15.6189 13 13.9189ZM16 12.4189C15.2 12.4189 14.5 13.1189 14.5 13.9189C14.5 14.7189 15.2 15.4189 16 15.4189C16.8 15.4189 17.5 14.7189 17.5 13.9189C17.5 13.1189 16.8 12.4189 16 12.4189Z" fill="currentColor" />
                                        <path d="M13 13.9189C13 12.2189 14.3 10.9189 16 10.9189H21V7.91895C21 6.81895 20.1 5.91895 19 5.91895H3C2.4 5.91895 2 6.31895 2 6.91895V20.9189C2 21.5189 2.4 21.9189 3 21.9189H19C20.1 21.9189 21 21.0189 21 19.9189V16.9189H16C14.3 16.9189 13 15.6189 13 13.9189Z" fill="currentColor" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <div class="text-danger fs-7">The minimum deposit amount is <span style="font-size:20px;">$50</span>.</div>
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
                                        <h2>Deposit to MT5</h2>
                                    </div>
                                </div>

                                <div class="card-body pt-0">
                                    <div class="d-flex flex-wrap gap-5">

                                        <div class="fv-row w-100 flex-md-root">
                                            <label class="required form-label">Account</label>
                                            <select class="form-select mb-5" data-control="select2"
                                                data-placeholder="Select an option"
                                                name="account" id="account">
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
                                            <label class="required form-label">Deposit Method</label>
                                            <select class="form-select mb-5" data-control="select2"
                                                data-placeholder="Select an option"
                                                name="method" id="method">
                                                <option value=""></option>
                                                <option value="1">NexusPay</option>
                                                <option value="2">SticPay</option>
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
                                            onclick="submit_data()">Deposit</a>

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
    function submit_data() {
        $("#loader").show();
        var ops_url = baseurl + 'transaction/deposit-save';
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