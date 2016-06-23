<div class="row">
    <div class="col-lg-12">
        <h2 class="r-work"><?php echo $widget['widget_title'] ?></h2>
        <ul class="bxslider">
            <?php foreach ($data as $item): ?>
            <li>
                <div class="element item view view-tenth" data-zlname="reverse-effect">
                    <img src="<?php echo $item['thumbnail'] ?>" alt="" />
                    <div class="mask">
                        <a data-zl-popup="link" href="<?php echo $item['media_link'] ?>">
                            <i class="icon-link"></i>
                        </a>
                        <a data-zl-popup="link2" class="fancybox" rel="group" href="<?php echo $item['media_url'] ?>">
                            <i class="icon-search"></i>
                        </a>
                    </div>
                </div>
            </li>
            <?php endforeach ?>
        </ul>
    </div>
</div>