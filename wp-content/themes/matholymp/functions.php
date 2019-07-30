<?php
function hidecategory($query) {
    if ( $query->is_home ) {
        $query->set('cat','-918');
    }
    return $query;
}
add_filter('pre_get_posts', 'hidecategory');




function wp39550_cancel_real_mime_check( $data, $file, $filename, $mimes ) {
	$wp_filetype = wp_check_filetype( $filename, $mimes );
 
	$ext = $wp_filetype['ext'];
	$type = $wp_filetype['type'];
	$proper_filename = $data['proper_filename'];
 
	return compact( 'ext', 'type', 'proper_filename' );
}
add_filter('wp_check_filetype_and_ext', 'wp39550_cancel_real_mime_check',10,4);


function kama_content_advertise($text){
    if( 0 == wp_get_current_user()->ID && is_single()) {
        //спустя сколько символов искать перенос строки и вставлять рекламу?
        $nu = 550;
//Код рекламы
        $adsense = <<<HTML
<div style="float:right;margin:0 0 10px 15px;min-width:250px;">
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle"
     style="display:block; text-align:center;"
     data-ad-layout="in-article"
     data-ad-format="fluid"
     data-ad-client="ca-pub-7558972045892090"
     data-ad-slot="9341159510"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
HTML;
        //	return str_replace('<span id="more-5424"></span>', $adsense.'<!--more-->', $text);
        return preg_replace('@([^^]{'.$nu.'}.*?)(\r?\n\r?\n|
)@', "\\1$adsense\\2", trim($text), 1);

    }else {
        return $text;
    }
}
//add_filter('the_content', 'kama_content_advertise', -10); //верхушка

add_filter( 'the_content', 'prefix_insert_post_ads' ); //низ контента
function prefix_insert_post_ads( $content ) {
$ad_code = '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script><!-- adaptive_block mmm --><ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-7558972045892090" data-ad-slot="2772199621" data-ad-format="auto"></ins><script>(adsbygoogle = window.adsbygoogle || []).push({});</script>';
if ( is_single() && 0 == wp_get_current_user()->ID   ) {
$closing_p = '</p>';
$paragraphs = explode( $closing_p, $content );
$count_p = count($paragraphs);
foreach ($paragraphs as $index => $paragraph) {
if ( trim( $paragraph ) ) {
$paragraphs[$index] .= $closing_p;
}
if ( $count_p == ($index + 1) ) {
$paragraphs[$index] .= $ad_code;
}
}
return implode( '', $paragraphs );
}
return $content;
}





add_filter('script_loader_tag', 'add_async_attribute', 49, 2);
function add_async_attribute($tag, $handle) {
if( is_admin() ){return $tag;}
    // добавьте дескрипторы (названия) скриптов в массив ниже
    $scripts_to_async = array('jquery-core');
    foreach($scripts_to_async as $async_script) {
        if ($async_script === $handle) {
            return str_replace(' src', ' src', $tag);
        } else {
 return str_replace(' src', ' defer src', $tag);
        }
    }
    return $tag;
}

function my_myme_types($mime_types){
    $mime_types['svg'] = 'image/svg+xml';
    return $mime_types;
}
add_filter('upload_mimes', 'my_myme_types');
