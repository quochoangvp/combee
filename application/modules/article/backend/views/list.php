<section class="panel">
    <header class="panel-heading">
        All articles
    </header>
    <div class="panel-body">
        <div class="adv-table">
            <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                    <tr>
                        <th class="w5">No</th>
                        <th>Title</th>
                        <th class="w12">Category</th>
                        <th class="w12">Tags</th>
                        <th>Author</th>
                        <th>Publish date</th>
                        <th>Status</th>
                        <th class="w8">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($articles as $index => $article): ?>
                        <tr>
                            <td><?php echo $index + 1 + $offset ?></td>
                            <td><?php echo $article['article_title'] ?></td>
                            <td><?php echo $article['article_categories'] ?></td>
                            <td><?php echo $article['article_tags'] ?></td>
                            <td><?php echo $article['author'] ?></td>
                            <td><?php echo $article['publish_date'] ?></td>
                            <td><?php echo ucfirst($article['status']) ?></td>
                            <td class="text-center">
                                <a class="btn btn-primary btn-xs" href="<?php echo admin_url('article/edit/' . $article['article_id']) ?>">
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
                    <div class="dataTables_info" id="editable-sample_info">Showing <?php echo $offset + 1 ?> to <?php echo $offset + $limit ?> of <?php echo $total_rows ?> entries</div>
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
