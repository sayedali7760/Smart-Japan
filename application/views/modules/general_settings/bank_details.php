<?php if (isset($bank_data)) {    ?>

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

                            <span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
                                <svg viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000" style="margin-bottom:20px;">
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
                            <!--end::Svg Icon-->
                            <div class="bank_div">
                                <table class="table table-bordered">
                                    <tr>
                                        <th class="text-gray-400">Beneficiary Name</th>
                                        <td><?= isset($bank['beneficiary_name']) ? htmlspecialchars($bank['beneficiary_name']) : 'N/A' ?></td>
                                    </tr>
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
                                    <tr>
                                        <th class="text-gray-400">SWIFT code</th>
                                        <td><?= isset($bank['swift']) ? htmlspecialchars($bank['swift']) : 'N/A' ?></td>
                                    </tr>
                                    <tr>
                                        <th class="text-gray-400">Bank Address</th>
                                        <td><?= isset($bank['bank_addr']) ? htmlspecialchars($bank['bank_addr']) : 'N/A' ?></td>
                                    </tr>
                                    <tr>
                                        <th class="text-gray-400">Branch</th>
                                        <td><?= isset($bank['branch']) ? htmlspecialchars($bank['branch']) : 'N/A' ?></td>
                                    </tr>
                                    <tr>
                                        <th class="text-gray-400">Statement</th>
                                        <td><a href="<?php echo base_url() ?>uploads/<?= isset($bank['statement']) ? htmlspecialchars($bank['statement']) : '' ?>" target="_blank" class="btn btn-sm btn-primary btn-active-light-primary me-3" title="View"><i class="fa fa-download" aria-hidden="true"></i></a></td>
                                    </tr>
                                    <tr>
                                        <th class="text-gray-400">Status</th>
                                        <td style="color: <?= $bank['status'] == 1 ? 'green' : 'red' ?>;">
                                            <?php if ($bank['status'] == 0) {
                                                echo 'Pending';
                                            } else if ($bank['status'] == 1) {
                                                echo 'Verified';
                                            } else {
                                                echo 'Rejected';
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>

                                        <td><a href="<?php echo base_url(); ?>user-management/client-show" id="kt_ecommerce_add_product_cancel"
                                                class="btn btn-sm btn-danger btn-active-light-primary me-5">Reject</a></td>

                                        <td> <a href="javascript:void(0);" class="btn btn-sm btn-success btn-active-light-primary me-5" title="Save Changes" onclick="update_data()">
                                                Approve</a>
                                        </td>

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

<?php  } ?>