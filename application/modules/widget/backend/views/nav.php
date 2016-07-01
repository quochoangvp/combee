<form id="createwidget" method="post"
    action="<?php echo site_url('api/widget/save_config') ?>">
    <div class="cmxform form-horizontal tasi-form">
        <section class="x_panel">
            <header class="x_title">
                Widget config
            </header>
            <div class="x_content">
                <div class="form">
                    <?php echo $this->input->post('message') ? $this->input->post('message') : '' ?>
                    <div class="form-group ">
                        <label for="theme" class="control-label col-lg-2">Categories</label>
                        <div class="col-lg-10 list-category-nested" style="max-height: 400px;">
                            <?php echo general_checkbox_nested($categories, $widget['config']['categories'], 'category_id', 'category_title', 'category'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12">
                            <input type="hidden" name="widget_id" value="<?php echo $widget['widget_id'] ?>">
                            <button class="btn btn-primary" type="submit">Save</button>
                            <button class="btn btn-default" type="button" onclick="go_to_widget_page()">Back</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</form>
<div class="modal fade" id="thumbnailModal">
    <div class="modal-dialog" style="width: 900px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Select a image</h4>
            </div>
            <div class="modal-body">
                <iframe width="860" height="400" src="<?php echo base_url() ?>filemanager/dialog.php?type=2&amp;field_id=image&amp;fldr=" frameborder="0" style="overflow-x: hidden; overflow-y: scroll; "></iframe>
            </div>
        </div>
    </div>
</div>