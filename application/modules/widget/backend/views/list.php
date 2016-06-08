<section class="panel">
    <header class="panel-heading">
        <h4>
            All widgets
            <span class="pull-right">
                <a href="<?php echo admin_url('widget/create') ?>" class="btn btn-sm btn-primary">Add new</a>
            </span>
        </h4>
    </header>
    <div class="panel-body">
        <div class="adv-table">
            <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                    <tr>
                        <th class="w5">No</th>
                        <th>Title</th>
                        <th class="w12">Type</th>
                        <th class="w12">Position</th>
                        <th class="w12">Theme</th>
                        <th class="w12">Layout</th>
                        <th>Status</th>
                        <th class="w8">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($widgets as $index => $widget): ?>
                        <tr>
                            <td><?php echo $index + 1 + $offset ?></td>
                            <td><?php echo $widget['widget_title'] ?></td>
                            <td><?php echo $widget['type_title'] ?></td>
                            <td><?php echo $widget['position_name'] ?></td>
                            <td><?php echo $widget['theme'] ?></td>
                            <td><?php echo $widget['layout'] ?></td>
                            <td><?php echo ($widget['is_active'] == 'y')?'<span class="label label-mini label-success">Show</span>':'<span class="label label-mini label-default">Hide</span>' ?></td>
                            <td class="text-center">
                                <a class="btn btn-primary btn-xs" href="<?php echo admin_url('widget/edit/' . $widget['widget_id']) ?>">
                                    <i class="icon-pencil"></i>
                                </a>
                                <button class="btn btn-danger btn-xs"><i class="icon-trash "></i></button>
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
