<section class="x_panel">
    <header class="x_title">
        <h2>
            All products
            <div class="pull-right">
                <a class="btn btn-sm btn-primary" href="<?php echo admin_url('product/create') ?>">Add new</a>
            </div>
        </h2>
        <div class="clearfix"></div>
    </header>
    <div class="x_content">
        <?php if ($products && is_array($products) && count($products) > 0): ?>
        <div class="adv-table">
            <table cellpadding="0" cellspacing="0" border="0" class="table table-hover" id="hidden-table-info">
                <thead>
                    <tr>
                        <th class="w5">No</th>
                        <th>Name</th>
                        <th>Catalog</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $index => $product): ?>
                    <tr>
                        <td><?php echo $index + 1; ?></td>
                        <td><?php echo $product['product_name']; ?></td>
                        <td><?php echo $product['catalog_name']; ?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a class="btn btn-primary btn-xs" href="<?php echo admin_url('product/edit/' . $product['product_id']) ?>"><i class="fa fa-pencil"></i></a>
                            <button class="btn btn-danger btn-xs" onclick="confirm_delete_product(<?php echo $product['product_id'] ?>)"><i class="fa fa-trash "></i></button>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
            <p class="text-warning">No content</p>
        <?php endif;?>
    </div>
</section>
<!-- page end-->