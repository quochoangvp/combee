<section class="panel">
    <header class="panel-heading">
        <h4>
            All brands
            <div class="pull-right">
                <a class="btn btn-sm btn-primary" href="<?php echo admin_url('product/brand/create') ?>">Add new</a>
            </div>
        </h4>
    </header>
    <div class="panel-body">
        <?php if ($brands && is_array($brands) && count($brands) > 0): ?>
        <div class="adv-table">
            <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                    <tr>
                        <th class="w5">No</th>
                        <th>Logo</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($brands as $index => $brand): ?>
                    <tr>
                        <td><?php echo $index + 1; ?></td>
                        <td><?php echo array_key_exists('brand_logo', $brand)?'<img width="120px" src="'.$brand['brand_logo'].'" alt="" />':'' ; ?></td>
                        <td><?php echo $brand['brand_name']; ?></td>
                        <td>
                            <a class="btn btn-primary btn-xs" href="<?php echo admin_url('product/brand/edit/' . $brand['brand_id']) ?>"><i class="icon-pencil"></i></a>
                            <button class="btn btn-danger btn-xs" onclick="confirm_delete_brand(<?php echo $brand['brand_id'] ?>)"><i class="icon-trash "></i></button>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
            <p class="text-warning">Have no brand</p>
        <?php endif;?>
    </div>
</section>
<!-- page end-->