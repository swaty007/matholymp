<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>	
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	

<?php if( 0 !== wp_get_current_user()->ID ):?> 



<?php else : ?>




<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-7558972045892090",
    enable_page_level_ads: true
  });
</script>


<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> <script> (adsbygoogle = window.adsbygoogle || []).push({ google_ad_client: "ca-pub-7558972045892090", enable_page_level_ads: true }); </script>
<?php endif; ?>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5LNHVFV');</script>
<!-- End Google Tag Manager -->

  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-105595298-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-105595298-1');
</script>


	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php esc_url(bloginfo( 'pingback_url' )); ?>">
	<?php endif; ?>

	<?php wp_head(); ?>
</head>
<body <?php body_class( ); ?> >
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5LNHVFV"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="pre-loader" style="
    position: fixed;
    width: 100%;
    height: 100%;
    background: white;
    z-index: 43242;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    text-align: center;
    opacity: 1;
    transition: 0.3s all;
">
<img class="logoimg" alt="brand" src="https://matholymp.com.ua/wp-content/uploads/2019/05/logo1.png" style="
    width: 20%;
    left: 50%;
    right: 0;
    top: 50%;
    -webkit-transform: translate(-50%,-50%);
    position: fixed;
    transform: translate(-50%,-50%);
">
</div>

<script>
document.addEventListener('DOMContentLoaded',function () {
	document.getElementById('pre-loader').style.opacity= '0';
setTimeout(function() {document.getElementById('pre-loader').style.display = 'none'; }, 350);
});
</script>


<div id="wrapper">
<?php get_template_part('header/header-navbar'); ?>
