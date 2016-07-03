<form id="createArticle" method="post"
    action="<?php echo site_url('api/article/' . (isset($article) ? 'update' : 'create')) ?>">
    <div class="row">
        <div class="col-lg-8 cmxform form-horizontal tasi-form">
            <section class="x_panel">
                <header class="x_title">
                    <h2><?php echo isset($article) ? 'Edit article' : 'Add new article' ?></h2>
                    <div class="clearfix"></div>
                </header>
                <div class="x_content">
                    <div class="form">
                        <?php echo $this->input->post('message') ? $this->input->post('message') : '' ?>
                        <div class="form-group ">
                            <label for="article_title" class="control-label col-lg-2">Title</label>
                            <div class="col-lg-10">
                                <input class=" form-control" id="article_title" name="article_title" type="text"
                                value="<?php echo isset($article) ? $article['article_title'] : '' ?>"
                                onfocusout="general_slug(this, 'article_url')" />
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="article_url" class="control-label col-lg-2">Url</label>
                            <div class="col-lg-10">
                                <input class=" form-control" id="article_url" name="article_url" type="text" value="<?php echo isset($article) ? $article['article_url'] : '' ?>" />
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="article_url" class="control-label col-lg-2">Summary</label>
                            <div class="col-lg-10">
                                <textarea class=" form-control" id="summary" name="summary" rows="8"><?php echo isset($article) ? $article['summary'] : '' ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="content" class="control-label col-lg-12" style="margin-bottom: 12px;">Content</label>
                            <div class="col-lg-12">
                                <textarea class="form-control tinymce" id="content" name="content"><?php echo isset($article) ? $article['content'] : '' ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <?php if (isset($article)): ?>
                                    <input type="hidden" name="article_id" value="<?php echo $article['article_id'] ?>">
                                <?php endif?>
                                <button class="btn btn-primary" type="submit">Save</button>
                                <button class="btn btn-default" type="button" onclick="go_to_category_page()">Back</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-lg-4">
            <section class="x_panel">
                <header class="x_title">
                    <h2>Additional Options</h2>
                    <div class="clearfix"></div>
                </header>
                <div class="x_content">
                    <div class="form">
                        <div class="form-group">
                            <label for="category_id" class="control-label">Category</label>
                            <div class="list-category-nested">
                                <?php echo general_checkbox_nested($category_nested, isset($article['category']) ? $article['category'] : [], 'category_id', 'category_title', 'category'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="publish_date" class="control-label">Publish date</label>
                            <div>
                                <input size="16" name="publish_date" id="publish_date" type="text" value="<?php echo date('Y-m-d H:j:s') ?>" class="form_datetime form-control">
                            </div>
                        </div>
                        <div class="form-group custom-checkbox">
                            <div>
                                <div class="checkboxes">
                                    <input name="status" id="status" value="publish" type="checkbox" <?php echo (isset($article['status']) && $article['status'] == 'publish') ? 'checked' : '' ?> />
                                    <label class="label_check" for="status">Publish</label>

                                    <input name="allow_comment" id="allow_comment" value="y" type="checkbox" <?php echo (isset($article['allow_comment']) && $article['allow_comment'] == 'y') ? 'checked' : '' ?> />
                                    <label class="label_check" for="allow_comment">Allow comment</label>

                                    <input name="featured" id="featured" value="y" type="checkbox" <?php echo (isset($article['featured']) && $article['featured'] == 'y') ? 'checked' : '' ?> />
                                    <label class="label_check" for="featured">Featured</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="keyword" class="control-label">Keyword:</label>
                            <div>
                                <input name="keyword" id="keyword" class="tagsinput" value="<?php echo isset($article) ? $article['keyword'] : '' ?>" />
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="description" class="control-label">Description:</label>
                            <div>
                                <textarea class="form-control" id="description" name="description"><?php echo isset($article) ? $article['description'] : '' ?></textarea>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="description" class="control-label">Thumbnail:</label>
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                    <img id="thumbnailPreview" src="<?php echo (isset($article['thumbnail']) && strlen($article['thumbnail']) > 0) ? $article['thumbnail'] : 'http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image' ?>" alt="" data-origin="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" />
                                    <input type="hidden" name="thumbnail" id="thumbnail" value="<?php echo (isset($article['thumbnail']) && strlen($article['thumbnail']) > 0) ? $article['thumbnail'] : '' ?>">
                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div class="btn-group-file">
                                    <span class="btn btn-white btn-file">
                                        <a data-toggle="modal" href="javascript:;" data-target="#thumbnailModal" class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</a>
                                        <a data-toggle="modal" href="javascript:;" data-target="#thumbnailModal" class="fileupload-exists"><i class="fa fa-undo"></i> Change</a>
                                    </span>
                                    <a href="javascript:;" class="btn btn-danger fileupload-exists" onclick="removeThumbnail()"><i class="fa fa-trash"></i> Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
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
                <iframe width="860" height="400" src="<?php echo base_url() ?>filemanager/dialog.php?type=2&amp;field_id=thumbnail'&amp;fldr=" frameborder="0" style="overflow-x: hidden; overflow-y: scroll; "></iframe>
            </div>
        </div>
    </div>
</div>