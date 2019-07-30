<?php include plugin_dir_path(__DIR__) . 'template/partials/option-single-page.php'; ?>
<!doctype html>
<html amp lang="en">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php include plugin_dir_path(__DIR__) . 'template/partials/header.php'; ?>
    <?php include plugin_dir_path(__DIR__) . 'template/partials/top-bar.php'; ?>
    <?php include plugin_dir_path(__DIR__) . 'template/partials/main.php'; ?>
    <?php include plugin_dir_path(__DIR__) . 'template/partials/footer.php'; ?>
<?php endwhile;
endif; ?>
</html>