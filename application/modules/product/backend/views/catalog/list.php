<script type="text/html" id="catalogListTemplate" data-url="<?php echo site_url('api/product/catalog/get_all_nested') ?>">
    <li class="list-inverse" id="catalogs-{{id}}">
        <div class="task-title">
            <span class="task-title-sp">{{name}}</span>
            <div class="pull-right hidden-phone">
                <button class="btn btn-primary btn-xs icon-pencil" onclick="go_to_catalog_edit_page({{id}})"></button>
                <button class="btn btn-danger btn-xs icon-trash" onclick="delete_catalog({{id}})"></button>
            </div>
        </div>
    </li>
</script>
<section class="panel tasks-widget">
    <header class="x_title">
        All categories
    </header>
    <div class="x_content">
        <div class="task-content">
            <ul id="catalogList" class="sortable">
                <!--  -->
            </ul>
        </div>
        <div class=" add-task-row">
            <a class="btn btn-success btn-sm pull-left" href="<?php echo admin_url('product/catalog/create') ?>">Add New Category</a>
        </div>
    </div>
</section>