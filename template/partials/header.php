<?php
//Header
global $post;
?>
<?php $featured_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), "full"); ?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <title><?php wp_title(''); ?></title>
    <link rel="canonical" href="<?php echo get_the_permalink(); ?>">
    <link href="<?php if (isset($data['fav_url'])) echo $data['fav_url'] ?>" rel="icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="dns-prefetch">
    <link href="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js" rel="preconnect">
    <?php include plugin_dir_path(__DIR__) . 'assets/schema/schema.php'; ?>
    <?= '<style amp-custom>' ?><?php include plugin_dir_path(__DIR__) . 'assets/css/default-style.php'; ?><?= '</style>'; ?>
    <?php include plugin_dir_path(__DIR__) . 'assets/css/amp-mrcat-boilerplate.php'; ?>
    <?php include plugin_dir_path(__DIR__) . 'assets/component/component.php'; ?>
</head>
<body>
<?php
if (isset($data['enable_ga']) && $data['enable_ga'] == true && isset($data['ga'])) : ?>
    <amp-analytics type="gtag" data-credentials="include">
        <?php ob_start();
        echo $data['ga'];
        ob_end_flush(); ?>
    </amp-analytics>
<?php endif; ?>