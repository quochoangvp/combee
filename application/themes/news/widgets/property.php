<div class="property gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-6 text-center">
                <img src="<?php echo $widget['image'] ?>" alt="">
            </div>
            <div class="col-lg-6 col-sm-6">
                <h1><?php echo $widget['widget_title'] ?></h1>
                <p><?php echo $widget['description'] ?></p>
                <a href="<?php echo $widget['config']['btn_purchase_link'] ?>" class="btn btn-purchase">
                	<?php echo $widget['config']['btn_purchase_text'] ?>
                </a>
            </div>
        </div>
    </div>
</div>