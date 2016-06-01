<aside>
    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <?php foreach ($menus as $menu):?>
                <?php if ($menu['is_show'] == 'y'): ?>
                    <li <?php echo (isset($menu['children'])) ? ' class="sub-menu"' : '' ?>>
                        <a href="<?php echo admin_url($menu['amenu_link']) ?>">
                            <i class="<?php echo $menu['amenu_icon']?>"></i>
                            <span><?php echo $menu['amenu_text'] ?></span>
                        </a>
                        <?php if (isset($menu['children'])): ?>
                            <ul class="sub">
                                <?php foreach ($menu['children'] as $child): ?>
                                    <li <?php echo (strpos(uri_string(), $child['amenu_link']) !== false) ? 'class="active"' : '' ?>>
                                        <a href="<?php echo admin_url($child['amenu_link']) ?>"><?php echo $child['amenu_text'] ?></a>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                        <?php endif ?>
                    </li>
                <?php endif ?>
            <?php endforeach ?>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>