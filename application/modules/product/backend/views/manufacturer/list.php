<section class="x_panel">
    <header class="x_title">
        <h2>
            All manufacturers
            <div class="pull-right">
                <a class="btn btn-sm btn-primary" href="<?php echo admin_url('product/manufacturer/create') ?>">Add new</a>
            </div>
        </h2>
        <div class="clearfix"></div>
    </header>
    <div class="x_content">
        <?php if ($manufacturers && is_array($manufacturers) && count($manufacturers) > 0): ?>
        <div class="adv-table">
            <table cellpadding="0" cellspacing="0" border="0" class="table table-hover" id="hidden-table-info">
                <thead>
                    <tr>
                        <th class="w5">No</th>
                        <th>Logo</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($manufacturers as $index => $manufacturer): ?>
                    <tr>
                        <td><?php echo $index + 1; ?></td>
                        <td><?php echo array_key_exists('manufacturer_logo', $manufacturer)?'<img width="120px" src="'.$manufacturer['manufacturer_logo'].'" alt="" />':'' ; ?></td>
                        <td><?php echo $manufacturer['manufacturer_name']; ?></td>
                        <td>
                            <a class="btn btn-primary btn-xs" href="<?php echo admin_url('product/manufacturer/edit/' . $manufacturer['manufacturer_id']) ?>"><i class="fa fa-pencil"></i></a>
                            <button class="btn btn-danger btn-xs" onclick="confirm_delete_manufacturer(<?php echo $manufacturer['manufacturer_id'] ?>)"><i class="fa fa-trash "></i></button>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
            <p class="text-warning">Have no manufacturer</p>
        <?php endif;?>
    </div>
</section>
<!-- page end-->