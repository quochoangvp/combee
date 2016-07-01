<section class="panel tasks-widget">
    <header class="x_title">
        All categories
    </header>
    <div class="x_content">
        <div class="task-content">
            <ul id="attributeList" class="ui-sortable">
                <?php foreach ($attributes as $group): ?>
                    <li class="list-inverse">
                        <div class="task-title">
                            <span class="task-title-sp"><strong><?php echo $group['group_name'] ?></strong></span>
                            <div class="pull-right hidden-phone">
                                <button class="btn btn-primary btn-xs icon-pencil" onclick="open_edit_group_popup(<?php echo $group['group_id'] ?>)"></button>
                                <button class="btn btn-danger btn-xs icon-trash" onclick="confirm_delete_group(<?php echo $group['group_id'] ?>)"></button>
                            </div>
                        </div>
                    </li>
                    <?php if (isset($group['children'])): ?>
                        <?php foreach ($group['children'] as $attr): ?>
                            <li class="list-inverse">
                                <div class="task-title">
                                    <span class="task-title-sp"> ---- <?php echo $attr['attr_name'] ?></span>
                                    <div class="pull-right hidden-phone">
                                        <button class="btn btn-primary btn-xs icon-pencil" onclick="open_edit_attr_popup(<?php echo $attr['attr_id'] ?>)"></button>
                                        <button class="btn btn-danger btn-xs icon-trash" onclick="confirm_delete_attr(<?php echo $attr['attr_id'] ?>)"></button>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach ?>
                    <?php endif ?>
                <?php endforeach ?>
            </ul>
        </div>
        <div class=" add-task-row">
            <a class="btn btn-success btn-sm pull-left" href="javascript:;" onclick="open_create_attr_popup()">Add New Attribute</a>
            <a class="btn btn-success btn-sm pull-left" style="margin-left: 5px;" href="javascript:;" onclick="open_create_group_popup()">Add New Group</a>
        </div>
    </div>
</section>

<div class="modal fade" id="group_form">
    <div class="modal-dialog">
        <form class="cmxform form-horizontal tasi-form" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <div class="form-message"></div>
                    <div class="form-group ">
                        <label for="group_name" class="control-label col-lg-2">Name</label>
                        <div class="col-lg-10">
                            <input class=" form-control" id="group_name" name="group_name" type="text" value="" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="group_id" value="">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" data-loading-text="Saving...">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="attribute_form">
    <div class="modal-dialog">
        <form class="cmxform form-horizontal tasi-form" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <div class="form-message"></div>
                    <div class="form-group ">
                        <label for="attr_name" class="control-label col-lg-2">Name</label>
                        <div class="col-lg-10">
                            <input class=" form-control" id="attr_name" name="attr_name" type="text" value="" />
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="attr_name" class="control-label col-lg-2">Group</label>
                        <div class="col-lg-10">
                            <select name="group_id" class="form-control">
                                <?php foreach ($groups as $group): ?>
                                    <option value="<?php echo $group['group_id'] ?>"><?php echo $group['group_name'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="attr_id" value="">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" data-loading-text="Saving...">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>