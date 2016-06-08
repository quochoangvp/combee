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
                        <label for="data_url" class="control-label col-lg-2">Data url</label>
                        <div class="col-lg-10">
                            <input class=" form-control" id="data_url" name="data_url" type="text" value="<?php echo isset($widget) ? $widget['data_url'] : '' ?>" />
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="description" class="control-label col-lg-2">Description</label>
                        <div class="col-lg-10">
                            <textarea class=" form-control" id="description" name="description" rows="8"><?php echo isset($widget) ? $widget['description'] : '' ?></textarea>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="content" class="control-label col-lg-2">Content</label>
                        <div class="col-lg-10">
                            <textarea class="tinymce form-control" id="content" name="content" rows="8"><?php echo isset($widget) ? $widget['content'] : '' ?></textarea>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="theme" class="control-label col-lg-2">Theme</label>
                        <div class="col-lg-10">
                            <select name="theme[]" class="form-control" multiple="">
                                <?php foreach ($themes as $theme): ?>
                                    <option value="<?php echo $theme ?>"><?php echo $theme?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="layout" class="control-label col-lg-2">Layout</label>
                        <div class="col-lg-10">
                            <select name="layout[]" class="form-control" multiple="">
                                <?php foreach ($elements->layouts as $layout_name => $layout): ?>
                                    <option value="<?php echo $layout_name ?>"><?php echo $layout->title ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <?php foreach ($elements->layouts as $layout_name => $layout): ?>
                    <div class="form-group " data-layout="<?php echo $layout_name ?>" style="display: none">
                        <label for="position_name" class="control-label col-lg-2">Position (<?php echo $layout_name; ?>)</label>
                        <div class="col-lg-10">
                            <select name="position_name[]" class="form-control">
                                <?php foreach ($layout->positions as $position_name => $position_title): ?>
                                    <option value="<?php echo $position_name ?>"><?php echo $position_title ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <?php endforeach ?>
                    <div class="form-group ">
                        <label for="user_group_ids" class="control-label col-lg-2">User group can access</label>
                        <div class="col-lg-10">
                            <select name="user_group_ids[]" class="form-control">
                                <?php foreach ($user_groups as $group): ?>
                                    <option value="<?php echo $group['group_id'] ?>"><?php echo $group['group_name'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="is_active" class="control-label col-lg-2">Status</label>
                        <div class="col-lg-10">
                            <select name="is_active" class="form-control">
                                <option value="y">Active</option>
                                <option value="n">Deactive</option>
                            </select>
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