<?php
// Main
global $post;
?>
<main id="content" role="main">
    <amp-image-lightbox id="imgLightBox" layout="nodisplay"></amp-image-lightbox>
    <section class="wrap">
        <div class="row">
            <div class="col-12 p-page">
                <h1 class="pt-3"><?php the_title(); ?></h1>
                <?php if (isset($data['breadcrumb']) && $data['breadcrumb'] == 'Header' && isset($list_item))
                    do_action('wp_amp_breadcrumb', $list_item); ?>
                <div class="details d-flex my-3">
                    <div class="avatar mr-1">
                        <amp-img
                            alt="<?php echo get_the_author_meta('display_name', get_the_author_meta($post->ID)); ?>"
                            class="circle"
                            src="<?php echo get_avatar_url(get_the_author_meta('user_email'), 64) ?>"
                            height="64px" width="64px"></amp-img>
                    </div>
                    <div class="time-article flex-col d-flex justify-content-center">
                        <span class="d-block"><?php echo get_the_author_meta('display_name', get_the_author_meta($post->ID)); ?></span>
                        <amp-timeago width="160" height="28"
                                     datetime="<?php $post_date = get_the_date('Y-m-d') . "T" . get_the_date('H:i') . ":33.809Z";
                                     echo $post_date; ?>"> Posted On : <?php echo $post_date; ?></amp-timeago>
                    </div>
                </div>
                <?php if (has_post_thumbnail()) : ?>
                    <div class="image featured-image  w-img">
                        <?php if (!empty($featured_url[0])) : ?>
                            <amp-img src="<?php echo $featured_url[0]; ?>" width="<?php echo $featured_url[1]; ?>"
                                     height="<?php echo $featured_url[2]; ?>" layout="responsive"></amp-img>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <article class="mt-2">
                    <?php the_content(); ?>
                </article>
                <?php
                $leave_comment = "Leave a comment";
                if (comments_open() || '0' != get_comments_number()) echo '<a  class="btn-primary d-block mx-auto my-5" href="' . get_the_permalink() . '#respond" title="leave comment" target="_top">'.$leave_comment .'</a>';
                ?>
            </div>
            <div class=" cat-list col-12 p-page my-3">
                <?php $categories_list = get_the_category_list(); ?>
                <?php if ($categories_list) : $post_category_list = $categories_list;?>
                <?php if(isset($data['category_mrcat_amp']) && $data['category_mrcat_amp'] == true): ?>
                    <span class="d-block">Category:&nbsp;<?php echo $post_category_list; ?></span>
                <?php endif;endif;
                if (isset($data['tags']) && $data['tags'] == true) the_tags( 'Tags: ', ', ', '<br />' ); ?>
                <?php if (isset($data['breadcrumb']) && $data['breadcrumb'] == 'Footer' && isset($list_item))
                    do_action('wp_amp_breadcrumb', $list_item); ?>
            </div>
            <div class="nav-blog p-page w100 d-flex">
                <?php
                if (isset($prev)) {
                    if($pagination_title || $pagination_both){
                        $title = get_the_title($prev);
                        $post_name = mb_strlen($title) > $max_length ? mb_substr($title, 0, $max_length) . ' ...' : $title;
                    }
                    $link = get_the_permalink($prev);

                    ?>
                    <a class="prev-blog mr-auto" href="<?php echo $link."/amp/"; ?>" target="_top" rel="prev"
                       title="<?php echo $title; ?>">
                        <?php if(isset($post_name)) echo $post_name; ?>
                        <div class="txt-secondary arrow-size">&#8592;</div>
                        <?php  if($pagination_np || $pagination_both): ?>
                        <span>Previous Blog</span>
                        <?php endif; ?>
                    </a>
                <?php } ?>
                <?php
                if (isset($next)) {
                    if($pagination_title || $pagination_both){
                        $title = get_the_title($next);
                        $post_name = mb_strlen($title) > $max_length ? mb_substr($title, 0, $max_length) . ' ...' : $title;
                    }
                    $link = get_the_permalink($next);
                    ?>
                    <a class="next-blog ml-auto" href="<?php echo $link."/amp/"; ?>" target="_top" rel="next"
                       title="<?php echo $title; ?>">
                        <?php if(isset($post_name)) echo $post_name; ?>
                        <div class="txt-secondary arrow-size">&#8594;</div>
                    <?php  if($pagination_np || $pagination_both): ?>
                        <span>Next Blog</span>
                    <?php endif; ?>
                    </a>
                <?php } ?>
            </div>
        </div>
    </section>
</main>