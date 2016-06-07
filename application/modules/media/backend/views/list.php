<section class="panel">
    <header class="panel-heading">
        <h4>
            All media
            <span class="pull-right">
                <a href="<?php echo admin_url('media/create') ?>" class="btn btn-sm btn-primary">Add new</a>
            </span>
        </h4>
    </header>
    <div class="panel-body">
        <div class="adv-table">
            <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                    <tr>
                        <th class="w5">No</th>
                        <th>Thumbnail</th>
                        <th>Title</th>
                        <th>Position</th>
                        <th>Status</th>
                        <th class="w8">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($all_media as $index => $media): ?>
                        <tr>
                            <td><?php echo $index + 1 + $offset ?></td>
                            <td><?php echo ($media['media_thumbnail']&&strlen($media['media_thumbnail'])>0)?"<img src=\"{$media['media_thumbnail']}\" alt=\"\" />":'' ?></td>
                            <td><?php echo $media['media_title'] ?></td>
                            <td><?php echo $media['position'] ?></td>
                            <td><?php echo ($media['is_show'] == 'y') ? '<span class="label label-sm label-success">Show</span>' : '<span class="label label-sm label-default">Hide</span>' ?></td>
                            <td class="text-center">
                                <a class="btn btn-primary btn-xs" href="<?php echo admin_url('media/edit/' . $media['media_id']) ?>">
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
