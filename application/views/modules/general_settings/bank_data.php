<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

    <div class="post d-flex flex-column-fluid" id="kt_post">

        <div id="kt_content_container" class="container-xxl">
            <div class="row g-5"> <!-- Ensure proper row usage -->

                <!-- Left Column -->
                <div class="col-md-6">
                    <?php echo form_open_multipart('bank/add_data', array('id' => 'data_save', 'role' => 'form', 'class' => 'form')); ?>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
                            <div class="card card-flush py-4">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Bank Data</h2>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="required form-label">Beneficiary Name</label>
                                            <input type="text" id="name" name="name" class="mb-5 form-control make-star" placeholder="Benificiary name">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="required form-label">Bank Name</label>
                                            <input type="text" id="bname" name="bname" class="mb-5 form-control make-star" placeholder="Bank name">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="required form-label">Bank Account Number</label>
                                            <input type="text" id="acc_no" name="acc_no" class="mb-5 form-control make-star" placeholder="Acc No">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="required form-label">IBAN</label>
                                            <input type="text" id="iban" name="iban" class="mb-5 form-control make-star" placeholder="IBAN">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="required form-label">SWIFT Code</label>
                                            <input type="text" id="swift" name="swift" class="mb-5 form-control make-star" placeholder="SWIFT">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="required form-label">Bank Address</label>
                                            <input type="text" id="addr" name="addr" class="mb-5 form-control make-star" placeholder="Bank Address">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="required form-label">Branch</label>
                                            <input type="text" id="branch" name="branch" class="mb-5 form-control make-star" placeholder="Branch">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="required form-label">Statement</label>
                                            <input type="file" class="form-control files" name="files_statement[]" id="files_statement">
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <a href="" class="btn btn-light me-5">Cancel</a>
                                        <a id="actual_submit" href="javascript:void(0);" class="btn btn-primary submit_butt" title="Save Changes"
                                            onclick="submit_data()">Submit</a>
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
                    <?php echo form_close(); ?>
                </div>


                <!-- Right Column -->
                <div class="col-md-6">
                    <?php echo form_open_multipart('bank/add_wallet', array('id' => 'wallet_save', 'role' => 'form', 'class' => 'form')); ?>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general_2" role="tab-panel">
                            <div class="card card-flush py-4">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Wallet Address</h2>
                                    </div>
                                </div>
                                <?php
                                if (!isset($wallet_data)) {
                                ?>
                                    <div class="card-body pt-0">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label class="required form-label">Wallet id:</label>
                                                <input type="text" id="wallet" maxlength="34" name="wallet" class="mb-5 form-control make-star" placeholder="Wallet Address">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="required form-label">Type</label>
                                                <select class="form-select mb-5" data-control="select2"
                                                    data-placeholder="Select an option"
                                                    name="wal_type" id="wal_type">
                                                    <option value="1">TRC-20</option>
                                                    <option value="2">ERC-20</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <a href="" class="btn btn-light me-5">Cancel</a>
                                            <a id="actual_submit" href="javascript:void(0);" class="btn btn-primary submit_butt" title="Save Changes"
                                                onclick="submit_wallet()">Submit</a>
                                            <a id="loader_submit" style="display:none;" href="javascript:void(0);" class="btn btn-primary" data-kt-indicator="on">
                                                <span class="indicator-label">Submit</span>
                                                <span class="indicator-progress">Please wait...
                                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                            </a>
                                        </div>
                                    </div>
                                <?php } else {
                                ?>
                                    <div class="card-body pt-0">
                                        <div class="gap-5 wallet_div">
                                            <div class="alert alert-success d-flex align-items-center p-5 mb-10">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen048.svg-->
                                                <span class="svg-icon svg-icon-2hx svg-icon-success me-4">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="currentColor"></path>
                                                        <path d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z" fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                                <div class="d-flex flex-column">
                                                    <h4 class="mb-1 text-success">Verified Wallet Address(<?= isset($wallet_data['type']) && $wallet_data['type'] == 2 ? 'ERC-20' : 'TRC-20' ?>
                                                        ) : <span><?= isset($wallet_data['wallet_address']) ? $wallet_data['wallet_address'] : '' ?></span></h4>
                                                    <span>This confirms that your account verification is complete. You can now create live accounts for real transactions and demo accounts for practice. This feature is available on financial platforms, trading applications, or services that support both test and real environments.</span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>

            </div>
        </div>

    </div>
    <?php
    if (isset($bank_data)) {

    ?>
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <!--begin::Post-->
            <div class="post d-flex flex-column-fluid" id="kt_post">
                <!--begin::Container-->
                <div id="kt_content_container" class="container-xxl">
                    <!--begin::Row-->
                    <div class="row g-5 g-xl-8">
                        <?php foreach ($bank_data as $bank) { ?>
                            <div class="col-xl-4">
                                <!--begin::Statistics Widget 5-->
                                <a href="#" class="card bg-body-white hoverable card-xl-stretch mb-xl-8">
                                    <!--begin::Body-->
                                    <div class="card-body">
                                        <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
                                        <div class="d-flex  position-relative my-1 align-items-center mb-2">
                                            <span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
                                                <svg viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000">
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <title>bank_fill</title>
                                                        <g id="页面-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <g id="Building" transform="translate(-192.000000, -48.000000)">
                                                                <g id="bank_fill" transform="translate(192.000000, 48.000000)">
                                                                    <path d="M24,0 L24,24 L0,24 L0,0 L24,0 Z M12.5934901,23.257841 L12.5819402,23.2595131 L12.5108777,23.2950439 L12.4918791,23.2987469 L12.4918791,23.2987469 L12.4767152,23.2950439 L12.4056548,23.2595131 C12.3958229,23.2563662 12.3870493,23.2590235 12.3821421,23.2649074 L12.3780323,23.275831 L12.360941,23.7031097 L12.3658947,23.7234994 L12.3769048,23.7357139 L12.4804777,23.8096931 L12.4953491,23.8136134 L12.4953491,23.8136134 L12.5071152,23.8096931 L12.6106902,23.7357139 L12.6232938,23.7196733 L12.6232938,23.7196733 L12.6266527,23.7031097 L12.609561,23.275831 C12.6075724,23.2657013 12.6010112,23.2592993 12.5934901,23.257841 L12.5934901,23.257841 Z M12.8583906,23.1452862 L12.8445485,23.1473072 L12.6598443,23.2396597 L12.6498822,23.2499052 L12.6498822,23.2499052 L12.6471943,23.2611114 L12.6650943,23.6906389 L12.6699349,23.7034178 L12.6699349,23.7034178 L12.678386,23.7104931 L12.8793402,23.8032389 C12.8914285,23.8068999 12.9022333,23.8029875 12.9078286,23.7952264 L12.9118235,23.7811639 L12.8776777,23.1665331 C12.8752882,23.1545897 12.8674102,23.1470016 12.8583906,23.1452862 L12.8583906,23.1452862 Z M12.1430473,23.1473072 C12.1332178,23.1423925 12.1221763,23.1452606 12.1156365,23.1525954 L12.1099173,23.1665331 L12.0757714,23.7811639 C12.0751323,23.7926639 12.0828099,23.8018602 12.0926481,23.8045676 L12.108256,23.8032389 L12.3092106,23.7104931 L12.3186497,23.7024347 L12.3186497,23.7024347 L12.3225043,23.6906389 L12.340401,23.2611114 L12.337245,23.2485176 L12.337245,23.2485176 L12.3277531,23.2396597 L12.1430473,23.1473072 Z" id="MingCute" fill-rule="nonzero"> </path>
                                                                    <path d="M12.6708,2.21744 L21.1708,6.96744 C21.679,7.22153 22,7.74092 22,8.30908 L22,9.75006 C22,10.4404 21.4404,11.0001 20.75,11.0001 L20,11.0001 L20,19.0001 L21,19.0001 C21.5523,19.0001 22,19.4478 22,20.0001 C22,20.5524 21.5523,21.0001 21,21.0001 L3,21.0001 C2.44772,21.0001 2,20.5524 2,20.0001 C2,19.4478 2.44772,19.0001 3,19.0001 L4,19.0001 L4,11.0001 L3.25,11.0001 C2.55964,11.0001 2,10.4404 2,9.75006 L2,8.30908 C2,7.78826667 2.26973757,7.30843368 2.70611413,7.03636428 L11.3292,2.21744 C11.7515,2.0063 12.2485,2.0063 12.6708,2.21744 Z M17,11.0001 L7,11.0001 L7,19.0001 L9,19.0001 L9,13.0001 L11,13.0001 L11,19.0001 L13,19.0001 L13,13.0001 L15,13.0001 L15,19.0001 L17,19.0001 L17,11.0001 Z M12,6.00012 C11.4477,6.00012 11,6.44784 11,7.00012 C11,7.55241 11.4477,8.00012 12,8.00012 C12.5523,8.00012 13,7.55241 13,7.00012 C13,6.44784 12.5523,6.00012 12,6.00012 Z" id="形状" fill="#09244B"> </path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </span>
                                            <div class="d-flex" style="width: 100%; justify-content: end">

                                                <div style="margin-left: auto;">
                                                    <label class="form-label" style="color: <?= $bank['status'] == 1 ? 'green' : 'red' ?>;">
                                                        <?php if ($bank['status'] == 0) {
                                                            echo 'Pending';
                                                        } else if ($bank['status'] == 1) {
                                                            echo 'Verified';
                                                        } else {
                                                            echo 'Rejected';
                                                        }
                                                        ?>
                                                    </label>
                                                </div>

                                            </div>
                                        </div>
                                        <!--end::Svg Icon-->
                                        <div class="bank_div">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th class="text-gray-400">Bank Name</th>
                                                    <td><?= isset($bank['bank_name']) ? htmlspecialchars($bank['bank_name']) : 'N/A' ?></td>
                                                </tr>
                                                <tr>
                                                    <th class="text-gray-400">Account No</th>
                                                    <td><?= isset($bank['account_no']) ? htmlspecialchars($bank['account_no']) : 'N/A' ?></td>
                                                </tr>
                                                <tr>
                                                    <th class="text-gray-400">IBAN</th>
                                                    <td><?= isset($bank['iban']) ? htmlspecialchars($bank['iban']) : 'N/A' ?></td>
                                                </tr>

                                            </table>
                                        </div>


                                    </div>
                                    <!--end::Body-->
                                </a>
                                <!--end::Statistics Widget 5-->
                            </div>
                        <?php } ?>
                    </div>
                    <!--end::Row-->
                    <!--begin::Row-->

                    <!--end::Row-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Post-->
        </div>
    <?php  } ?>
    <script>
        function submit_data() {
            $("#actual_submit").hide();
            $("#loader_submit").show();
            var ops_url = baseurl + 'client/bdata-save';
            var name = $('#name').val();
            var bname = $('#bname').val();
            var acc_no = $('#acc_no').val();
            var iban = $('#iban').val();
            var swift = $('#swift').val();
            var addr = $('#addr').val();
            var branch = $('#branch').val();
            var statement = $('#statement').val();

            if (name == "") {
                Swal.fire({
                    icon: 'info',
                    title: '',
                    text: 'Beneficiary Name is required.'
                });
                $("#actual_submit").show();
                $("#loader_submit").hide();
                return false;
            }
            if (bname == "") {
                Swal.fire({
                    icon: 'info',
                    title: '',
                    text: 'Bank name is required.'
                });
                $("#actual_submit").show();
                $("#loader_submit").hide();
                return false;
            }
            if (acc_no == "") {
                Swal.fire({
                    icon: 'info',
                    title: '',
                    text: 'Provide a valid Account number.'
                });
                $("#actual_submit").show();
                $("#loader_submit").hide();
                return false;
            }
            if (iban == "" || !/^\d+$/.test(swift)) {
                Swal.fire({
                    icon: 'info',
                    title: '',
                    text: 'Iban is required.'
                });
                $("#actual_submit").show();
                $("#loader_submit").hide();
                return false;
            }
            if (swift == "" || !/^\d+$/.test(swift)) {
                Swal.fire({
                    icon: 'info',
                    title: '',
                    text: 'Swift code is required.'
                });
                $("#actual_submit").show();
                $("#loader_submit").hide();
                return false;
            }
            if (addr == "") {
                Swal.fire({
                    icon: 'info',
                    title: '',
                    text: 'Address is required.'
                });
                $("#actual_submit").show();
                $("#loader_submit").hide();
                return false;
            }
            if (branch == "") {
                Swal.fire({
                    icon: 'info',
                    title: '',
                    text: 'Branch is required.'
                });
                $("#actual_submit").show();
                $("#loader_submit").hide();
                return false;
            }
            if (statement == "") {
                Swal.fire({
                    icon: 'info',
                    title: '',
                    text: 'Branch is required.'
                });
                $("#actual_submit").show();
                $("#loader_submit").hide();
                return false;
            }
            var form = $("#data_save");
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
                        console.log(data.result_data);
                        $('.submit_butt').hide();
                        $("#loader_submit").hide();
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Bank Data Added Successfully',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK'
                        }).then(function(result) {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        });
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
    </script>

    <script>
        function submit_wallet() {
            $("#actual_submit").hide();
            $("#loader_submit").show();
            var ops_url = baseurl + 'client/wallet-save';
            var wallet_id = $('#wallet').val();
            var type = $('#wal_type').val();
            if (type == 1 && wallet_id.length != '34') {
                Swal.fire({
                    icon: 'info',
                    title: '',
                    text: 'Enter the TRC-20 Wallet Id.'
                });
                $("#actual_submit").show();
                $("#loader_submit").hide();
                return false;
            } else if (type == 2 && wallet_id.length != '42') {
                Swal.fire({
                    icon: 'info',
                    title: '',
                    text: 'Enter the ERC-20 Wallet Id.'
                });
                $("#actual_submit").show();
                $("#loader_submit").hide();
                return false;

            }

            var form = $("#wallet_save");
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
                        console.log(data.result_data);
                        $('.submit_butt').hide();
                        $("#loader_submit").hide();
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Wallet Address Added Successfully',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK'
                        }).then(function(result) {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        });
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
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#wal_type').on('select2:select change', function() { // Listen for both events
                var selectedOption = $(this).val();
                var wallet_address = $('#wallet');

                if (selectedOption == '2') {
                    wallet_address.attr('maxlength', '42');
                } else {
                    wallet_address.attr('maxlength', '34');
                }
            });
        });
    </script>