<?php
if (!empty($bank_data)) {
?>
    <div id="kt_content_container" class="container-xxl">
        <div class="row g-5 g-xl-8">
            <?php foreach ($bank_data as $bank) { ?>
                <div class="col-xl-6 mb-5 mb-xl-10">
                    <div id="kt_sliders_widget_2_slider" class="card card-flush carousel carousel-custom carousel-stretch slide h-xl-100" data-bs-ride="carousel" data-bs-interval="5500">
                        <div class="card-header pt-5">
                            <h4 class="card-title d-flex align-items-start flex-column">
                                <span class="card-label fw-bolder text-gray-800">Added Bank's</span>
                                <span class="text-gray-400 mt-1 fw-bolder fs-7">The added bank details are provided below.</span>
                            </h4>
                            <div class="card-toolbar">
                                <ol class="p-0 m-0 carousel-indicators carousel-indicators-bullet carousel-indicators-active-success">
                                    <li data-bs-target="#kt_sliders_widget_2_slider" data-bs-slide-to="0" class="ms-1"></li>
                                    <li data-bs-target="#kt_sliders_widget_2_slider" data-bs-slide-to="1" class="ms-1 active" aria-current="true"></li>
                                    <li data-bs-target="#kt_sliders_widget_2_slider" data-bs-slide-to="2" class="ms-1"></li>
                                </ol>
                            </div>
                        </div>
                        <div class="card-body pt-6">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="d-flex align-items-center mb-9">
                                        <div class="symbol symbol-70px symbol-circle me-5">
                                            <span class="symbol-label bg-light-danger">
                                                <span class="svg-icon svg-icon-3x svg-icon-danger">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <path opacity="0.3" d="M7 20.5L2 17.6V11.8L7 8.90002L12 11.8V17.6L7 20.5ZM21 20.8V18.5L19 17.3L17 18.5V20.8L19 22L21 20.8Z" fill="currentColor"></path>
                                                        <path d="M22 14.1V6L15 2L8 6V14.1L15 18.2L22 14.1Z" fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                            </span>
                                        </div>
                                        <div class="m-0">
                                            <h4 class="fw-bolder text-gray-800 mb-3"><?= isset($bank['bank_name']) ? htmlspecialchars($bank['bank_name']) : 'N/A' ?></h4>
                                            <div class="d-flex d-grid gap-5">
                                                <div class="d-flex flex-column flex-shrink-0 me-4">
                                                    <span class="d-flex align-items-center fs-7 fw-bolder text-gray-400 mb-2">
                                                        <span class="svg-icon svg-icon-6 svg-icon-gray-600 me-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor"></rect>
                                                                <path d="M11.9343 12.5657L9.53696 14.963C9.22669 15.2733 9.18488 15.7619 9.43792 16.1204C9.7616 16.5789 10.4211 16.6334 10.8156 16.2342L14.3054 12.7029C14.6903 12.3134 14.6903 11.6866 14.3054 11.2971L10.8156 7.76582C10.4211 7.3666 9.7616 7.42107 9.43792 7.87962C9.18488 8.23809 9.22669 8.72669 9.53696 9.03696L11.9343 11.4343C12.2467 11.7467 12.2467 12.2533 11.9343 12.5657Z" fill="currentColor"></path>
                                                            </svg>
                                                        </span>Account No</span>
                                                    <span class="d-flex align-items-center text-gray-400 fw-bolder fs-7 mb-2">
                                                        <span class="svg-icon svg-icon-6 svg-icon-gray-600 me-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor"></rect>
                                                                <path d="M11.9343 12.5657L9.53696 14.963C9.22669 15.2733 9.18488 15.7619 9.43792 16.1204C9.7616 16.5789 10.4211 16.6334 10.8156 16.2342L14.3054 12.7029C14.6903 12.3134 14.6903 11.6866 14.3054 11.2971L10.8156 7.76582C10.4211 7.3666 9.7616 7.42107 9.43792 7.87962C9.18488 8.23809 9.22669 8.72669 9.53696 9.03696L11.9343 11.4343C12.2467 11.7467 12.2467 12.2533 11.9343 12.5657Z" fill="currentColor"></path>
                                                            </svg>
                                                        </span>IBan</span>
                                                    <span class="d-flex align-items-center text-gray-400 fw-bolder fs-7 mb-2">
                                                        <span class="svg-icon svg-icon-6 svg-icon-gray-600 me-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor"></rect>
                                                                <path d="M11.9343 12.5657L9.53696 14.963C9.22669 15.2733 9.18488 15.7619 9.43792 16.1204C9.7616 16.5789 10.4211 16.6334 10.8156 16.2342L14.3054 12.7029C14.6903 12.3134 14.6903 11.6866 14.3054 11.2971L10.8156 7.76582C10.4211 7.3666 9.7616 7.42107 9.43792 7.87962C9.18488 8.23809 9.22669 8.72669 9.53696 9.03696L11.9343 11.4343C12.2467 11.7467 12.2467 12.2533 11.9343 12.5657Z" fill="currentColor"></path>
                                                            </svg>
                                                        </span>Beneficiary Name</span>
                                                    <span class="d-flex align-items-center text-gray-400 fw-bolder fs-7 mb-2">
                                                        <span class="svg-icon svg-icon-6 svg-icon-gray-600 me-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor"></rect>
                                                                <path d="M11.9343 12.5657L9.53696 14.963C9.22669 15.2733 9.18488 15.7619 9.43792 16.1204C9.7616 16.5789 10.4211 16.6334 10.8156 16.2342L14.3054 12.7029C14.6903 12.3134 14.6903 11.6866 14.3054 11.2971L10.8156 7.76582C10.4211 7.3666 9.7616 7.42107 9.43792 7.87962C9.18488 8.23809 9.22669 8.72669 9.53696 9.03696L11.9343 11.4343C12.2467 11.7467 12.2467 12.2533 11.9343 12.5657Z" fill="currentColor"></path>
                                                            </svg>
                                                        </span>Swift Code</span>
                                                    <span class="d-flex align-items-center text-gray-400 fw-bolder fs-7 mb-2">
                                                        <span class="svg-icon svg-icon-6 svg-icon-gray-600 me-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor"></rect>
                                                                <path d="M11.9343 12.5657L9.53696 14.963C9.22669 15.2733 9.18488 15.7619 9.43792 16.1204C9.7616 16.5789 10.4211 16.6334 10.8156 16.2342L14.3054 12.7029C14.6903 12.3134 14.6903 11.6866 14.3054 11.2971L10.8156 7.76582C10.4211 7.3666 9.7616 7.42107 9.43792 7.87962C9.18488 8.23809 9.22669 8.72669 9.53696 9.03696L11.9343 11.4343C12.2467 11.7467 12.2467 12.2533 11.9343 12.5657Z" fill="currentColor"></path>
                                                            </svg>
                                                        </span>Branch</span>
                                                    <span class="d-flex align-items-center text-gray-400 fw-bolder fs-7 mb-2">
                                                        <span class="svg-icon svg-icon-6 svg-icon-gray-600 me-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor"></rect>
                                                                <path d="M11.9343 12.5657L9.53696 14.963C9.22669 15.2733 9.18488 15.7619 9.43792 16.1204C9.7616 16.5789 10.4211 16.6334 10.8156 16.2342L14.3054 12.7029C14.6903 12.3134 14.6903 11.6866 14.3054 11.2971L10.8156 7.76582C10.4211 7.3666 9.7616 7.42107 9.43792 7.87962C9.18488 8.23809 9.22669 8.72669 9.53696 9.03696L11.9343 11.4343C12.2467 11.7467 12.2467 12.2533 11.9343 12.5657Z" fill="currentColor"></path>
                                                            </svg>
                                                        </span>Bank Address</span>
                                                </div>
                                                <div class="d-flex flex-column flex-shrink-0">
                                                    <span class="d-flex align-items-center fs-7 fw-bolder text-gray-400 mb-2">
                                                        <?= isset($bank['account_no']) ? htmlspecialchars($bank['account_no']) : 'N/A' ?></span>
                                                    <span class="d-flex align-items-center text-gray-400 fw-bolder fs-7 mb-2">
                                                        <?= isset($bank['iban']) ? htmlspecialchars($bank['iban']) : 'N/A' ?></span>
                                                    <span class="d-flex align-items-center text-gray-400 fw-bolder fs-7 mb-2">
                                                        <?= isset($bank['beneficiary_name']) ? htmlspecialchars($bank['beneficiary_name']) : 'N/A' ?></span>
                                                    <span class="d-flex align-items-center text-gray-400 fw-bolder fs-7 mb-2">
                                                        <?= isset($bank['swift']) ? htmlspecialchars($bank['swift']) : 'N/A' ?></span>
                                                    <span class="d-flex align-items-center text-gray-400 fw-bolder fs-7 mb-2">
                                                        <?= isset($bank['branch']) ? htmlspecialchars($bank['branch']) : 'N/A' ?></span>
                                                    <span class="d-flex align-items-center text-gray-400 fw-bolder fs-7 mb-2">
                                                        <?= isset($bank['bank_addr']) ? htmlspecialchars($bank['bank_addr']) : 'N/A' ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-1 text-end">
                                        <?php
                                        if ($bank['status'] == 0) {
                                            echo '<span class="badge badge-warning">Pending</span>';
                                        } else if ($bank['status'] == 1) {
                                            echo '<span class="badge badge-success">Verified</span>';
                                        } else if ($bank['status'] == 2) {
                                            echo '<span class="badge badge-danger">Rejected</span>';
                                        }
                                        ?>
                                        <td>
                                            <?php
                                            if ($bank['status'] == 0) { ?>
                                                <a title="Approve" href="javascript:void(0);" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" onclick="approve_bank_data(<?php echo $bank['client_id']; ?>,<?php echo $bank['id']; ?>)">
                                                    <span class="svg-icon svg-icon-success svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <path d="M9.89557 13.4982L7.79487 11.2651C7.26967 10.7068 6.38251 10.7068 5.85731 11.2651C5.37559 11.7772 5.37559 12.5757 5.85731 13.0878L9.74989 17.2257C10.1448 17.6455 10.8118 17.6455 11.2066 17.2257L18.1427 9.85252C18.6244 9.34044 18.6244 8.54191 18.1427 8.02984C17.6175 7.47154 16.7303 7.47154 16.2051 8.02984L11.061 13.4982C10.7451 13.834 10.2115 13.834 9.89557 13.4982Z" fill="currentColor"></path>
                                                        </svg></span>
                                                </a>
                                                <a title="Reject" href="javascript:void(0);" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" onclick="reject_bank_data(<?php echo $bank['client_id']; ?>,<?php echo $bank['id']; ?>)">
                                                    <span class="svg-icon svg-icon-danger svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <rect opacity="0.5" x="7.05025" y="15.5356" width="12" height="2" rx="1" transform="rotate(-45 7.05025 15.5356)" fill="currentColor"></rect>
                                                            <rect x="8.46447" y="7.05029" width="12" height="2" rx="1" transform="rotate(45 8.46447 7.05029)" fill="currentColor"></rect>
                                                        </svg></span>
                                                </a>
                                            <?php } ?>
                                        </td>
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

        <!--end::Post-->
    </div>
<?php  } else { ?>
    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication - 404 Page-->
        <div class="d-flex flex-column flex-center flex-column-fluid p-10">
            <!--begin::Illustration-->
            <img src="<?php echo base_url(); ?>assets/media/illustrations/sigma-1/18.png" alt="" class="mw-100 mb-10 h-lg-450px" />
            <!--end::Illustration-->
            <!--begin::Message-->
            <h1 class="fw-bold mb-10" style="color: #A3A3C7">Oops! Looks like there's nothing here.</h1>
            <!--end::Message-->
            <!--begin::Link-->
            <!--end::Link-->
        </div>
        <!--end::Authentication - 404 Page-->
    </div>
<?php } ?>
<script>
    function approve_bank_data(client_id, id) {
        Swal.fire({
            text: "Are you sure you want to Approve this bank?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, Approve it!",
            cancelButtonText: "No, Cancel",
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    url: baseurl + 'client/approve-bank-data',
                    type: 'POST',
                    data: {
                        id: id,
                        client_id: client_id
                    },
                    success: function(result) {
                        var data = $.parseJSON(result);
                        if (data.status == 1) {
                            Swal.fire({
                                text: "Bank Approved successfully.",
                                icon: "success",
                                confirmButtonText: "OK",
                            }).then(function() {
                                view_client_bank(client_id);
                            });
                        } else {
                            Swal.fire({
                                text: "Failed to reject refund.",
                                icon: "error",
                            });
                        }
                    }
                });
            }
        });
    }

    function reject_bank_data(client_id, id) {
        Swal.fire({
            text: "Are you sure you want to Reject this bank?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, Reject it!",
            cancelButtonText: "No, Cancel",
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    url: baseurl + 'client/reject-bank-data',
                    type: 'POST',
                    data: {
                        id: id,
                        client_id: client_id
                    },
                    success: function(result) {
                        var data = $.parseJSON(result);
                        if (data.status == 1) {
                            Swal.fire({
                                text: "Bank Rejected successfully.",
                                icon: "success",
                                confirmButtonText: "OK",
                            }).then(function() {
                                view_client_bank(client_id);
                            });
                        } else {
                            Swal.fire({
                                text: "Failed to reject refund.",
                                icon: "error",
                            });
                        }
                    }
                });
            }
        });
    }

    function view_client_bank(id) {
        var ops_url = baseurl + 'client/show-bank-details-client';
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