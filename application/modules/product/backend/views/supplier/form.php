<section class="x_panel">
    <header class="x_title">
        <?php echo isset($supplier) ? 'Edit supplier <b>' . $supplier['supplier_name'] . '</b>' : 'Add new supplier' ?>
    </header>
    <div class="x_content">
        <div class="form">
            <form class="cmxform form-horizontal tasi-form" id="createsupplier" method="post"
                action="<?php echo site_url('api/product/supplier') ?>">
                <?php echo $this->input->post('message') ? $this->input->post('message') : '' ?>
                <div class="form-group ">
                    <label for="description" class="control-label col-lg-2">Logo:</label>
                    <div class="col-lg-10">
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                <img id="thumbnailPreview" src="<?php echo (isset($supplier['supplier_logo']) && strlen($supplier['supplier_logo']) > 0) ? $supplier['supplier_logo'] : 'http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image' ?>" alt="" data-origin="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" />
                                <input type="hidden" name="supplier_logo" id="thumbnail" value="<?php echo (isset($supplier['supplier_logo']) && strlen($supplier['supplier_logo']) > 0) ? $supplier['supplier_logo'] : '' ?>">
                            </div>
                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                            <div class="btn-group-file">
                                <span class="btn btn-white btn-file">
                                    <a data-toggle="modal" href="javascript:;" data-target="#thumbnailModal" class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</a>
                                    <a data-toggle="modal" href="javascript:;" data-target="#thumbnailModal" class="fileupload-exists"><i class="fa fa-undo"></i> Change</a>
                                </span>
                                <a href="javascript:;" class="btn btn-danger fileupload-exists" onclick="removeThumbnail()"><i class="fa fa-trash"></i> Remove</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group ">
                    <label for="supplier_name" class="control-label col-lg-2">Name</label>
                    <div class="col-lg-10">
                        <input class=" form-control" id="supplier_name" name="supplier_name" type="text"
                                value="<?php echo isset($supplier) ? $supplier['supplier_name'] : '' ?>" />
                    </div>
                </div>
                <div class="form-group ">
                    <label for="supplier_email" class="control-label col-lg-2">Email</label>
                    <div class="col-lg-10">
                        <input class=" form-control" id="supplier_email" name="supplier_email" type="email" value="<?php echo isset($supplier) ? $supplier['supplier_email'] : '' ?>" />
                    </div>
                </div>
                <div class="form-group ">
                    <label for="supplier_phone" class="control-label col-lg-2">Phone number</label>
                    <div class="col-lg-10">
                        <input name="supplier_phone" id="supplier_phone" class="form-control" type="text" value="<?php echo isset($supplier) ? $supplier['supplier_phone'] : '' ?>" />
                    </div>
                </div>
                <div class="form-group ">
                    <label for="supplier_address" class="control-label col-lg-2">Address</label>
                    <div class="col-lg-10">
                        <input class=" form-control" id="supplier_address" name="supplier_address" type="text"
                                value="<?php echo isset($supplier) ? $supplier['supplier_address'] : '' ?>" />
                    </div>
                </div>
                <div class="form-group ">
                    <label for="description" class="control-label col-lg-2">Description</label>
                    <div class="col-lg-10">
                        <textarea class="form-control" id="description" name="description" rows="8"><?php echo isset($supplier) ? $supplier['description'] : '' ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <?php if (isset($supplier)): ?>
                            <input type="hidden" name="supplier_id" value="<?php echo $supplier['supplier_id'] ?>">
                        <?php endif ?>
                        <button class="btn btn-primary" type="submit">Save</button>
                        <button class="btn btn-default" type="button" onclick="go_to_supplier_page()">Back</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<div class="modal fade" id="thumbnailModal">
    <div class="modal-dialog" style="width: 900px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Select a image</h4>
            </div>
            <div class="modal-body">
                <iframe width="860" height="400" src="<?php echo base_url() ?>filemanager/dialog.php?type=2&amp;field_id=thumbnail'&amp;fldr=" frameborder="0" style="overflow-x: hidden; overflow-y: scroll; "></iframe>
            </div>
        </div>
    </div>
</div>