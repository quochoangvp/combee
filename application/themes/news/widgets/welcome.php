<div class="container">
    <div class="row">
        <!--feature start-->
        <div class="text-center feature-head">
            <h1><?php echo $widget['widget_title'] ?></h1>
            <p><?php echo $widget['description'] ?></p>
        </div>
        <?php foreach ($data as $index => $item): ?>
        <div class="col-lg-4 col-sm-4">
            <section>
                <div class="f-box <?php echo ($index == 1) ? 'active' : '' ?>">
                    <i class="<?php echo $item['media_config']['icon'] ?>"></i>
                    <h2><?php echo $item['media_title'] ?></h2>
                </div>
                <p class="f-text"><?php echo html_entity_decode($item['description']) ?></p>
            </section>
        </div>
        <?php endforeach?>
    </div>
    <div class="row">
        <!--quote start-->
        <div class="quote">
            <div class="col-lg-9 col-sm-9">
                <div class="quote-info">
                    <h1><?php echo $widget['config']['quote_title'] ?></h1>
                    <p><?php echo $widget['config']['quote_desc'] ?></p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-3">
                <a href="<?php echo $widget['config']['btn_link'] ?>" class="btn btn-danger purchase-btn"><?php echo $widget['config']['btn_text'] ?></a>
            </div>
        </div>
        <!--quote end-->
    </div>
</div>
