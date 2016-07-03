<form id="createwidget" method="post"
    action="<?php echo site_url('api/widget/' . (isset($widget) ? 'update' : 'create')) ?>">
    <div class="cmxform form-horizontal tasi-form">
        <section class="x_panel">
            <header class="x_title">
                <h2><?php echo isset($widget) ? 'Edit widget' : 'Add new widget' ?></h2>
                <div class="clearfix"></div>
            </header>
            <div class="x_content">
                <div class="form">
                    <?php echo $this->input->post('message') ? $this->input->post('message') : '' ?>
                    <div class="form-group ">
                        <label for="widget_title" class="control-label col-lg-2">Title</label>
                        <div class="col-lg-10">
                            <input class=" form-control" id="widget_title" name="widget_title" type="text"
                            value="<?php echo isset($widget) ? $widget['widget_title'] : '' ?>" />
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="description" class="control-label col-lg-2">Description</label>
                        <div class="col-lg-10">
                            <textarea class=" form-control" id="description" name="description" rows="8"><?php echo isset($widget) ? $widget['description'] : '' ?></textarea>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="widget_name" class="control-label col-lg-2">Name (file name)</label>
                        <div class="col-lg-10">
                            <input class=" form-control" id="widget_name" name="widget_name" type="text"
                            value="<?php echo isset($widget) ? $widget['widget_name'] : '' ?>" />
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="theme" class="control-label col-lg-2">Theme</label>
                        <div class="col-lg-10">
                            <?php foreach ($themes as $theme): ?>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="theme[]" value="<?php echo $theme ?>" <?php echo (isset($widget) && in_array($theme, $widget['theme'])) ? 'checked' : '' ?>>
                                    <?php echo $theme ?>
                                </label>
                            </div>
                            <?php endforeach?>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="layout" class="control-label col-lg-2">Layout</label>
                        <div class="col-lg-10">
                            <?php foreach ($layouts as $layout_name => $layout): ?>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="layout[]" value="<?php echo $layout_name ?>" <?php echo (isset($widget) && in_array($layout_name, $widget['layout'])) ? 'checked' : '' ?>>
                                    <?php echo $layout->title ?>
                                </label>
                            </div>
                            <?php endforeach?>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="position_name" class="control-label col-lg-2">Position</label>
                        <div class="col-lg-10">
                            <?php foreach ($positions as $position_name => $position_title): ?>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="position_name[]" value="<?php echo $position_name ?>" <?php echo (isset($widget) && in_array($position_name, $widget['position_name'])) ? 'checked' : '' ?>>
                                    <?php echo $position_title ?>
                                </label>
                            </div>
                            <?php endforeach?>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="user_group_ids" class="control-label col-lg-2">User group can access</label>
                        <div class="col-lg-10">
                            <?php foreach ($user_groups as $group): ?>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="user_group_ids[]" value="<?php echo $group['group_id'] ?>" <?php echo (isset($widget) && in_array($group['group_id'], $widget['user_group_ids'])) ? 'checked' : '' ?>>
                                    <?php echo $group['group_name'] ?>
                                </label>
                            </div>
                            <?php endforeach?>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="type_id" class="control-label col-lg-2">Type</label>
                        <div class="col-lg-10">
                            <select name="type_id" class="form-control">
                                <?php foreach ($types as $type): ?>
                                    <option value="<?php echo $type['type_id'] ?>"
                                        <?php echo (isset($widget) && ($widget['type_id'] == $type['type_id'])) ? 'selected="selected"' : '' ?>>
                                        <?php echo $type['type_name'] ?>
                                    </option>
                                <?php endforeach?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="description" class="control-label col-lg-2">Image:</label>
                        <div class="col-lg-10">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                    <img id="thumbnailPreview" src="<?php echo (isset($widget['image']) && strlen($widget['image']) > 0) ? $widget['image'] : 'http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image' ?>" alt="" data-origin="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" />
                                    <input type="hidden" name="image" id="image" value="<?php echo (isset($widget['image']) && strlen($widget['image']) > 0) ? $widget['image'] : '' ?>">
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
                        <label for="is_static_content" class="control-label col-lg-2">Static content</label>
                        <div class="col-lg-10">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="y" name="is_static_content" <?php echo (isset($widget) && $widget['is_static_content'] == 'y') ? 'checked' : '' ?>>
                                    Yes
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group " data-id="content" style="display: none;">
                        <label for="content" class="control-label col-lg-2">Content</label>
                        <div class="col-lg-10">
                            <textarea class="tinymce form-control" id="content" name="content" rows="8"><?php echo isset($widget) ? $widget['content'] : '' ?></textarea>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="is_active" class="control-label col-lg-2">Active</label>
                        <div class="col-lg-10">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="y" name="is_active" <?php echo (isset($widget) && $widget['is_active'] == 'y') ? 'checked' : '' ?>>
                                    Yes
                                </label>
                            </div>
                        </div>
                    </div>
                    <?php if ((isset($widget) && $widget['type_name'] == 'media') || !isset($widget)): ?>
                        <div id="configForm">
                        <?php if (isset($widget['config']) && is_array($widget['config']) && count($widget['config']) > 0): ?>
                            <?php $index = 0;?>
                            <?php foreach ($widget['config'] as $key => $value): ?>
                                <div class="form-group">
                                    <label for="config" class="control-label col-lg-2">Configuration</label>
                                    <div class="col-lg-3">
                                        <input class=" form-control" name="config_key[]" type="text" value="<?php echo $key ?>" />
                                    </div>
                                    <div class="col-lg-6">
                                        <input class=" form-control" name="config_value[]" type="text" value="<?php echo $value ?>" />
                                    </div>
                                    <div class="col-lg-1">
                                        <?php if ($index == 0): ?>
                                            <a class="btn btn-sm btn-primary" onclick="add_config()"><i class="fa fa-plus"></i></a>
                                        <?php else: ?>
                                        <a class="btn btn-sm btn-danger" onclick="remove_config(this)"><i class="fa fa-minus"></i></a>
                                    <?php endif?>
                                    </div>
                                </div>
                            <?php $index++;?>
                            <?php endforeach?>
                        <?php else: ?>
                            <div class="form-group">
                                <label for="config" class="control-label col-lg-2">Configuration</label>
                                <div class="col-lg-3">
                                    <input class=" form-control" name="config_key[]" type="text" />
                                </div>
                                <div class="col-lg-6">
                                    <input class=" form-control" name="config_value[]" type="text" />
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-sm btn-primary" onclick="add_config()"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        <?php endif?>
                        </div>
                    <?php endif ?>
                    <hr>
                    <div class="form-group">
                        <div class="col-lg-12 text-right">
                            <?php if (isset($widget)): ?>
                                <input type="hidden" name="widget_id" value="<?php echo $widget['widget_id'] ?>">
                            <?php endif?>
                            <button class="btn btn-primary" type="submit">Save</button>
                            <button class="btn btn-default" type="button" onclick="go_to_widget_page()">Back</button>
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
                <iframe width="860" height="400" src="<?php echo base_url() ?>filemanager/dialog.php?type=2&amp;field_id=image&amp;fldr=" frameborder="0" style="overflow-x: hidden; overflow-y: scroll; "></iframe>
            </div>
        </div>
    </div>
</div>

<div id="configTemplate" style="display: none; visibility: hidden">
    <div class="form-group">
        <label for="config" class="control-label col-lg-2">Configuration</label>
        <div class="col-lg-3">
            <input class=" form-control" name="config_key[]" type="text" />
        </div>
        <div class="col-lg-6">
            <input class=" form-control" name="config_value[]" type="text" />
        </div>
        <div class="col-lg-1">
            <a class="btn btn-sm btn-danger" onclick="remove_config(this)"><i class="fa fa-minus"></i></a>
        </div>
    </div>
</div>