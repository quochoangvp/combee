<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>Admin menu</h3>
        <ul class="nav side-menu">
            <?php foreach ($menus as $menu):?>
                <?php if ($menu['is_show'] == 'y'): ?>
                    <li>
                        <a href="<?php echo (isset($menu['children']))?'javascript:;':admin_url($menu['amenu_link']) ?>">
                            <i class="<?php echo $menu['amenu_icon']?>"></i>
                            <?php echo $menu['amenu_text'] ?>
                            <?php echo (isset($menu['children']))?'<span class="fa chevron"></span>':'' ?>
                        </a>
                        <?php if (isset($menu['children'])): ?>
                            <ul class="nav child_menu">
                                <?php foreach ($menu['children'] as $child): ?>
                                    <li <?php echo (strpos(uri_string(), $child['amenu_link']) !== false) ? 'class="current-page"' : '' ?>>
                                        <a href="<?php echo admin_url($child['amenu_link']) ?>"><?php echo $child['amenu_text'] ?></a>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                        <?php endif ?>
                    </li>
                <?php endif ?>
            <?php endforeach ?>
        </ul>
    </div>
</div>