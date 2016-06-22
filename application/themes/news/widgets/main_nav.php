<ul class="nav navbar-nav">
    <?php foreach ($data as $item): ?>
        <li <?php echo isset($item['children'])?'class="dropdown"':'' ?>>
            <a
                href="<?php echo $item['category_id'] ?>"
                <?php echo isset($item['children'])?'class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false"':'' ?>
            >
                <?php echo $item['category_title'] . (isset($item['children'])?' <b class=" icon-angle-down"></b>':'') ?>
            </a>
            <?php if (isset($item['children'])): ?>
            <ul class="dropdown-menu">
                <?php foreach ($item['children'] as $children): ?>
                    <li>
                        <a href="<?php echo $children['category_id'] ?>">
                            <?php echo $children['category_title'] ?>
                        </a>
                    </li>
                <?php endforeach ?>
            </ul>
            <?php endif ?>
        </li>
    <?php endforeach ?>
    <li><input type="text" placeholder=" Search" class="form-control search"></li>
</ul>