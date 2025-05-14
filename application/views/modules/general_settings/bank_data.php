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
                            <div class="col-xl-6 mb-5 mb-xl-10">
                                <!--begin::Slider Widget 2-->
                                <div id="kt_sliders_widget_2_slider" class="card card-flush carousel carousel-custom carousel-stretch slide h-xl-100" data-bs-ride="carousel" data-bs-interval="5500">
                                    <!--begin::Header-->
                                    <div class="card-header pt-5">
                                        <!--begin::Title-->
                                        <h4 class="card-title d-flex align-items-start flex-column">
                                            <span class="card-label fw-bolder text-gray-800">Added Bank's</span>
                                            <span class="text-gray-400 mt-1 fw-bolder fs-7">The added bank details are provided below.</span>
                                        </h4>
                                        <!--end::Title-->
                                        <!--begin::Toolbar-->
                                        <div class="card-toolbar">
                                            <!--begin::Carousel Indicators-->
                                            <ol class="p-0 m-0 carousel-indicators carousel-indicators-bullet carousel-indicators-active-success">
                                                <li data-bs-target="#kt_sliders_widget_2_slider" data-bs-slide-to="0" class="ms-1"></li>
                                                <li data-bs-target="#kt_sliders_widget_2_slider" data-bs-slide-to="1" class="ms-1 active" aria-current="true"></li>
                                                <li data-bs-target="#kt_sliders_widget_2_slider" data-bs-slide-to="2" class="ms-1"></li>
                                            </ol>
                                            <!--end::Carousel Indicators-->
                                        </div>
                                        <!--end::Toolbar-->
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body pt-6">
                                        <!--begin::Carousel-->
                                        <div class="carousel-inner">
                                            <!--begin::Item-->

                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="carousel-item active">
                                                <!--begin::Wrapper-->
                                                <div class="d-flex align-items-center mb-9">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-70px symbol-circle me-5">
                                                        <span class="symbol-label bg-light-danger">
                                                            <!--begin::Svg Icon | path: icons/duotune/abstract/abs026.svg-->
                                                            <span class="svg-icon svg-icon-3x svg-icon-danger">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path opacity="0.3" d="M7 20.5L2 17.6V11.8L7 8.90002L12 11.8V17.6L7 20.5ZM21 20.8V18.5L19 17.3L17 18.5V20.8L19 22L21 20.8Z" fill="currentColor"></path>
                                                                    <path d="M22 14.1V6L15 2L8 6V14.1L15 18.2L22 14.1Z" fill="currentColor"></path>
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Info-->
                                                    <div class="m-0">
                                                        <!--begin::Subtitle-->
                                                        <h4 class="fw-bolder text-gray-800 mb-3"><?= isset($bank['bank_name']) ? htmlspecialchars($bank['bank_name']) : 'N/A' ?></h4>
                                                        <!--end::Subtitle-->
                                                        <!--begin::Items-->
                                                        <div class="d-flex d-grid gap-5">
                                                            <!--begin::Item-->
                                                            <div class="d-flex flex-column flex-shrink-0 me-4">
                                                                <!--begin::Section-->
                                                                <span class="d-flex align-items-center fs-7 fw-bolder text-gray-400 mb-2">
                                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen057.svg-->
                                                                    <span class="svg-icon svg-icon-6 svg-icon-gray-600 me-2">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor"></rect>
                                                                            <path d="M11.9343 12.5657L9.53696 14.963C9.22669 15.2733 9.18488 15.7619 9.43792 16.1204C9.7616 16.5789 10.4211 16.6334 10.8156 16.2342L14.3054 12.7029C14.6903 12.3134 14.6903 11.6866 14.3054 11.2971L10.8156 7.76582C10.4211 7.3666 9.7616 7.42107 9.43792 7.87962C9.18488 8.23809 9.22669 8.72669 9.53696 9.03696L11.9343 11.4343C12.2467 11.7467 12.2467 12.2533 11.9343 12.5657Z" fill="currentColor"></path>
                                                                        </svg>
                                                                    </span>
                                                                    <!--end::Svg Icon-->Account No</span>
                                                                <!--end::Section-->
                                                                <!--begin::Section-->
                                                                <span class="d-flex align-items-center text-gray-400 fw-bolder fs-7">
                                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen057.svg-->
                                                                    <span class="svg-icon svg-icon-6 svg-icon-gray-600 me-2">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor"></rect>
                                                                            <path d="M11.9343 12.5657L9.53696 14.963C9.22669 15.2733 9.18488 15.7619 9.43792 16.1204C9.7616 16.5789 10.4211 16.6334 10.8156 16.2342L14.3054 12.7029C14.6903 12.3134 14.6903 11.6866 14.3054 11.2971L10.8156 7.76582C10.4211 7.3666 9.7616 7.42107 9.43792 7.87962C9.18488 8.23809 9.22669 8.72669 9.53696 9.03696L11.9343 11.4343C12.2467 11.7467 12.2467 12.2533 11.9343 12.5657Z" fill="currentColor"></path>
                                                                        </svg>
                                                                    </span>
                                                                    <!--end::Svg Icon-->IBan</span>
                                                                <!--end::Section-->
                                                            </div>
                                                            <!--end::Item-->
                                                            <!--begin::Item-->
                                                            <div class="d-flex flex-column flex-shrink-0">
                                                                <!--begin::Section-->
                                                                <span class="d-flex align-items-center fs-7 fw-bolder text-gray-400 mb-2">
                                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen057.svg-->

                                                                    <!--end::Svg Icon--><?= isset($bank['account_no']) ? htmlspecialchars($bank['account_no']) : 'N/A' ?></span>
                                                                <!--end::Section-->
                                                                <!--begin::Section-->
                                                                <span class="d-flex align-items-center text-gray-400 fw-bolder fs-7">
                                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen057.svg-->

                                                                    <!--end::Svg Icon--><?= isset($bank['iban']) ? htmlspecialchars($bank['iban']) : 'N/A' ?></span>
                                                                <!--end::Section-->
                                                            </div>
                                                            <!--end::Item-->
                                                        </div>
                                                        <!--end::Items-->
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                                <!--end::Wrapper-->
                                                <!--begin::Action-->
                                                <div class="mb-1">
                                                    <?php
                                                    if ($bank['status'] == 0) {
                                                        echo '<span class="badge badge-warning">Pending</span>';
                                                    } else if ($bank['status'] == 1) {
                                                        echo '<span class="badge badge-success">Verified</span>';
                                                    } else if ($bank['status'] == 2) {
                                                        echo '<span class="badge badge-danger">Rejected</span>';
                                                    }
                                                    ?>
                                                </div>
                                                <!--end::Action-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->

                                            <!--end::Item-->
                                        </div>
                                        <!--end::Carousel-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Slider Widget 2-->
                                          
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
            if (acc_no == "" || !/^\d+$/.test(acc_no)) {
                Swal.fire({
                    icon: 'info',
                    title: '',
                    text: 'Provide a valid Account number.'
                });
                $("#actual_submit").show();
                $("#loader_submit").hide();
                return false;
            }
            if (iban == "") {
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
                    text: 'Provide a valid Swift code.'
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