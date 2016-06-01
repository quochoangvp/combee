<script type="text/html" id="categoryListTemplate" data-url="<?php echo site_url('api/category/get_all_nested') ?>">
    <li class="list-inverse">
        <div class="task-title">
            <span class="task-title-sp">{{name}}</span>
            <span class="badge badge-sm label-inverse">{{status}}</span>
            <div class="pull-right hidden-phone">
                <button class="btn btn-primary btn-xs icon-pencil" onclick="go_to_category_edit_page({{id}})"></button>
                <button class="btn btn-danger btn-xs icon-trash" onclick="delete_category({{id}})"></button>
            </div>
        </div>
    </li>
</script>
<section class="panel tasks-widget">
    <header class="panel-heading">
        All categories
    </header>
    <div class="panel-body">
        <div class="task-content">
            <ul id="categoryList" class="sortable">
                <!--  -->
            </ul>
        </div>
        <div class=" add-task-row">
            <a class="btn btn-success btn-sm pull-left" href="<?php echo admin_url('category/create') ?>">Add New Category</a>
            <a class="btn btn-primary btn-sm pull-right" href="javascript:;" onclick="category_save_order()">Save Order</a>
        </div>
    </div>
</section>