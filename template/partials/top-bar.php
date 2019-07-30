<?php
//side bar

if (isset($data['p_hamburger']) && $data['p_hamburger'] == true) {
    $p_hamburger = $data['p_hamburger'];
} else {
    $p_hamburger = 'left';
}
if (isset($data['p_sidebar']) && $data['p_sidebar'] == true) {
    $p_sidebar = $data['p_sidebar'];
} else {
    $p_sidebar = 'left';
}

global $post;
global $blog_url;
global $site_url;
global $list_item;
?>
<amp-sidebar id="sidebar" class="sample-sidebar" layout="nodisplay" side="<?= $p_sidebar ?>">
    <div class="sidebar-header d-block txt-center">
        <button class="btn-dismiss" on="tap:sidebar.close"></button>
        <a href="<?php site_url(); ?>" title="home" class="my-auto" target="_top">
        <amp-img src="<?php if (isset($data['logo_url'])) echo $data['logo_url'] ?>"
                 width="<?php if (!empty($data['logo_width'])) {
                     echo trim($data['logo_width']);
                 } else echo "60px"; ?>" height="<?php if (!empty($data['logo_height'])) {
            echo trim($data['logo_height']);
        } else echo "60px"; ?>" class="txt-center d-block mx-auto" alt="logo"></amp-img>
        </a>
        <?php if (isset($data['blog_name']) && $data['blog_name'] == true): ?>
        <span class="txt-center d-block py-3 mx-auto "><?= get_bloginfo('name'); ?></span>
        <?php endif;?>
    </div>
    <nav role="navigation" class="ampstart-sidebar-nav ampstart-nav">
        <?php
        if (isset($data['amp_menu']) && $data['amp_menu'] == true) $menu = $data['amp_menu'];
        do_action('wp_amp_menu', $menu);
        ?>
    </nav>
</amp-sidebar>
<header class="d-flex justify-content-center align-items-center shadow py-1 sticky-top">
    <button on="tap:sidebar.toggle"
            class="burger <?= $p_hamburger ?> margin-<?= $p_hamburger ?>-page position-absolute">☰
    </button>
    <a href="<?php site_url(); ?>" title="home" class="my-auto" target="_top">
        <amp-img src="<?php if (isset($data['logo_url'])) echo $data['logo_url'] ?>"
                 width="<?php if (!empty($data['logo_width'])) {
                     echo trim($data['logo_width']);
                 } else echo "60px"; ?>" height="<?php if (!empty($data['logo_height'])) {
            echo trim($data['logo_height']);
        } else echo "60px"; ?>"></amp-img>
    </a>
</header>
