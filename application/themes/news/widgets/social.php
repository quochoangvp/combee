<h1><?php echo $widget['widget_title'] ?></h1>
<ul class="social-link-footer list-unstyled">
    <?php foreach ($data as $item): ?>
    <li><a href="<?php echo $item['media_link'] ?>"><i class="<?php echo $item['media_config']['icon'] ?>"></i></a></li>
    <?php endforeach ?>
</ul>