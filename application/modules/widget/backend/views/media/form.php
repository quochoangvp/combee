<form id="mediaForm" method="post"
    action="<?php echo site_url('api/widget/media') ?>">
    <div class="cmxform form-horizontal tasi-form">
        <section class="panel">
            <header class="panel-heading">
                <?php echo isset($media) ? 'Edit media' : 'Add new media' ?>
            </header>
            <div class="panel-body">
                <div class="form">
                    <?php echo $this->input->post('message') ? $this->input->post('message') : '' ?>
                    <div class="form-group ">
                        <label for="media_title" class="control-label col-lg-2">Title</label>
                        <div class="col-lg-10">
                            <input class=" form-control" id="media_title" name="media_title" type="text"
                            value="<?php echo isset($media) ? $media['media_title'] : '' ?>"/>
                        </div>
                    </div>
                    <div class="form-group thumbnail-group">
                        <label for="thumbnail" class="control-label col-lg-2">Thumbnail</label>
                        <div class="col-lg-10">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                    <img id="thumbnailPreview" src="<?php echo (isset($media['thumbnail']) && strlen($media['thumbnail']) > 0) ? $media['thumbnail'] : 'http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image' ?>" alt="" data-origin="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" />
                                    <input type="hidden" name="thumbnail" id="thumbnail" value="<?php echo (isset($media['thumbnail']) && strlen($media['thumbnail']) > 0) ? $media['thumbnail'] : '' ?>">
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
                    <div class="form-group media-url-group">
                        <label for="media_url" class="control-label col-lg-2">Url</label>
                        <div class="col-lg-10">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                    <img id="urlPreview" src="<?php echo (isset($media['media_url']) && strlen($media['media_url']) > 0) ? $media['media_url'] : 'http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image' ?>" alt="" data-origin="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" />
                                    <input type="hidden" name="media_url" id="media_url" value="<?php echo (isset($media['media_url']) && strlen($media['media_url']) > 0) ? $media['media_url'] : '' ?>">
                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div class="btn-group-file">
                                    <span class="btn btn-white btn-file">
                                        <a data-toggle="modal" href="javascript:;" data-target="#mediaUrlModal" class="fileupload-new"><i class="icon-paper-clip"></i> Select image</a>
                                        <a data-toggle="modal" href="javascript:;" data-target="#mediaUrlModal" class="fileupload-exists"><i class="icon-undo"></i> Change</a>
                                    </span>
                                    <a href="javascript:;" class="btn btn-danger fileupload-exists" onclick="removeMediaUrl()"><i class="icon-trash"></i> Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="media_link" class="control-label col-lg-2">Link</label>
                        <div class="col-lg-10">
                            <input class=" form-control" id="media_link" name="media_link" type="text" value="<?php echo isset($media) ? $media['media_link'] : '' ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="control-label col-lg-12" style="margin-bottom: 12px;">Description</label>
                        <div class="col-lg-12">
                            <textarea class="form-control tinymce" id="description" name="description"><?php echo isset($media) ? $media['description'] : '' ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12">
                            <div class="checkboxes">
                                <label class="label_check" for="is_active">
                                    <input name="is_active" id="is_active" value="y" type="checkbox" <?php echo (isset($media['is_active']) && $media['is_active'] == 'y') ? 'checked' : '' ?> />
                                    Activated
                                </label>
                            </div>
                        </div>
                    </div>
                    <div id="configForm">
                    <?php if (isset($media['media_config']) && is_array($media['media_config']) && count($media['media_config']) > 0): ?>
                        <?php $index = 0;?>
                        <?php foreach ($media['media_config'] as $key => $value): ?>
                            <div class="form-group">
                                <label for="media_config" class="control-label col-lg-2">Configuration</label>
                                <div class="col-lg-3">
                                    <input class=" form-control" name="media_config_key[]" type="text" value="<?php echo $key ?>" />
                                </div>
                                <div class="col-lg-6">
                                    <input class=" form-control" name="media_config_value[]" type="text" value="<?php echo $value ?>" />
                                </div>
                                <div class="col-lg-1">
                                    <?php if ($index == 0): ?>
                                        <a class="btn btn-sm btn-primary" onclick="add_config()"><i class="icon-plus"></i></a>
                                    <?php else: ?>
                                    <a class="btn btn-sm btn-danger" onclick="remove_config(this)"><i class="icon-minus"></i></a>
                                <?php endif?>
                                </div>
                            </div>
                        <?php $index++;?>
                        <?php endforeach?>
                    <?php else: ?>
                        <div class="form-group">
                            <label for="media_config" class="control-label col-lg-2">Configuration</label>
                            <div class="col-lg-3">
                                <input class=" form-control" name="media_config_key[]" type="text" />
                            </div>
                            <div class="col-lg-6">
                                <input class=" form-control" name="media_config_value[]" type="text" />
                            </div>
                            <div class="col-lg-1">
                                <a class="btn btn-sm btn-primary" onclick="add_config()"><i class="icon-plus"></i></a>
                            </div>
                        </div>
                    <?php endif?>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-lg-12">
                            <input type="hidden" name="widget_id" value="<?php echo $widget['widget_id'] ?>">
                            <?php if (isset($media)): ?>
                                <input type="hidden" name="media_id" value="<?php echo $media['media_id'] ?>">
                            <?php endif?>
                            <button class="btn btn-primary" type="submit">Save</button>
                            <button class="btn btn-default" type="button" onclick="go_to_widget_details_page(<?php echo $widget['widget_id'] ?>)">Back</button>
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
                <iframe width="860" height="400" src="<?php echo base_url() ?>filemanager/dialog.php?type=2&amp;field_id=thumbnail" frameborder="0" style="overflow-x: hidden; overflow-y: scroll; "></iframe>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="mediaUrlModal">
    <div class="modal-dialog" style="width: 900px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Select a image</h4>
            </div>
            <div class="modal-body">
                <iframe width="860" height="400" src="<?php echo base_url() ?>filemanager/dialog.php?type=2&amp;field_id=media_url" frameborder="0" style="overflow-x: hidden; overflow-y: scroll; "></iframe>
            </div>
        </div>
    </div>
</div>
<div id="configTemplate" style="display: none; visibility: hidden">
    <div class="form-group">
        <label for="media_config" class="control-label col-lg-2">Configuration</label>
        <div class="col-lg-3">
            <input class=" form-control" name="media_config_key[]" type="text" />
        </div>
        <div class="col-lg-6">
            <input class=" form-control" name="media_config_value[]" type="text" />
        </div>
        <div class="col-lg-1">
            <a class="btn btn-sm btn-danger" onclick="remove_config(this)"><i class="icon-minus"></i></a>
        </div>
    </div>
</div>