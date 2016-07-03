<section class="x_panel">
    <header class="x_title">
        <h2>
            All tags
            <div class="pull-right">
                <a class="btn btn-sm btn-primary open-create-form" data-toggle="modal" href="#tag_form">Add new</a>
            </div>
        </h2>
        <div class="clearfix"></div>
    </header>
    <div class="x_content">
        <?php if ($tags && is_array($tags) && count($tags) > 0): ?>
        <div class="adv-table">
            <table cellpadding="0" cellspacing="0" border="0" class="table table-hover" id="hidden-table-info">
                <thead>
                    <tr>
                        <th class="w5">No</th>
                        <th>Title</th>
                        <th>Url</th>
                        <th>Status</th>
                        <th class="w10">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tags as $index => $tag): ?>
                    <tr>
                        <td><?php echo $index+1 ?></td>
                        <td><?php echo $tag['tag_title'] ?></td>
                        <td><?php echo $tag['tag_url'] ?></td>
                        <td class="center"><?php echo ($tag['is_show'] == 'y') ? '<span class="label label-mini label-success">Show</span>' : '<span class="label label-mini label-default">Hide</span>' ?></td>
                        <td>
                            <button class="btn btn-primary btn-xs" onclick="open_popup_edit(this)" data-url="<?php echo site_url('api/tag/get_by_id/' . $tag['tag_id']) ?>">
                                <i class="fa fa-pencil"></i>
                            </button>
                            <button class="btn btn-danger btn-xs"><i class="fa fa-trash "></i></button>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
            <p class="text-warning">Have no tags</p>
        <?php endif ?>
    </div>
</section>
<!-- page end-->

<div class="modal fade" id="tag_form">
    <div class="modal-dialog">
        <form class="cmxform form-horizontal tasi-form" method="post"
            data-action-create="<?php echo site_url('api/tag/create') ?>"
            data-action-update="<?php echo site_url('api/tag/update') ?>">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <div class="form-message"></div>
                    <div class="form-group ">
                        <label for="tag_title" class="control-label col-lg-2">Name</label>
                        <div class="col-lg-10">
                            <input class=" form-control" id="tag_title" name="tag_title" type="text" value=""
                                    onfocusout="general_slug(this, 'tag_url')" />
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="tag_title" class="control-label col-lg-2">Url</label>
                        <div class="col-lg-10">
                            <input class=" form-control" id="tag_url" name="tag_url" type="text" value=""
                                    onfocusout="general_slug(this, 'tag_url')" />
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="status" class="control-label col-lg-2">Status</label>
                        <div class="col-lg-10">
                            <select class="form-control" name="is_show" id="is_show">
                                <option value="y">Show</option>
                                <option value="n">Hide</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="tag_id" value="">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="save_button" data-loading-text="Saving...">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>