<?php
global $post;
global $data;
global $list_item;

$data = (get_option('amp_mrcat_form') !== null) ? get_option('amp_mrcat_form') : '';

/*
 *
 * define category list and
 * list item for breadcrumb
 *
 *
 */
$blog_url = get_permalink( get_option( 'page_for_posts' ) );
$site_url = get_site_url();
$current_url = get_the_permalink();
$categories_list = get_the_category();
$post_type = get_post_type_object(get_post_type());
$post_type_link = get_bloginfo('url').'/'.strtolower($post_type->labels->singular_name).'/';

if(is_singular('post')){
    $post_type_link = $blog_url;
}else{
    $post_type_link = get_bloginfo('url').'/'.strtolower($post_type->labels->singular_name).'/';
}
if ($categories_list){
    $cat =  $categories_list;

    if(!empty(get_option('category_base'))){
        $cat[0]->taxonomy = get_option('category_base');
    }
    $list_item = array(
        'Home'=>$site_url."/",
        $post_type->labels->name => $post_type_link,
        $cat[0]->name =>  get_category_link( $cat[0]->term_id ),
        get_the_title()=>$current_url
    );
}else{
    $list_item = array(
        'Home'=>$site_url."/",
        $post_type->labels->singular_name => $post_type_link,
        get_the_title()=>$current_url
    );
}
/*
 *
 * define pagination variable
 *
 *
 */
$pagination = $data['pagination_mrcat_amp'];
$pagination_both=(isset($pagination) && $pagination == 'pagination_both');
$pagination_np= (isset($pagination) && $pagination == 'pagination_np') ;
$pagination_title=(isset($pagination) && $pagination == 'pagination_title');
$max_length = 40; //limit char of title pagination!
$next_post= get_next_post();
$prev_post = get_previous_post();
if (!empty($next_post) && isset($next_post)) $next = get_next_post();
if (!empty($prev_post) && isset($prev_post) ) $prev = get_previous_post();