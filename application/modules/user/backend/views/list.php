<section class="x_panel">
    <header class="x_title">
        <h2>
            All users
        </h2>
        <div class="clearfix"></div>
    </header>
    <div class="x_content">
        <div class="adv-table">
            <table cellpadding="0" cellspacing="0" border="0" class="table table-hover" id="hidden-table-info">
                <thead>
                    <tr>
                        <th class="w5">No</th>
                        <th>Email</th>
                        <th>Full name</th>
                        <th class="w12">Group</th>
                        <th>Join date</th>
                        <th>Last active</th>
                        <th>Status</th>
                        <th class="w8">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $index => $user): ?>
                        <tr>
                            <td><?php echo $index + 1 + $offset ?></td>
                            <td><?php echo $user['user_email'] ?></td>
                            <td><?php echo $user['full_name'] ?></td>
                            <td><?php echo $user['group_name'] ?></td>
                            <td><?php echo $user['join_date'] ?></td>
                            <td><?php echo $user['last_active'] ?></td>
                            <td><?php echo ($user['status']==0)?'Deactived':($user['status']==1)?'Actived':'Locked' ?></td>
                            <td class="text-center">
                                <a class="btn btn-primary btn-xs" href="<?php echo admin_url('user/edit/' . $user['user_id']) ?>">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <button class="btn btn-danger btn-xs" onclick="delete_user(<?php echo $user['user_id'] ?>)"><i class="fa fa-trash "></i></button>
                            </td>
                        </tr>
                    <?php endforeach?>
                </tbody>
            </table>
            <div class="row">
                <div class="col-lg-6">
                    <div class="dataTables_info" id="editable-sample_info">Showing <?php echo $offset + 1 ?> to <?php echo ($offset + $limit < $total_rows)?($offset + $limit):$total_rows ?> of <?php echo $total_rows ?> entries</div>
                </div>
                <div class="col-lg-6">
                    <div class="dataTables_paginate paging_bootstrap pagination">
                        <?php echo $this->pagination->create_links(); ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- page end-->
