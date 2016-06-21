<section class="panel">
    <header class="panel-heading">
        <h4>
            Media list
            <span class="pull-right">
                <a href="<?php echo admin_url('widget/config/' . $widget['widget_id'] . '/create') ?>" class="btn btn-sm btn-primary">Add new</a>
                <a href="<?php echo admin_url('widget') ?>" class="btn btn-sm btn-default">&lt; Back</a>
            </span>
        </h4>
    </header>
    <div class="panel-body">
        <div class="adv-table">
            <?php if ($widget['medias']): ?>
            <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                    <tr>
                        <th class="w5">No</th>
                        <th>Title</th>
                        <th class="w12">Thumbnail</th>
                        <th class="w12">Url</th>
                        <th class="w12">Link</th>
                        <th>Status</th>
                        <th class="w12">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($widget['medias'] as $index => $media): ?>
                        <tr>
                            <td><?php echo $index + 1 + $widget['offset'] ?></td>
                            <td><?php echo $media['media_title'] ?></td>
                            <td><img src="<?php echo site_url($media['thumbnail']) ?>" alt="" width="100px"></td>
                            <td><a href="<?php echo $media['media_url'] ?>"><?php echo $media['media_url'] ?></a></td>
                            <td><a href="<?php echo $media['media_link'] ?>"><?php echo $media['media_link'] ?></a></td>
                            <td><?php echo ($media['is_active'] == 'y') ? '<span class="label label-mini label-success">Show</span>' : '<span class="label label-mini label-default">Hide</span>' ?></td>
                            <td class="text-center">
                                <a class="btn btn-primary btn-xs" href="<?php echo admin_url('widget/config/' . $widget['widget_id'] . '/edit/' . $media['media_id']) ?>">
                                    <i class="icon-pencil"></i>
                                </a>
                                <button class="btn btn-danger btn-xs" onclick="delete_media(<?php echo $media['media_id'] ?>)"><i class="icon-trash "></i></button>
                            </td>
                        </tr>
                    <?php endforeach?>
                </tbody>
            </table>
            <div class="row">
                <div class="col-lg-6">
                    <div class="dataTables_info" id="editable-sample_info">Showing <?php echo $widget['offset'] + 1 ?> to <?php echo ($widget['offset'] + $widget['limit'] < $widget['total_rows']) ? ($widget['offset'] + $widget['limit']) : $widget['total_rows'] ?> of <?php echo $widget['total_rows'] ?> entries</div>
                </div>
                <div class="col-lg-6">
                    <div class="dataTables_paginate paging_bootstrap pagination">
                        <?php echo $this->pagination->create_links(); ?>
                    </div>
                </div>
            </div>
            <?php else: ?>
                <p>No data</p>
            <?php endif?>
        </div>
    </div>
</section>
<!-- page end-->
