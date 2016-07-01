<script type="text/html" id="categoryListTemplate" data-url="<?php echo site_url('api/category/get_all_nested') ?>">
    <li class="list-inverse">
        <div class="task-title">
            <span class="task-title-sp">{{name}}</span>
            <div class="pull-right hidden-phone">
                <button class="btn btn-default btn-xs cursor-default">{{status}}</button>
                <button class="btn btn-primary btn-xs fa fa-pencil" onclick="go_to_category_edit_page({{id}})"></button>
                <button class="btn btn-danger btn-xs fa fa-trash" onclick="delete_category({{id}})"></button>
            </div>
        </div>
    </li>
</script>
<section class="x_panel tasks-widget">
    <header class="x_title">
        <h2>All categories</h2>
        <div class="clearfix"></div>
    </header>
    <div class="x_content">
        <div class="task-content">
            <ul id="categoryList" class="sortable">
                <!--  -->
            </ul>
        </div>
        <div class=" add-task-row">
            <a class="btn btn-success btn-sm pull-left" href="<?php echo admin_url('category/create') ?>">Add New Category</a>
        </div>
    </div>
</section>