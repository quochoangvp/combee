<form id="userForm" method="post" action="<?php echo site_url('api/user/' . (isset($user) ? 'update' : 'create')) ?>">
    <div class="cmxform form-horizontal tasi-form">
        <section class="x_panel">
            <header class="x_title">
                <h2>
                    <?php echo isset($user) ? 'Edit user' : 'Add new user' ?>
                </h2>
                <div class="clearfix"></div>
            </header>
            <div class="x_content">
                <div class="form">
                    <?php echo $this->input->post('message') ? $this->input->post('message') : '' ?>
                    <div class="form-group ">
                            <label for="description" class="control-label col-lg-2">Avatar:</label>
                            <div class="col-lg-10">
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                        <img id="thumbnailPreview" src="<?php echo (isset($user['avatar']) && strlen($user['avatar']) > 0) ? $user['avatar'] : 'http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image' ?>" alt="" data-origin="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" />
                                        <input type="hidden" name="avatar" id="thumbnail" value="<?php echo (isset($user['avatar']) && strlen($user['avatar']) > 0) ? $user['avatar'] : '' ?>">
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
                        <label for="user_email" class="control-label col-lg-2">Email</label>
                        <div class="col-lg-10">
                            <input class=" form-control" id="user_email" name="user_email" type="text"
                            value="<?php echo isset($user) ? $user['user_email'] : '' ?>" />
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="user_pass" class="control-label col-lg-2">Password</label>
                        <div class="col-lg-10">
                            <input class=" form-control" id="user_pass" name="user_pass" type="password" value="" />
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="full_name" class="control-label col-lg-2">Full name</label>
                        <div class="col-lg-10">
                            <input class=" form-control" id="full_name" name="full_name" type="text" value="<?php echo isset($user) ? $user['full_name'] : '' ?>" />
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="join_date" class="control-label col-lg-2">Join date</label>
                        <div class="col-lg-10">
                            <input class="form_datetime form-control" id="join_date" name="join_date" type="text" value="<?php echo isset($user) ? $user['join_date'] : '' ?>" />
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="last_active" class="control-label col-lg-2">Last active</label>
                        <div class="col-lg-10">
                            <input class="form_datetime form-control" id="last_active" name="last_active" type="text" value="<?php echo isset($user) ? $user['last_active'] : '' ?>" />
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="status" class="control-label col-lg-2">Status</label>
                        <div class="col-lg-10">
                            <select name="status" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Deactive</option>
                                <option value="2">Block</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="group_id" class="control-label col-lg-2">Group</label>
                        <div class="col-lg-10">
                            <select name="group_id" class="form-control">
                                <?php foreach ($groups as $group): ?>
                                    <option value="<?php echo $group['group_id'] ?>"><?php echo $group['group_name'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12">
                            <?php if (isset($user)): ?>
                                <input type="hidden" name="user_id" value="<?php echo $user['user_id'] ?>">
                            <?php endif?>
                            <button class="btn btn-primary" type="submit">Save</button>
                            <button class="btn btn-default" type="button" onclick="go_to_user_page()">Back</button>
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
                <iframe width="860" height="400" src="<?php echo base_url() ?>filemanager/dialog.php?type=2&amp;field_id=thumbnail'&amp;fldr=" frameborder="0" style="overflow-x: hidden; overflow-y: scroll; "></iframe>
            </div>
        </div>
    </div>
</div>