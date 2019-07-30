<?php
/*
 *
 * Schema Here
 *
 *
 */
global $list_item;
global $post;
global $data;
$validate = [];
$comma = "";
$k = 1;
$author =  get_the_author_meta('display_name', get_the_author_meta($post->ID));
$post_date = get_the_date('Y-m-d') . "T" . get_the_date('H:i') . ":33.809Z";
if (isset($data['logo_url'])){$logo=$data['logo_url'];$validate['logo_url']="valid";}else{$validate['logo_url']="not_valid";}
if (isset($data['logo_width'])&&!empty($data['logo_width'])){$logo_width= trim($data['logo_width']);$validate['logo_width']="valid";}else{$validate['logo_width']="not_valid";}
if (isset($data['logo_height'])&&!empty($data['logo_height'])){$logo_height= trim($data['logo_height']);$validate['logo_height']="valid";}else{$validate['logo_height']="not_valid";}
$featured_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), "full");
if($featured_url){$validate['image']="valid";}else{$validate['image']="not_valid";}
$start_schema_breadcrumb = '<script type="application/ld+json">
        {
        "@context": "https://schema.org",
        "@type": "BreadcrumbList",
        "itemListElement": [';
$end_schema_breadcrumb = "]}</script>";

if (isset($data['schema_gen']) && $data['schema_gen'] == true){

echo $start_schema_breadcrumb;
$total = count($list_item);
foreach ($list_item as $key => $value) {
    ($total > $k) ? $comma = "," : $comma = "";
    echo '{
            "@type": "ListItem",
            "position": "' . $k . '",
            "name": "' . $key . '",
            "item":"' . $value . '"
        }' . $comma . '';
    $k++;
}
echo $end_schema_breadcrumb;

if(!in_array('not_valid',$validate)){
echo '
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "Article",
  "author":  {
			"@type": "Person",
			"name": "'.$author.'"
		    },
  "headline":"'.get_the_title().'",
  "publisher":{
			"@type": "Organization",
			"name": "'.get_bloginfo("name").'",
			"url": "'.get_site_url().'",
			"logo": {
				"@type": "ImageObject",
				"url": "'.$logo.'",
				"width":"'.$logo_width.'",
				"height":"'.$logo_height.'"
			}
			},
  "datePublished":"'.$post_date.'",
  "mainEntityOfPage":"'.get_permalink().'",
  "dateModified":"'.$post_date.'",
  "image":{ "@type": "ImageObject",
          "url": "'.$featured_url[0].'",
          "width": '.$featured_url[1].',
          "height":'.$featured_url[2].'}
  }
  </script>';
}

}

if (isset($data['schema_status']) && $data['schema_status'] == true){
    if (isset($data['schema'])) echo $data['schema'];
}

