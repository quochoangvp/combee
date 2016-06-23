<h1><?php echo $widget['widget_title'] ?></h1>
<address>
    <?php foreach ($widget['config'] as $key => $value): ?>
    <p><?php echo $key ?>: <?php echo is_email_address($value)?'<a href="mailto:'.$value.'">'.$value.'</a>':$value ?></p>
    <?php endforeach ?>
</address>