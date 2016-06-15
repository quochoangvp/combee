<section class="panel">
    <header class="panel-heading">
        <h4>
            All galleries
            <span class="pull-right">
                <a href="<?php echo admin_url('gallery/create') ?>" class="btn btn-sm btn-primary">Add new</a>
            </span>
        </h4>
    </header>
    <div class="panel-body">
        <div class="adv-table">
        <?php if (is_array($galleries)): ?>
            <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                    <tr>
                        <th class="w5">No</th>
                        <th>Title</th>
                        <th>Thumbnail</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th class="w8">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($galleries as $index => $gallery): ?>
                        <tr>
                            <td><?php echo $index + 1 + $offset ?></td>
                            <td>
                                <a href="<?php echo admin_url('gallery/media/list/' . $gallery['gallery_id']) ?>">
                                    <?php echo $gallery['gallery_title'] ?>
                                </a>
                            </td>
                            <td><?php echo (strlen($gallery['thumbnail'])>0)?'<img height="60px" src="' . site_url($gallery['thumbnail']) . '" alt="" />':'' ?></td>
                            <td><?php echo ucfirst($gallery['type']) ?></td>
                            <td class="center"><?php echo ($gallery['is_active'] == 'y') ? '<span class="label label-mini label-success">Show</span>' : '<span class="label label-mini label-default">Hide</span>' ?></td>
                            <td class="text-center">
                                <a class="btn btn-primary btn-xs" href="<?php echo admin_url('gallery/edit/' . $gallery['gallery_id']) ?>">
                                    <i class="icon-pencil"></i>
                                </a>
                                <button class="btn btn-danger btn-xs">
                                    <i class="icon-trash " onclick="delete_gallery(<?php echo $gallery['gallery_id'] ?>)"></i>
                                </button>
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
        <?php else: ?>
            <p>No data</p>
        <?php endif ?>
        </div>
    </div>
</section>
<!-- page end-->
