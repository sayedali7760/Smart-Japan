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
                                                name="method" id="method" onchange="check_type()">
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
                                            <label class="required form-label">Withdraw Amount</label>
                                            <input type="text" class="form-control mb-5" id="amount" name="amount"
                                                placeholder="Withdraw Amount" maxlength="10">
                                            <input type="hidden" class="form-control mb-5" id="equity_amount" name="equity_amount"
                                                maxlength="10">
                                        </div>
                                        <div class="fv-row w-100 flex-md-root">
                                            <div class="fv-row w-100 flex-md-root" id="bank_transfer_div" style="display: none;">
                                                <label class="required form-label">Bank</label>
                                                <select class="form-select mb-5" data-control="select2"
                                                    data-placeholder="Select an option"
                                                    name="bank" id="bank">
                                                    <option value=""></option>
                                                    <?php
                                                    if (isset($verified_banks) && !empty($verified_banks)) {
                                                        foreach ($verified_banks as $bank) {
                                                            echo '<option value ="' . $bank->id . '">' . $bank->bank_name . '</option>';
                                                        }
                                                    } else {
                                                        echo '<option value ="' . 0 . '">' . 'No Bank Available' . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="fv-row w-100 flex-md-root">
                                        </div>
                                    </div>
                                    <div class="gap-5 trc_wallet_address" style="display: none;">
                                        <div class="alert alert-success d-flex align-items-center p-5 mb-10 trc-wallet-div">
                                            <span class="svg-icon svg-icon-2hx svg-icon-success me-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="currentColor"></path>
                                                    <path d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <div class="d-flex flex-column">
                                                <h4 class="mb-1 text-success">Verified Wallet Address(TRC-20 ) : <span id="wallet_id_span"></span></h4>
                                                <span>We've confirmed your wallet address! All withdrawal amounts will be sent directly to this address. If you need to update it, please do so before requesting a withdrawal.</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gap-5 wallet_div" style="display: none;">
                                        <div class="alert alert-primary d-flex align-items-center p-5 mb-10">
                                            <span class="svg-icon svg-icon-2hx svg-icon-primary me-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.3" d="M3.20001 5.91897L16.9 3.01895C17.4 2.91895 18 3.219 18.1 3.819L19.2 9.01895L3.20001 5.91897Z" fill="currentColor" />
                                                    <path opacity="0.3" d="M13 13.9189C13 12.2189 14.3 10.9189 16 10.9189H21C21.6 10.9189 22 11.3189 22 11.9189V15.9189C22 16.5189 21.6 16.9189 21 16.9189H16C14.3 16.9189 13 15.6189 13 13.9189ZM16 12.4189C15.2 12.4189 14.5 13.1189 14.5 13.9189C14.5 14.7189 15.2 15.4189 16 15.4189C16.8 15.4189 17.5 14.7189 17.5 13.9189C17.5 13.1189 16.8 12.4189 16 12.4189Z" fill="currentColor" />
                                                    <path d="M13 13.9189C13 12.2189 14.3 10.9189 16 10.9189H21V7.91895C21 6.81895 20.1 5.91895 19 5.91895H3C2.4 5.91895 2 6.31895 2 6.91895V20.9189C2 21.5189 2.4 21.9189 3 21.9189H19C20.1 21.9189 21 21.0189 21 19.9189V16.9189H16C14.3 16.9189 13 15.6189 13 13.9189Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <div class="d-flex flex-column">
                                                <h4 class="mb-1 text-primary">Account Details (<span id="account_span"></span>)</h4>
                                                <table>
                                                    <tr>
                                                        <td>Balance</td>
                                                        <td> - <span id="balance_span"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Equity</td>
                                                        <td> - <span id="equity_span"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>MarginFree</td>
                                                        <td> - <span id="free_span"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>MarginLeverage</td>
                                                        <td> - <span id="leverage_span"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Outstanding Withdraw</td>
                                                        <td> - <span id="withdraw_span">0.00</span></td>
                                                    </tr>
                                                </table>
                                            </div>
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
                                            onclick="submit_data()">Withdraw</a>
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
                var data = $.parseJSON(result);
                console.log(data.account_data);
                if (data.status == 1) {
                    $('#account_span').html(account);
                    $('.wallet_div').show();
                    $('#balance_span').html(data.account_data['Balance']);
                    $('#equity_span').html(data.account_data['Equity']);
                    $('#equity_amount').val(data.account_data['Equity']);
                    $('#free_span').html(data.account_data['MarginFree']);
                    $('#leverage_span').html(data.account_data['MarginLeverage']);
                    $('#withdraw_span').html('');
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'An error occurred while processing your request.'
                    });
                }
            },
            error: function(xhr, status, error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An error occurred while processing your request.'
                });
            }
        });
    }

    function check_type() {
        var method = $('#method').val();
        if (method == 3) {
            $('#bank_transfer_div').show();
            $('.trc_wallet_address').hide();
        } else if (method == 1) {
            $('#bank_transfer_div').hide();
            var ops_url = baseurl + 'transaction/check-wallet-address';
            $.ajax({
                type: "POST",
                cache: false,
                async: true,
                url: ops_url,
                processData: false,
                contentType: false,
                data: '',
                success: function(result) {
                    var data = $.parseJSON(result);
                    if (data.status == 0) {
                        $('#method').val('').trigger('change');
                        Swal.fire({
                            icon: 'info',
                            title: 'Warning',
                            text: 'To complete your withdrawal, please ensure that your TRC wallet address is added and verified in your profile. This step is required to securely process your transaction and prevent any delays.',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Verify',
                            cancelButtonText: 'Cancel'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "<?php echo base_url(); ?>client/my-data";
                            }
                        });
                    }
                    if (data.status == 1) {
                        $('.trc_wallet_address').show();
                        $('#wallet_id_span').html(data.wallet_address);
                    }
                },
            });
        } else {
            $('#bank_transfer_div').hide();
            $('.trc_wallet_address').hide();
        }
    }

    function submit_data() {
        $("#actual_submit").hide();
        $("#loader_submit").show();

        var ops_url = baseurl + 'transaction/withdraw-save';
        var account = $('#account').val();
        var currency = $('#currency').val();
        var method = $('#method').val();
        var amount = $("#amount").val();
        var equity_amount = $("#equity_amount").val();

        if (account == "") {
            Swal.fire({
                icon: 'info',
                title: '',
                text: 'Account is required.'
            });
            $("#actual_submit").show();
            $("#loader_submit").hide();
            return false;
        }
        if (method == "") {
            Swal.fire({
                icon: 'info',
                title: '',
                text: 'Method is required.'
            });
            $("#actual_submit").show();
            $("#loader_submit").hide();
            return false;
        }
        if (method == 3) {
            var bank = $("#bank").val();
            if (bank == 0) {
                Swal.fire({
                    icon: 'info',
                    title: '',
                    text: 'Please add a bank account in your profile to proceed with the withdrawal.'
                });
                $("#actual_submit").show();
                $("#loader_submit").hide();
                return false;
            }
        }
        if (currency == "") {
            Swal.fire({
                icon: 'info',
                title: '',
                text: 'Currency is required.'
            });
            $("#actual_submit").show();
            $("#loader_submit").hide();
            return false;
        }
        if (amount == "") {
            Swal.fire({
                icon: 'info',
                title: '',
                text: 'Amount is required.'
            });
            $("#actual_submit").show();
            $("#loader_submit").hide();
            return false;
        }
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
                $("#actual_submit").show();
                $("#loader_submit").hide();
                var data = $.parseJSON(result);
                if (data.status == 1) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Withdraw Completed.',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
                }
                if (data.status == 3) {
                    Swal.fire({
                        icon: 'warning', // Changed to 'warning' for better emphasis
                        title: 'Insufficient Balance',
                        text: 'Your maximum withdrawable amount is ' + equity_amount + '. Please enter a lower amount.',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    });
                }
            },
            error: function(xhr, status, error) {
                $("#actual_submit").show();
                $("#loader_submit").hide();
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