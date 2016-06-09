<section class="panel">
    <header class="panel-heading">
        <?php echo isset($link) ? 'Edit link <b>' . $link['link_title'] . '</b>' : 'Add new link' ?>
    </header>
    <div class="panel-body">
        <div class="form">
            <form class="cmxform form-horizontal tasi-form" id="createlink" method="post"
                action="<?php echo site_url('api/link/' . (isset($link) ? 'update' : 'create')) ?>">
                <?php echo $this->input->post('message') ? $this->input->post('message') : '' ?>
                <div class="form-group ">
                    <label for="link_title" class="control-label col-lg-2">Name</label>
                    <div class="col-lg-10">
                        <input class=" form-control" id="link_title" name="link_title" type="text"
                                value="<?php echo isset($link) ? $link['link_title'] : '' ?>"
                                onfocusout="general_slug(this, 'link_url')" />
                    </div>
                </div>
                <div class="form-group ">
                    <label for="link_url" class="control-label col-lg-2">Url</label>
                    <div class="col-lg-10">
                        <input class=" form-control" id="link_url" name="link_url" type="text" value="<?php echo isset($link) ? $link['link_url'] : '' ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="parent_id" class="control-label col-lg-2">Parent</label>
                    <div class="col-lg-10">
                        <select class="form-control" name="parent_id" id="parent_id" data-select="<?php echo isset($link) ? $link['parent_id'] : '' ?>">
                            <option value="0">Root</option>
                            <?php echo general_option_nested($link_nested, 'link_id', 'link_title'); ?>
                        </select>
                    </div>
                </div>
                <div class="form-group ">
                    <label for="status" class="control-label col-lg-2">Status</label>
                    <div class="col-lg-10">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="y" name="is_show" <?php echo (isset($link['is_show']) && $link['is_show'] == 'y') ? 'checked' : '' ?>>
                                Yes
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <?php if (isset($link)): ?>
                            <input type="hidden" name="link_id" value="<?php echo $link['link_id'] ?>">
                        <?php endif ?>
                        <button class="btn btn-primary" type="submit">Save</button>
                        <button class="btn btn-default" type="button" onclick="go_to_link_page()">Back</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>