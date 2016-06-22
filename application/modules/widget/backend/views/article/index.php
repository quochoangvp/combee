<section class="panel">
    <header class="panel-heading">
        <h4>
            All list article
            <span class="pull-right">
                <a href="javascript:;" onclick="add_new_article_config()" class="btn btn-sm btn-primary">Add new</a>
            </span>
            <input type="hidden" name="widget_id" value="<?php echo $widget['widget_id'] ?>">
        </h4>
    </header>
    <div class="panel-body">
        <div class="adv-table">
            <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="table_article_config">
                <thead>
                    <tr>
                        <th class="w5">No</th>
                        <th>Title</th>
                        <th>Categories</th>
                        <th class="w12">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($widget['config']['list'] as $index => $list): ?>
                        <tr id="index_<?php echo $index ?>">
                            <td><?php echo $index + 1 ?></td>
                            <td data-title-<?php echo $index ?>="<?php echo $list['title'] ?>">
                            	<?php echo $list['title'] ?>
                            </td>
                            <td data-list-categories-<?php echo $index ?>="<?php echo $list['categories'] ?>">
                            	<?php echo $list['categories'] ?>
                            </td>
                            <td class="text-center">
                                <a class="btn btn-primary btn-xs" onclick="open_popup_select_categories(<?php echo $index; ?>)">
                                    <i class="icon-pencil"></i>
                                </a>
                                <button class="btn btn-danger btn-xs" onclick="delete_config(<?php echo $index ?>)"><i class="icon-trash "></i></button>
                            </td>
                        </tr>
                    <?php endforeach?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<!-- page end-->
<div class="modal fade" id="chooseCategories">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="" method="post" accept-charset="utf-8">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Select categories</h4>
				</div>
				<div class="modal-body">
					<div class="form-group block100">
						<label for="title" class="control-label col-lg-2">Title</label>
	                    <div class="col-lg-10">
	                        <input class=" form-control" name="title" type="text" value="" />
	                    </div>
					</div>
					<div class="form-group block100">
						<label for="categories" class="control-label col-lg-2">Categories</label>
	                    <div class="col-lg-10">
	                        <?php echo general_checkbox_nested($widget['categories'], null, 'category_id', 'category_title', 'category'); ?>
	                    </div>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="index" value="">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</form>
		</div>
	</div>
</div>
<table id="rowTemplate" style="visibility: hidden; display: none">
	<tr id="index_{{index}}">
        <td>{{index+1}}</td>
        <td data-title-{{index}}="{{title}}">
        	{{title}}
        </td>
        <td data-list-categories-{{index}}="{{categories}}">
        	{{categories}}
        </td>
        <td class="text-center">
            <a class="btn btn-primary btn-xs" onclick="open_popup_select_categories({{index}})">
                <i class="icon-pencil"></i>
            </a>
            <button class="btn btn-danger btn-xs" onclick="delete_config({{index}})"><i class="icon-trash "></i></button>
        </td>
    </tr>
</table>