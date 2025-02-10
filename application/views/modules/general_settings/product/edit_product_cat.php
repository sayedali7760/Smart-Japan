<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

    <div class="post d-flex flex-column-fluid" id="kt_post">

        <div id="kt_content_container" class="container-xxl">

            <?php
                echo form_open_multipart('edit_organization', array('id' => 'category_update', 'role' => 'form','class' => 'form d-flex flex-column flex-lg-row'));
                ?>


            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">

                <div class="tab-content">

                    <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
                        <div class="d-flex flex-column gap-7 gap-lg-10">

                            <div class="card card-flush py-4">

                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Update Category</h2>
                                    </div>
                                </div>

                                <div class="card-body pt-0">
                                    <div class="d-flex flex-wrap gap-5">

                                        <div class="fv-row w-100 flex-md-root">
                                            <label class="required form-label">Category</label>
                                            <input type="hidden" id="organizatcategory_idion_id" name="category_id"
                                                value="<?php echo $category_id; ?>">
                                            <input type="text" class="form-control mb-5 alphanumeric" id="category"
                                                name="category" placeholder="Name" maxlength="50"
                                                value="<?php echo $category; ?>">
                                        </div>
                                        <div class="fv-row w-100 flex-md-root">
                                            <label class=" form-label">Description</label>
                                            <input type="text" class="form-control mb-5" id="description"
                                                name="description" placeholder="Mail-Id" maxlength="50"
                                                value="<?php echo $description; ?>">
                                        </div>
                                        <div class="fv-row w-100 flex-md-root">

                                        </div>

                                    </div>



                                </div>

                            </div>

                        </div>
                    </div>

                </div>

                <div class="d-flex justify-content-end">

                    <a href="<?php echo base_url();?>home" id="kt_ecommerce_add_product_cancel"
                        class="btn btn-light me-5">Cancel</a>

                    <a href="javascript:void(0);" class="btn btn-primary" title="Save Changes"
                        onclick="update_data()">Save Changes</a>

                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<script>
function update_data() {
    var ops_url = baseurl + 'product/update-category';
    var category = $('#category').val();
    var description = $('#description').val();


    if (category == "") {
        Swal.fire({
            icon: 'info',
            title: '',
            text: 'Category is required.'
        });
        return false;
    }
    if (category.length < 5) {
        Swal.fire({
            icon: 'info',
            title: '',
            text: 'Enter atleast 5 characters for Category.'
        });
        return false;
    }

    var form = $("#category_update");
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
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Category updated.'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload();
                    }
                });
            }
            if (data.status == 0) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Warning',
                    text: 'Category already exist.'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload();
                    }
                });
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