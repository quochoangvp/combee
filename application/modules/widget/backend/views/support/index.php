<section class="x_panel">
    <header class="x_title">
        <h2>
            All supporter
            <span class="pull-right">
                <a href="javascript:;" onclick="add_new_supporter()" class="btn btn-sm btn-primary">Change</a>
                <a href="<?php echo admin_url('widget') ?>" class="btn btn-sm btn-default"><i class="fa fa-angle-left"></i> Back</a>
                <input type="hidden" name="widget_id" value="<?php echo $widget['widget_id'] ?>" />
            </span>
        </h2>
        <div class="clearfix"></div>
    </header>
    <div class="x_content">
        <div class="adv-table">
            <table cellpadding="0" cellspacing="0" border="0" class="table table-hover"
                   id="hidden-table-info">
                <thead>
                <tr>
                    <th class="w5">No</th>
                    <th>Email</th>
                    <th>Full name</th>
                </tr>
                </thead>
                <tbody>
                <?php $supporter_ids = []; ?>
                <?php foreach ($widget['supporters'] as $index => $user): ?>
                    <?php $supporter_ids[] = $user['user_id']; ?>
                    <tr data-id="<?php echo $user['user_id'] ?>">
                        <td><?php echo $index + 1 ?></td>
                        <td><?php echo $user['user_email'] ?></td>
                        <td><?php echo $user['full_name'] ?></td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>

        </div>
    </div>
</section>
<!-- page end-->

<div class="modal fade" id="selectSupporter">
    <div class="modal-dialog">
        <form action="" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Choose some users</h4>
                </div>
                <div class="modal-body">
                    <?php foreach ($widget['users'] AS $user): ?>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="users[]" value="<?php echo $user['user_id'] ?>">
                                <?php echo $user['full_name'] ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </form>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->