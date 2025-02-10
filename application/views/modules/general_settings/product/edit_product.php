<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

    <div class="post d-flex flex-column-fluid" id="kt_post">

        <div id="kt_content_container" class="container-xxl">

            <?php
                echo form_open_multipart('add_product_cat', array('id' => 'product_update', 'role' => 'form','class' => 'form d-flex flex-column flex-lg-row'));
                ?>


            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">

                <div class="tab-content">

                    <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
                        <div class="d-flex flex-column gap-7 gap-lg-10">

                            <div class="card card-flush py-4">

                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Update Product</h2>
                                    </div>
                                </div>

                                <div class="card-body pt-0">
                                    <div class="d-flex flex-wrap gap-5">

                                        <div class="fv-row w-100 flex-md-root">
                                            <label class="required form-label">Category</label>
                                            <input type="hidden" id="product_id" name="product_id" value="<?php echo $product_data->product_id;?>">
                                            <select class="form-select mb-5" data-control="select2"
                                                data-placeholder="Select an option"
                                                name="category" id="category">
                                                <option value=""></option>
                                                <?php
                                            if (isset($categories) && !empty($categories)) {
                                                foreach ($categories as $cat) {
                                                    if ($product_data->category == $cat->category_id) {
                                                        echo '<option selected value ="' . $cat->category_id . '">' . $cat->category . '</option>';
                                                    } else {
                                                        echo '<option value ="' . $cat->category_id . '">' . $cat->category . '</option>';
                                                    }
                                                }
                                            }
                                            ?>
                                            </select>
                                        </div>
                                        <div class="fv-row w-100 flex-md-root">
                                            <label class="required form-label">Name</label>
                                            <input type="text" class="form-control mb-5" id="description" name="name"
                                                placeholder="Name" maxlength="50" value="<?php echo $product_data->name;?>">
                                        </div>
                                        <div class="fv-row w-100 flex-md-root">
                                            <label class="form-label required">Code</label>
                                            <input type="text" class="form-control mb-5" id="code" name="code"
                                                placeholder="Code" maxlength="10" value="<?php echo $product_data->code;?>">
                                        </div>
                                    </div>
                                    <div class="d-flex flex-wrap gap-5">

                                        <div class="fv-row w-100 flex-md-root">
                                            <label class="required form-label">Tax</label>
                                            <select class="form-select mb-5" data-control="select2"
                                                data-placeholder="Select an option" name="tax"
                                                id="tax">
                                                <option value="0" <?php if($product_data->tax == 0){echo "selected";}?>>0%</option>
                                                <option value="5" <?php if($product_data->tax == 5){echo "selected";}?>>5%</option>
                                            </select>
                                        </div>
                                        <div class="fv-row w-100 flex-md-root">
                                            <label class="required form-label">Distributor</label>
                                            <select class="form-select mb-5" data-control="select2"
                                                data-placeholder="Select an option" 
                                                name="distributor" id="distributor">
                                                <option value=""></option>
                                                <?php
                                            if (isset($distributors) && !empty($distributors)) {

                                                foreach ($distributors as $dis) {
                                                    if ($product_data->distributor == $dis->organization_id) {
                                                        echo '<option selected value ="' . $dis->organization_id . '">' . $dis->name . '</option>';
                                                    } else {
                                                        echo '<option value ="' . $dis->organization_id . '">' . $dis->name . '</option>';
                                                    }
                                                }
                                            }
                                            ?>
                                            </select>
                                        </div>
                                        <div class="fv-row w-100 flex-md-root">
                                            <label class="form-label required">Purchase Rate</label>
                                            <input type="text" class="form-control mb-5 numeric" id="pur_rate" name="pur_rate"
                                                placeholder="Purchase Rate" maxlength="10" value="<?php echo $product_data->purchase_rate;?>">
                                        </div>
                                    </div>
                                    <div class="d-flex flex-wrap gap-5">

                                        <div class="fv-row w-100 flex-md-root">
                                            <label class="form-label required">Sales Rate</label>
                                            <input type="text" class="form-control mb-5 numeric" id="sale_rate" name="sale_rate"
                                                placeholder="Sales Rate" maxlength="10" value="<?php echo $product_data->sales_rate;?>">
                                        </div>
                                        <div class="fv-row w-100 flex-md-root">
                                            <label class="form-label required">Offer Percentage</label>
                                            <input type="text" class="form-control mb-5 numeric" id="offer" name="offer"
                                                placeholder="Offer Percentage" maxlength="3" value="<?php echo $product_data->offer_percentage;?>">
                                        </div>

                                        <div class="fv-row w-100 flex-md-root">
                                        </div>
                                    </div>

                                    <div class="d-flex flex-wrap gap-5">
                                        <div class="fv-row w-100 flex-md-root">
                                            <label class="form-label">Description</label>
                                            <textarea name="description" class="form-control" id="description"><?php echo $product_data->description;?></textarea>
                                            <div class="text-muted fs-7">Set a description to the product for better
                                                visibility.</div>
                                        </div>

                                    </div>
                                    <div class="d-flex flex-wrap gap-5">
                                        <div class="fv-row w-100 flex-md-root">
                                            <label class="form-label">Image</label>
                                            <input type="file" class="form-control mb-5" id="file" name="file[]"
                                                placeholder="Sales Rate" maxlength="50">
                                        </div>
                                        <div class="fv-row w-100 flex-md-root">
                                        </div>
                                        <div class="fv-row w-100 flex-md-root">
                                        </div>
                                    </div>
                                    <div class="d-flex flex-wrap gap-5">
                                        <div class="fv-row w-100 flex-md-root">
                                            <?php if($product_data->image!=''){?>
                                                <a target="_blank" href="<?php echo base_url()?>uploads/<?php echo $product_data->image;?>" class="btn btn-success">View Image</a>
                                            <?php }?>
                                        </div>
                                        <div class="fv-row w-100 flex-md-root">
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

                    <a href="<?php echo base_url();?>product/product-show" id="kt_ecommerce_add_product_cancel"
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
$(document).ready(function() {
    $('#category').select2({
        placeholder: 'Select an option',
    });
    $('#tax').select2({
        placeholder: 'Select an option',
    });
    $('#distributor').select2({
        placeholder: 'Select an option',
    });
});
KTImageInput.init();
</script>
<script>
function update_data() {
    var ops_url = baseurl + 'product/product-update';
    var category = $('#category').val();
    var name = $('#name').val();
    var code = $('#code').val();
    var tax = $('#tax').val();
    var distributor = $('#distributor').val();
    var pur_rate = $('#pur_rate').val();
    var sale_rate = $('#sale_rate').val();
    var offer = $('#offer').val();
    var description = $('#description').val();
    if (category == "") {
        Swal.fire({
            icon: 'info',
            title: '',
            text: 'Category is required.'
        });
        return false;
    }
    if (name == "") {
       Swal.fire({
            icon: 'info',
            title: '',
            text: 'Name is required.'
        });
        return false;
    }
    if (code == "") {
       Swal.fire({
            icon: 'info',
            title: '',
            text: 'Code is required.'
        });
        return false;
    }
    if (tax == "") {
       Swal.fire({
            icon: 'info',
            title: '',
            text: 'Tax is required.'
        });
        return false;
    }
    if (distributor == "") {
       Swal.fire({
            icon: 'info',
            title: '',
            text: 'Distributor is required.'
        });
        return false;
    }
    if (pur_rate == "") {
       Swal.fire({
            icon: 'info',
            title: '',
            text: 'Purchase Rate is required.'
        });
        return false;
    }
    if (sale_rate == "") {
       Swal.fire({
            icon: 'info',
            title: '',
            text: 'Sale Rate is required.'
        });
        return false;
    }
    if (offer == "") {
       Swal.fire({
            icon: 'info',
            title: '',
            text: 'Offer is required.'
        });
        return false;
    }
    var form = $("#product_update");
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
                        text: 'Product updated.'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        });
            }
            if (data.status == 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Product already Exist.'
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