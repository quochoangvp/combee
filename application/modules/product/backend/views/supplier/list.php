<section class="x_panel">
    <header class="x_title">
        <h4>
            All suppliers
            <div class="pull-right">
                <a class="btn btn-sm btn-primary" href="<?php echo admin_url('product/supplier/create') ?>">Add new</a>
            </div>
        </h4>
    </header>
    <div class="x_content">
        <?php if ($suppliers && is_array($suppliers) && count($suppliers) > 0): ?>
        <div class="adv-table">
            <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                    <tr>
                        <th class="w5">No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone number</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($suppliers as $index => $supplier): ?>
                    <tr>
                        <td><?php echo $index + 1; ?></td>
                        <td><?php echo $supplier['supplier_name']; ?></td>
                        <td><?php echo $supplier['supplier_email']; ?></td>
                        <td><?php echo $supplier['supplier_phone']; ?></td>
                        <td><?php echo $supplier['supplier_address']; ?></td>
                        <td>
                            <a class="btn btn-primary btn-xs" href="<?php echo admin_url('product/supplier/edit/' . $supplier['supplier_id']) ?>"><i class="icon-pencil"></i></a>
                            <button class="btn btn-danger btn-xs" onclick="confirm_delete_supplier(<?php echo $supplier['supplier_id'] ?>)"><i class="icon-trash "></i></button>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
            <p class="text-warning">Have no supplier</p>
        <?php endif;?>
    </div>
</section>
<!-- page end-->