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





//add_filter('script_loader_tag', 'add_async_attribute', 49, 2);
function add_async_attribute($tag, $handle, $src) {
    if(is_admin()) {return $tag;}
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
add_filter('style_loader_tag', 'async_load_css', 10, 4);
function async_load_css ($html, $handle, $href, $media) {
    if( is_admin() ){return $html;} //если в админке

    //$href = str_replace('https://example.com/','/',$href);

    if( strpos($_SERVER['HTTP_USER_AGENT'],'MSIE')!==false ||
        strpos($_SERVER['HTTP_USER_AGENT'],'rv:11.0')!==false ) {
        return $html;
        //        return '<script async id="'.$handle.'-css-js">var async_css = document.createElement( "link" );async_css.id = "'.$handle.'-css";async_css.rel = "stylesheet";async_css.href = "'.$href.'";document.body.insertBefore( async_css, document.body.childNodes[ document.body.childNodes.length - 1 ].nextSibling );</script>';
//        return '<script async>var async_css = document.createElement( "link" );async_css.rel = "stylesheet";async_css.href = "'.$href.'";document.body.insertBefore( async_css, document.body.childNodes[ document.body.childNodes.length - 1 ].nextSibling );</script>';
    } else {
        return str_replace(" rel='stylesheet'", " rel='preload' as='style' onload=\"this.onload=null;this.rel='stylesheet';\" ", $html);
    }
}

add_action('wp_head', 'fix_header_jquery', 1);
function fix_header_jquery () {
    if(is_admin()) {return;}
    echo '<script>(function(w,d,u){w.readyQ=[];w.bindReadyQ=[];function p(x,y){if(x=="ready"){w.bindReadyQ.push(y);}else{w.readyQ.push(x);}};var a={ready:p,bind:p};w.$=w.jQuery=function(f){if(f===d||f===u){return a}else{p(f)}}})(window,document)</script>';
}
add_action('wp_footer', 'fix_footer_jquery', 8);
function fix_footer_jquery () {
    if(is_admin()) {return;}
    echo '<script>(function($,d){$.each(readyQ,function(i,f){$(f)});$.each(bindReadyQ,function(i,f){$(d).bind("ready",f)})})(jQuery,document)</script>';
}

//Disable REST API link tag
remove_action('wp_head', 'rest_output_link_wp_head', 10);
//Disable oEmbed Discovery Links
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
//Disable REST API link in HTTP headers
remove_action('template_redirect', 'rest_output_link_header', 11, 0);
remove_action('wp_head','feed_links_extra', 3); // убирает ссылки на rss категорий
remove_action('wp_head','feed_links', 2); // минус ссылки на основной rss и комментарии
remove_action('wp_head','rsd_link');  // сервис Really Simple Discovery
remove_action('wp_head','wlwmanifest_link'); // Windows Live Writer
remove_action('wp_head','wp_generator');  // скрыть версию wordpress

//add_filter('after_setup_theme', 'remove_redundant_shortlink');
function remove_redundant_shortlink() {
    // remove HTML meta tag
    // <link rel='shortlink' href='http://example.com/?p=25' />
    remove_action('wp_head', 'wp_shortlink_wp_head', 10);

    // remove HTTP header
    // Link: <https://example.com/?p=25>; rel=shortlink
    remove_action( 'template_redirect', 'wp_shortlink_header', 11);
}


add_action( 'wp_enqueue_scripts', 'my_jquery_cdn_method', 1);
function my_jquery_cdn_method() {
//  if(is_admin()) {return;}
    wp_enqueue_script( 'jquery' );
    // для версий WP меньше 3.6 'jquery' нужно поменять на 'jquery-core'
    // отменяем зарегистрированный jQuery
    wp_deregister_script( 'jquery-core' );
//    wp_deregister_script( 'jquery' );
    // регистрируем
    wp_register_script( 'jquery-core', '//ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js', false, '2.2.0', false);

    //wp_deregister_script( 'jquery-migrate' );
    //wp_register_script( 'jquery-migrate', "//cdnjs.cloudflare.com/ajax/libs/jquery-migrate/1.3.0/jquery-migrate.min.js", array(), '1.3.0',true);

    // подключаем
    wp_enqueue_script( 'jquery' );
}
add_action( 'wp_print_styles', 'my_font_awesome_cdn', 1);
function my_font_awesome_cdn() {
    wp_deregister_style( 'fontawesome' );
//    wp_register_style( 'fontawesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css', false, '4.7.0', 'all');
//    wp_enqueue_style( 'fontawesome' );
}


add_action( 'after_setup_theme', 'footer_enqueue_scripts' );
function footer_enqueue_scripts() {
    if(is_admin()) {return;}
    remove_action('wp_enqueue_scripts', 'ls_load_google_fonts'); //remove google fonts
    remove_action('admin_enqueue_scripts', 'ls_load_google_fonts'); //remove google fonts
    remove_action('wp_head', 'download_rss_link'); //RRS meta


    remove_action('wp_head', 'wp_print_scripts');
    remove_action('wp_head', 'wp_enqueue_scripts', 1);
  remove_action('wp_head', 'wp_print_styles',8);
    remove_action('wp_head', 'wp_print_head_scripts', 9);
//    wp_enqueue_style
//    style_loader_tag
    add_action('wp_footer','wp_print_scripts',4);
    add_action('wp_footer','wp_enqueue_scripts',5);
  add_action('wp_footer','wp_print_styles',6);
    add_action('wp_footer','wp_print_head_scripts',7);

}


function my_myme_types($mime_types){
    $mime_types['svg'] = 'image/svg+xml';
    return $mime_types;
}
add_filter('upload_mimes', 'my_myme_types');
