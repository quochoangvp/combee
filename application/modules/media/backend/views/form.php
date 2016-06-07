<form id="createMedia" method="post"
    action="<?php echo site_url('api/media/' . (isset($media) ? 'update' : 'create')) ?>">
    <div class="cmxform form-horizontal tasi-form">
        <section class="panel">
            <header class="panel-heading">
                <?php echo isset($media) ? 'Edit media' : 'Add new media' ?>
            </header>
            <div class="panel-body">
                <div class="form">
                    <?php echo $this->input->post('message') ? $this->input->post('message') : '' ?>
                    <div class="form-group ">
                        <label for="media_title" class="control-label col-lg-2">Title</label>
                        <div class="col-lg-10">
                            <input class=" form-control" id="media_title" name="media_title" type="text"
                            value="<?php echo isset($media) ? $media['media_title'] : '' ?>"
                            onfocusout="general_slug(this, 'media_url')" />
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="media_url" class="control-label col-lg-2">Url</label>
                        <div class="col-lg-10">
                            <input class=" form-control" id="media_url" name="media_url" type="text" value="<?php echo isset($media) ? $media['media_url'] : '' ?>" />
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="media_url" class="control-label col-lg-2">Summary</label>
                        <div class="col-lg-10">
                            <textarea class=" form-control" id="summary" name="summary" rows="8"><?php echo isset($media) ? $media['summary'] : '' ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="content" class="control-label col-lg-12" style="margin-bottom: 12px;">Content</label>
                        <div class="col-lg-12">
                            <textarea class="form-control tinymce" id="content" name="content"><?php echo isset($media) ? $media['content'] : '' ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12">
                            <?php if (isset($media)): ?>
                                <input type="hidden" name="media_id" value="<?php echo $media['media_id'] ?>">
                            <?php endif?>
                            <button class="btn btn-primary" type="submit">Save</button>
                            <button class="btn btn-default" type="button" onclick="go_to_category_page()">Back</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</form>