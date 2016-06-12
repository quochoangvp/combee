<form id="createwidget" method="post"
    action="<?php echo site_url('api/widget/' . (isset($widget) ? 'update' : 'create')) ?>">
    <div class="cmxform form-horizontal tasi-form">
        <section class="panel">
            <header class="panel-heading">
                <?php echo isset($widget) ? 'Edit widget' : 'Add new widget' ?>
            </header>
            <div class="panel-body">
                <div class="form">
                    <?php echo $this->input->post('message') ? $this->input->post('message') : '' ?>
                    <div class="form-group ">
                        <label for="widget_title" class="control-label col-lg-2">Title</label>
                        <div class="col-lg-10">
                            <input class=" form-control" id="widget_name" name="widget_title" type="text"
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
                        <label for="theme" class="control-label col-lg-2">Theme</label>
                        <div class="col-lg-10">
                            <?php foreach ($themes as $theme): ?>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="theme[]" value="<?php echo $theme ?>" <?php echo (isset($widget) && in_array($theme, $widget['theme']))?'checked':'' ?>>
                                    <?php echo $theme ?>
                                </label>
                            </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="layout" class="control-label col-lg-2">Layout</label>
                        <div class="col-lg-10">
                            <?php foreach ($layouts as $layout_name => $layout): ?>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="layout[]" value="<?php echo $layout_name ?>" <?php echo (isset($widget) && in_array($layout_name, $widget['layout']))?'checked':'' ?>>
                                    <?php echo $layout->title ?>
                                </label>
                            </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="position_name" class="control-label col-lg-2">Position</label>
                        <div class="col-lg-10">
                            <?php foreach ($positions as $position_name => $position_title): ?>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="position_name[]" value="<?php echo $position_name ?>" <?php echo (isset($widget) && in_array($position_name, $widget['position_name']))?'checked':'' ?>>
                                    <?php echo $position_title ?>
                                </label>
                            </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="user_group_ids" class="control-label col-lg-2">User group can access</label>
                        <div class="col-lg-10">
                            <?php foreach ($user_groups as $group): ?>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="user_group_ids[]" value="<?php echo $group['group_id'] ?>" <?php echo (isset($widget) && in_array($group['group_id'], $widget['user_group_ids']))?'checked':'' ?>>
                                    <?php echo $group['group_name'] ?>
                                </label>
                            </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="type_id" class="control-label col-lg-2">Type</label>
                        <div class="col-lg-10">
                            <select name="type_id" class="form-control">
                                <?php foreach ($types as $type): ?>
                                    <option value="<?php echo $type['type_id'] ?>"><?php echo $type['type_name'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group " data-id="data_url">
                        <label for="data_url" class="control-label col-lg-2">Data url</label>
                        <div class="col-lg-10">
                            <input class=" form-control" id="data_url" name="data_url" type="text" value="<?php echo isset($widget) ? $widget['data_url'] : '' ?>" />
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
                    <div class="form-group">
                        <div class="col-lg-12">
                            <?php if (isset($widget)): ?>
                                <input type="hidden" name="widget_id" value="<?php echo $widget['widget_id'] ?>">
                            <?php endif?>
                            <button class="btn btn-primary" type="submit">Save</button>
                            <button class="btn btn-default" type="button" onclick="go_to_category_page()">Back</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</form>