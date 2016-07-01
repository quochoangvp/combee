<script type="text/html" id="linkListTemplate" data-url="<?php echo site_url('api/link/get_all_nested') ?>">
    <li class="list-inverse" id="links-{{id}}">
        <div class="task-title">
            <span class="task-title-sp">{{title}}</span>
            <div class="pull-right hidden-phone">
                <button class="btn btn-{{is_show}} btn-xs fa fa-check cursor-default"></button>
                <button class="btn btn-primary btn-xs fa fa-pencil" onclick="go_to_link_edit_page({{id}})"></button>
                <button class="btn btn-danger btn-xs fa fa-trash" onclick="delete_link({{id}})"></button>
            </div>
        </div>
    </li>
</script>
<section class="x_panel tasks-widget">
    <header class="x_title">
        <h2>
            All links
        </h2>
        <div class="clearfix"></div>
    </header>
    <div class="x_content">
        <div class="task-content">
            <ul id="linkList" class="sortable">
                <!--  -->
            </ul>
        </div>
        <div class=" add-task-row">
            <a class="btn btn-success btn-sm pull-left" href="<?php echo admin_url('link/create') ?>">Add new link</a>
        </div>
    </div>
</section>