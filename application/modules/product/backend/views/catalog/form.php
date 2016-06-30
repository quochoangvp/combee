<section class="panel">
    <header class="panel-heading">
        <?php echo isset($catalog) ? 'Edit catalog <b>' . $catalog['catalog_name'] . '</b>' : 'Add new catalog' ?>
    </header>
    <div class="panel-body">
        <div class="form">
            <form class="cmxform form-horizontal tasi-form" id="createCategory" method="post"
                action="<?php echo site_url('api/product/catalog') ?>">
                <?php echo $this->input->post('message') ? $this->input->post('message') : '' ?>
                <div class="form-group ">
                    <label for="description" class="control-label col-lg-2">Logo:</label>
                    <div class="col-lg-10">
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                <img id="thumbnailPreview" src="<?php echo (isset($catalog['catalog_image']) && strlen($catalog['catalog_image']) > 0) ? $catalog['catalog_image'] : 'http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image' ?>" alt="" data-origin="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" />
                                <input type="hidden" name="catalog_image" id="thumbnail" value="<?php echo (isset($catalog['catalog_image']) && strlen($catalog['catalog_image']) > 0) ? $catalog['catalog_image'] : '' ?>">
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
                    <label for="catalog_name" class="control-label col-lg-2">Name</label>
                    <div class="col-lg-10">
                        <input class=" form-control" id="catalog_name" name="catalog_name" type="text"
                                value="<?php echo isset($catalog) ? $catalog['catalog_name'] : '' ?>"
                                onfocusout="general_slug(this, 'catalog_url')" />
                    </div>
                </div>
                <div class="form-group ">
                    <label for="catalog_url" class="control-label col-lg-2">Url</label>
                    <div class="col-lg-10">
                        <input class=" form-control" id="catalog_url" name="catalog_url" type="text" value="<?php echo isset($catalog) ? $catalog['catalog_url'] : '' ?>" />
                    </div>
                </div>
                <div class="form-group ">
                    <label for="description" class="control-label col-lg-2">Description</label>
                    <div class="col-lg-10">
                        <textarea class="form-control tinymce" id="description" name="description"><?php echo isset($catalog) ? $catalog['description'] : '' ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="parent_id" class="control-label col-lg-2">Parent</label>
                    <div class="col-lg-10">
                        <select class="form-control" name="parent_id" id="parent_id" data-select="<?php echo isset($catalog) ? $catalog['parent_id'] : '' ?>">
                            <option value="">Select a parent</option>
                            <option value="0">Root</option>
                            <?php echo general_option_nested($catalog_nested, 'catalog_id', 'catalog_name'); ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <?php if (isset($catalog)): ?>
                            <input type="hidden" name="catalog_id" value="<?php echo $catalog['catalog_id'] ?>">
                        <?php endif ?>
                        <button class="btn btn-primary" type="submit">Save</button>
                        <button class="btn btn-default" type="button" onclick="go_to_catalog_page()">Back</button>
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