<section class="panel">
    <header class="panel-heading">
        <h4>All user groups
            <div class="pull-right">
                <a class="btn btn-sm btn-primary open-create-form" data-toggle="modal" href="#groupForm">Add new</a>
            </div>
        </h4>
    </header>
    <div class="panel-body">
        <div class="adv-table">
            <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                    <tr>
                        <th class="w5">No</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th class="w8">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($groups as $index => $group): ?>
                        <tr>
                            <td><?php echo $index + 1 ?></td>
                            <td><?php echo $group['group_name'] ?></td>
                            <td><?php echo ($group['status']==0)?'Deactived':'Actived' ?></td>
                            <td class="text-center">
                                <a class="btn btn-primary btn-xs" href="javascript:;" onclick="open_group_edit_popup(<?php echo $group['group_id'] ?>)">
                                    <i class="icon-pencil"></i>
                                </a>
                                <button class="btn btn-danger btn-xs" onclick="delete_group(<?php echo $group['group_id'] ?>)"><i class="icon-trash "></i></button>
                            </td>
                        </tr>
                    <?php endforeach?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<!-- page end-->
<div class="modal fade" id="groupForm">
    <div class="modal-dialog">
        <form class="cmxform form-horizontal tasi-form" method="post"
            data-action-create="<?php echo site_url('api/user/group_create') ?>"
            data-action-update="<?php echo site_url('api/user/group_update') ?>">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add new group</h4>
                </div>
                <div class="modal-body">
                    <div class="form-message"></div>
                    <div class="form-group ">
                        <label for="group_name" class="control-label col-lg-2">Name</label>
                        <div class="col-lg-10">
                            <input class=" form-control" id="group_name" name="group_name" type="text" value="" />
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="permission" class="control-label col-lg-2">Permission</label>
                        <div class="col-lg-10">
                            <textarea rows="8" name="permission" class="form-control" id="permission"></textarea>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="status" class="control-label col-lg-2">Status</label>
                        <div class="col-lg-10">
                            <select class="form-control" name="status" id="status">
                                <option value="1">Active</option>
                                <option value="0">Deactive</option>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="group_id" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>