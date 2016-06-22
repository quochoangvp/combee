<section class="panel">
    <header class="panel-heading">
        All supporter
    </header>
    <div class="panel-body">
        <div class="adv-table">
            <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                    <tr>
                        <th class="w5">No</th>
                        <th>Email</th>
                        <th>Full name</th>
                        <th class="w8">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($widget['users'] as $index => $user): ?>
                        <tr>
                            <td><?php echo $index + 1 ?></td>
                            <td><?php echo $user['user_email'] ?></td>
                            <td><?php echo $user['full_name'] ?></td>
                            <td class="text-center">
                                <a class="btn btn-primary btn-xs" href="<?php echo admin_url('user/edit/' . $user['user_id']) ?>">
                                    <i class="icon-pencil"></i>
                                </a>
                                <button class="btn btn-danger btn-xs" onclick="delete_user(<?php echo $user['user_id'] ?>)"><i class="icon-trash "></i></button>
                            </td>
                        </tr>
                    <?php endforeach?>
                </tbody>
            </table>

        </div>
    </div>
</section>
<!-- page end-->
