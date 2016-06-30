<section class="panel">
    <header class="panel-heading">
        <?php echo isset($brand) ? 'Edit brand <b>' . $brand['brand_name'] . '</b>' : 'Add new brand' ?>
    </header>
    <div class="panel-body">
        <div class="form">
            <form class="cmxform form-horizontal tasi-form" id="createbrand" method="post"
                action="<?php echo site_url('api/product/brand') ?>">
                <?php echo $this->input->post('message') ? $this->input->post('message') : '' ?>
                <div class="form-group ">
                    <label for="description" class="control-label col-lg-2">Logo:</label>
                    <div class="col-lg-10">
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                <img id="thumbnailPreview" src="<?php echo (isset($brand['brand_logo']) && strlen($brand['brand_logo']) > 0) ? $brand['brand_logo'] : 'http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image' ?>" alt="" data-origin="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" />
                                <input type="hidden" name="brand_logo" id="thumbnail" value="<?php echo (isset($brand['brand_logo']) && strlen($brand['brand_logo']) > 0) ? $brand['brand_logo'] : '' ?>">
                            </div>
                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                            <div class="btn-group-file">
                                <span class="btn btn-white btn-file">
                                    <a data-toggle="modal" href="javascript:;" data-target="#thumbnailModal" class="fileupload-new"><i class="icon-paper-clip"></i> Select image</a>
                                    <a data-toggle="modal" href="javascript:;" data-target="#thumbnailModal" class="fileupload-exists"><i class="icon-undo"></i> Change</a>
                                </span>
                                <a href="javascript:;" class="btn btn-danger fileupload-exists" onclick="removeThumbnail()"><i class="icon-trash"></i> Remove</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group ">
                    <label for="brand_name" class="control-label col-lg-2">Name</label>
                    <div class="col-lg-10">
                        <input class=" form-control" id="brand_name" name="brand_name" type="text"
                                value="<?php echo isset($brand) ? $brand['brand_name'] : '' ?>" />
                    </div>
                </div>
                <div class="form-group ">
                    <label for="description" class="control-label col-lg-2">Description</label>
                    <div class="col-lg-10">
                        <textarea class="form-control" id="description" name="description" rows="8"><?php echo isset($brand) ? $brand['description'] : '' ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <?php if (isset($brand)): ?>
                            <input type="hidden" name="brand_id" value="<?php echo $brand['brand_id'] ?>">
                        <?php endif ?>
                        <button class="btn btn-primary" type="submit">Save</button>
                        <button class="btn btn-default" type="button" onclick="go_to_brand_page()">Back</button>
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