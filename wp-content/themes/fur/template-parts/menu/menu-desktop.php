<?php
$menus = getMenu('head');

?>


<div id="sns_custommenu" class="visible-md visible-lg">
    <ul class="mainnav">
        <?php if (!empty($menus)) {
            foreach ($menus as $menu) {
                $items = $menu->items;
                //var_dump($menu);
                if ($items && !empty($items)) {
                    ?>
                    <li class="level0 nav-4 no-group drop-submenu last parent">
                        <a class=" menu-title-lv0" href="<?= $menu->url ?>">
                            <span class="title">
                                <?= !empty($menu->title) ? $menu->title : $menu->post_title ?>
                            </span>
                        </a>
                        <div class="wrap_submenu">
                            <ul class="level0">
                                <?php
                                if ($items && !empty($items)) {
                                    foreach ($items as $children) {
                                        $three = $children->items;
                                        if (empty($three)) {
                                            ?>
                                            <li class="level1 nav-3-1 first">
                                                <a class=" menu-title-lv1" href="<?= $children->url ?>">
                                                    <span class="title">
                                                        <?= $children->post_title ? $children->post_title : $children->title ?>
                                                    </span>
                                                </a>
                                            </li>
                                            <?php
                                        } else {
                                            ?>
                                            <li class="level1 nav-3-3 parent">
                                                <a class=" menu-title-lv1" href="<?= $children->url ?>">
                                                    <span class="title">
                                                        <?= $children->post_title ? $children->post_title : $children->title ?>
                                                    </span>
                                                </a>
                                                <div class="wrap_submenu">
                                                    <ul class="level1">
                                                        <?php
                                                        if ($three && !empty($three)) {
                                                            foreach ($three as $thr) {
                                                                ?>
                                                                <li class="level2 nav-3-2-1 first">
                                                                    <a class=" menu-title-lv2" href="<?= $thr->url ?>">
                                                                        <span class="title">
                                                                            <?= $thr->post_title ? $thr->post_title : $thr->title ?>
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </ul>
                                                </div>
                                            </li>
                                            <?php
                                        }
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </li>
                    <?php
                } else {
                    ?>
                    <li class="level0 custom-item">
                        <a class="menu-title-lv0 pd-menu116" href="<?= $menu->url ?>" target="_self">
                            <span class="title"> <?= !empty($menu->title) ? $menu->title : $menu->post_title ?></span>
                        </a>
                    </li>
                    <?php
                }
            }
        } ?>
    </ul>
</div>
