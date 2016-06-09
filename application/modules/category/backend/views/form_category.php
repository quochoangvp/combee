<section class="panel">
    <header class="panel-heading">
        <?php echo isset($category) ? 'Edit category <b>' . $category['category_title'] . '</b>' : 'Add new category' ?>
    </header>
    <div class="panel-body">
        <div class="form">
            <form class="cmxform form-horizontal tasi-form" id="createCategory" method="post"
                action="<?php echo site_url('api/category/' . (isset($category) ? 'update' : 'create')) ?>">
                <?php echo $this->input->post('message') ? $this->input->post('message') : '' ?>
                <div class="form-group ">
                    <label for="category_title" class="control-label col-lg-2">Name</label>
                    <div class="col-lg-10">
                        <input class=" form-control" id="category_title" name="category_title" type="text"
                                value="<?php echo isset($category) ? $category['category_title'] : '' ?>"
                                onfocusout="general_slug(this, 'category_url')" />
                    </div>
                </div>
                <div class="form-group ">
                    <label for="category_url" class="control-label col-lg-2">Url</label>
                    <div class="col-lg-10">
                        <input class=" form-control" id="category_url" name="category_url" type="text" value="<?php echo isset($category) ? $category['category_url'] : '' ?>" />
                    </div>
                </div>
                <div class="form-group ">
                    <label for="keyword" class="control-label col-lg-2">Keyword</label>
                    <div class="col-lg-10">
                        <input name="keyword" id="keyword" class="tagsinput" value="<?php echo isset($category) ? $category['keyword'] : '' ?>" />
                    </div>
                </div>
                <div class="form-group ">
                    <label for="description" class="control-label col-lg-2">Description</label>
                    <div class="col-lg-10">
                        <textarea class="form-control" id="description" name="description"><?php echo isset($category) ? $category['description'] : '' ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="content" class="control-label col-lg-2">Content</label>
                    <div class="col-lg-10">
                        <textarea class="form-control tinymce" id="content" name="content"><?php echo isset($category) ? $category['content'] : '' ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="parent_id" class="control-label col-lg-2">Parent</label>
                    <div class="col-lg-10">
                        <select class="form-control" name="parent_id" id="parent_id" data-select="<?php echo isset($category) ? $category['parent_id'] : '' ?>">
                            <option value="">Select a parent</option>
                            <option value="0">Root</option>
                            <?php echo general_option_nested($category_nested, 'category_id', 'category_title'); ?>
                        </select>
                    </div>
                </div>
                <div class="form-group ">
                    <label for="status" class="control-label col-lg-2">Status</label>
                    <div class="col-lg-10">
                        <select class="form-control" name="status" id="status" data-select="<?php echo isset($category) ? $category['status'] : '' ?>">
                            <option value="draft">Draft</option>
                            <option value="publish">Publish</option>
                            <option value="trash">Trash</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <?php if (isset($category)): ?>
                            <input type="hidden" name="category_id" value="<?php echo $category['category_id'] ?>">
                        <?php endif ?>
                        <button class="btn btn-primary" type="submit">Save</button>
                        <button class="btn btn-default" type="button" onclick="go_to_category_page()">Back</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>