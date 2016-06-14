<form id="creategallery" method="post"
    action="<?php echo site_url('api/gallery/' . (isset($gallery) ? 'update' : 'create')) ?>">
    <div class="cmxform form-horizontal tasi-form">
        <section class="panel">
            <header class="panel-heading">
                <?php echo isset($gallery) ? 'Edit gallery' : 'Add new gallery' ?>
            </header>
            <div class="panel-body">
                <div class="form">
                    <?php echo $this->input->post('message') ? $this->input->post('message') : '' ?>
                    <div class="form-group ">
                        <label for="gallery_title" class="control-label col-lg-2">Title</label>
                        <div class="col-lg-10">
                            <input class=" form-control" id="gallery_name" name="gallery_title" type="text"
                            value="<?php echo isset($gallery) ? $gallery['gallery_title'] : '' ?>" />
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="description" class="control-label col-lg-2">Description</label>
                        <div class="col-lg-10">
                            <textarea class=" form-control" id="description" name="description" rows="8"><?php echo isset($gallery) ? $gallery['description'] : '' ?></textarea>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="description" class="control-label col-lg-2">Image:</label>
                        <div class="col-lg-10">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                    <img id="thumbnailPreview" src="<?php echo (isset($gallery['thumbnail']) && strlen($gallery['thumbnail']) > 0) ? $gallery['thumbnail'] : 'http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image' ?>" alt="" data-origin="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" />
                                    <input type="hidden" name="thumbnail" id="thumbnail" value="<?php echo (isset($gallery['thumbnail']) && strlen($gallery['thumbnail']) > 0) ? $gallery['thumbnail'] : '' ?>">
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
                        <label for="type" class="control-label col-lg-2">Type</label>
                        <div class="col-lg-10">
                            <select name="type" class="form-control" name="type">
                                <option value="default">Default</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="is_active" class="control-label col-lg-2">Active</label>
                        <div class="col-lg-10">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="y" name="is_active" <?php echo (isset($gallery) && $gallery['is_active'] == 'y') ? 'checked' : '' ?>>
                                    Yes
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12">
                            <?php if (isset($gallery)): ?>
                                <input type="hidden" name="gallery_id" value="<?php echo $gallery['gallery_id'] ?>">
                            <?php endif?>
                            <button class="btn btn-primary" type="submit">Save</button>
                            <button class="btn btn-default" type="button" onclick="go_to_gallery_page()">Back</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</form>
<div class="modal fade" id="thumbnailModal">
    <div class="modal-dialog" style="width: 900px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Select a image</h4>
            </div>
            <div class="modal-body">
                <iframe width="860" height="400" src="<?php echo base_url() ?>filemanager/dialog.php?type=2&amp;field_id=thumbnail&amp;fldr=" frameborder="0" style="overflow-x: hidden; overflow-y: scroll; "></iframe>
            </div>
        </div>
    </div>
</div>