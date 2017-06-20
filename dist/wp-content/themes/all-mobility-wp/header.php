<?php   if(!session_id()) {
    session_start();

} ?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="format-detection" content="telephone=no">
        <meta name="format-detection" content="address=no">
        <link rel='shortcut icon' type='image/x-icon' href='https://allaroundmobility.com/wp-content/themes/all-mobility-wp/assets/img/favicon.ico' />

        <link rel="shortcut icon" href="https://allaroundmobility.com/wp-content/themes/all-mobility-wp/faviconit/favicon.ico">
        <link rel="icon" sizes="16x16 32x32 64x64" href="<https://allaroundmobility.com/wp-content/themes/all-mobility-wp/faviconit/favicon.ico">
        <link rel="icon" type="image/png" sizes="196x196" href="https://allaroundmobility.com/wp-content/themes/all-mobility-wp/faviconit/favicon-192.png">
        <link rel="icon" type="image/png" sizes="160x160" href="https://allaroundmobility.com/wp-content/themes/all-mobility-wp/faviconit/favicon-160.png">
        <link rel="icon" type="image/png" sizes="96x96" href="https://allaroundmobility.com/wp-content/themes/all-mobility-wp/faviconit/favicon-96.png">
        <link rel="icon" type="image/png" sizes="64x64" href="https://allaroundmobility.com/wp-content/themes/all-mobility-wp/faviconit/favicon-64.png">
        <link rel="icon" type="image/png" sizes="32x32" href="https://allaroundmobility.com/wp-content/themes/all-mobility-wp/faviconit/favicon-32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="https://allaroundmobility.com/wp-content/themes/all-mobility-wp/faviconit/favicon-16.png">
        <link rel="apple-touch-icon" href="https://allaroundmobility.com/wp-content/themes/all-mobility-wp/faviconit/favicon-57.png">
        <link rel="apple-touch-icon" sizes="114x114" href="https://allaroundmobility.com/wp-content/themes/all-mobility-wp/faviconit/favicon-114.png">
        <link rel="apple-touch-icon" sizes="72x72" href="https://allaroundmobility.com/wp-content/themes/all-mobility-wp/faviconit/favicon-72.png">
        <link rel="apple-touch-icon" sizes="144x144" href="https://allaroundmobility.com/wp-content/themes/all-mobility-wp/faviconit/favicon-144.png">
        <link rel="apple-touch-icon" sizes="60x60" href="https://allaroundmobility.com/wp-content/themes/all-mobility-wp/faviconit/favicon-60.png">
        <link rel="apple-touch-icon" sizes="120x120" href="https://allaroundmobility.com/wp-content/themes/all-mobility-wp/faviconit/favicon-120.png">
        <link rel="apple-touch-icon" sizes="76x76" href="https://allaroundmobility.com/wp-content/themes/all-mobility-wp/faviconit/favicon-76.png">
        <link rel="apple-touch-icon" sizes="152x152" href="https://allaroundmobility.com/wp-content/themes/all-mobility-wp/faviconit/favicon-152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="https://allaroundmobility.com/wp-content/themes/all-mobility-wp/faviconit/favicon-180.png">
        <meta name="msapplication-TileColor" content="#FFFFFF">
        <meta name="msapplication-TileImage" content="https://allaroundmobility.com/wp-content/themes/all-mobility-wp/faviconit/favicon-144.png">
        <meta name="msapplication-config" content="https://allaroundmobility.com/wp-content/themes/all-mobility-wp/faviconit/browserconfig.xml">



        <title><?php document_title(); ?></title>
        <?php wp_head() ?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-100436176-1', 'auto');
  ga('send', 'pageview');


</script>

    </head>



    <body data-action="<?php echo admin_url( 'admin-ajax.php' );?>">

    <?php

    if( is_page_template('page-checkout.php') ){
        $checkoutClass = 'site_no-footer site_checkout';
    } else {
        $checkoutClass = '';
    }


?>


    <!-- site -->
    <div class="site <?= $checkoutClass ?>">
        
        <!-- site__header -->
        <header class="site__header">
            
            <!-- site__header-layout -->
            <div class="site__header-layout">

                <?php if( is_front_page() ):
                    $start_wrap = '<h1 class="logo">';
                    $end_wrap = '</h1>';
                else:
                    $start_wrap = '<a href="'.get_home_url().'" class="logo">';
                    $end_wrap = '</a>';
                endif; ?>

                <?= $start_wrap  ?>

                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     viewBox="0 0 195 54" style="enable-background:new 0 0 195 54;" xml:space="preserve">
<style type="text/css">
    .st0{enable-background:new    ;}
    .st1{fill:#F37820;}
    .st2{fill:#FFFFFF;}
    .st3{fill:#0094C1;}
</style>
                    <title>Group 2</title>
                    <desc>Created with Sketch.</desc>
                    <g id="Welcome">
                        <g id="Group-2">
                            <g>
                                <g class="st0">
                                    <path class="st1" d="M85.6,17.2h-2.3c-0.1,0-0.2,0-0.3-0.1c-0.1-0.1-0.2-0.2-0.2-0.3l-0.6-2.1h-2.9l-0.5,2.1
					c0,0.1-0.1,0.2-0.2,0.3c-0.1,0.1-0.2,0.1-0.3,0.1H76c-0.1,0-0.2,0-0.3-0.1s-0.1-0.2,0-0.3l3-10.7c0.1-0.3,0.3-0.4,0.5-0.4h3
					c0.3,0,0.5,0.1,0.5,0.4l3.1,10.7c0,0.1,0,0.2,0,0.3S85.7,17.2,85.6,17.2z M80.7,8.1l-0.2,1l-0.8,3.4h2L81,9.1L80.7,8.1L80.7,8.1
					z"/>
                                    <path class="st1" d="M89.9,6.2v8.6H94c0.1,0,0.2,0,0.3,0.1c0.1,0.1,0.1,0.2,0.1,0.3l-0.1,1.6c0,0.1,0,0.2-0.1,0.3
					c-0.1,0.1-0.2,0.1-0.3,0.1h-6.4c-0.1,0-0.2,0-0.3-0.1C87,17,87,16.9,87,16.8V6.2c0-0.1,0-0.2,0.1-0.3c0.1-0.1,0.2-0.1,0.3-0.1
					h2.1c0.1,0,0.2,0,0.3,0.1C89.9,6,89.9,6.1,89.9,6.2z"/>
                                    <path class="st1" d="M98.5,6.2v8.6h4.1c0.1,0,0.2,0,0.3,0.1c0.1,0.1,0.1,0.2,0.1,0.3l-0.1,1.6c0,0.1,0,0.2-0.1,0.3
					c-0.1,0.1-0.2,0.1-0.3,0.1H96c-0.1,0-0.2,0-0.3-0.1c-0.1-0.1-0.1-0.2-0.1-0.3V6.2c0-0.1,0-0.2,0.1-0.3c0.1-0.1,0.2-0.1,0.3-0.1
					H98c0.1,0,0.2,0,0.3,0.1S98.5,6.1,98.5,6.2z"/>
                                    <path class="st1" d="M118,17.2h-2.3c-0.1,0-0.2,0-0.3-0.1c-0.1-0.1-0.2-0.2-0.2-0.3l-0.6-2.1h-2.9l-0.5,2.1
					c0,0.1-0.1,0.2-0.2,0.3c-0.1,0.1-0.2,0.1-0.3,0.1h-2.2c-0.1,0-0.2,0-0.3-0.1s-0.1-0.2,0-0.3l3-10.7c0.1-0.3,0.3-0.4,0.5-0.4h3
					c0.3,0,0.5,0.1,0.5,0.4l3.1,10.7c0,0.1,0,0.2,0,0.3S118.1,17.2,118,17.2z M113.1,8.1l-0.2,1l-0.8,3.4h2l-0.8-3.4L113.1,8.1
					L113.1,8.1z"/>
                                    <path class="st1" d="M125.9,12.2l2.3,4.6c0,0.1,0,0.2,0,0.3c0,0.1-0.1,0.1-0.2,0.1h-2.3c-0.3,0-0.5-0.1-0.6-0.4l-1.7-3.9h-1v3.8
					c0,0.1,0,0.2-0.1,0.3s-0.2,0.1-0.3,0.1h-2c-0.1,0-0.2,0-0.3-0.1s-0.1-0.2-0.1-0.3V6.3c0-0.1,0-0.2,0.1-0.3s0.2-0.1,0.3-0.1
					c1-0.1,2.1-0.1,3.2-0.1c1.7,0,2.9,0.3,3.7,0.8c0.8,0.6,1.2,1.4,1.2,2.6c0,0.7-0.2,1.3-0.6,1.9C126.9,11.6,126.4,12,125.9,12.2z
					 M122.2,10.7h0.9c0.5,0,0.9-0.1,1.3-0.4c0.3-0.2,0.5-0.6,0.5-1c0-0.9-0.5-1.4-1.6-1.4c-0.4,0-0.8,0-1.1,0V10.7z"/>
                                    <path class="st1" d="M128.9,11.5c0-1.7,0.5-3.1,1.4-4.3c0.9-1.1,2.2-1.7,3.9-1.7c1.7,0,3,0.6,3.9,1.7c0.9,1.1,1.4,2.5,1.4,4.2
					c0,1.8-0.5,3.3-1.4,4.4c-0.9,1.1-2.2,1.6-3.9,1.6c-1.7,0-3-0.6-3.9-1.7S128.9,13.2,128.9,11.5z M136.4,11.5c0-1.1-0.2-2-0.6-2.6
					s-0.9-0.9-1.7-0.9c-1.5,0-2.3,1.2-2.3,3.6c0,2.4,0.8,3.5,2.3,3.5C135.7,15,136.4,13.8,136.4,11.5z"/>
                                    <path class="st1" d="M140.8,12.5V6.2c0-0.1,0-0.2,0.1-0.3s0.2-0.1,0.3-0.1h2.1c0.1,0,0.2,0,0.3,0.1c0.1,0.1,0.1,0.2,0.1,0.3v6.5
					c0,0.8,0.2,1.3,0.5,1.8c0.3,0.4,0.8,0.6,1.4,0.6c1.2,0,1.8-0.8,1.8-2.4V6.2c0-0.1,0-0.2,0.1-0.3c0.1-0.1,0.2-0.1,0.3-0.1h2.1
					c0.1,0,0.2,0,0.3,0.1s0.1,0.2,0.1,0.3V12c0,1.8-0.4,3.1-1.1,4c-0.8,0.9-2,1.4-3.7,1.4C142.3,17.4,140.8,15.7,140.8,12.5z"/>
                                    <path class="st1" d="M154.6,9.9l0,3v3.9c0,0.1,0,0.2-0.1,0.3c-0.1,0.1-0.2,0.1-0.3,0.1h-1.9c-0.1,0-0.2,0-0.3-0.1
					s-0.1-0.2-0.1-0.3V6.2c0-0.1,0-0.2,0.1-0.3s0.2-0.1,0.3-0.1h2.6c0.3,0,0.5,0.1,0.6,0.4c0.1,0.2,0.3,0.7,0.7,1.5
					c0.4,0.8,0.7,1.4,0.9,1.8c0.2,0.4,0.4,0.9,0.7,1.5c0.3,0.6,0.6,1.3,0.9,1.8l-0.1-2.9V6.2c0-0.1,0-0.2,0.1-0.3
					c0.1-0.1,0.2-0.1,0.3-0.1h1.9c0.1,0,0.2,0,0.3,0.1c0.1,0.1,0.1,0.2,0.1,0.3v10.6c0,0.1,0,0.2-0.1,0.3c-0.1,0.1-0.2,0.1-0.3,0.1
					h-2.3c-0.3,0-0.5-0.1-0.6-0.4C156.4,13.5,155.2,11.1,154.6,9.9z"/>
                                    <path class="st1" d="M166.9,5.7c2,0,3.6,0.5,4.6,1.5s1.6,2.4,1.6,4.2c0,2.1-0.6,3.6-1.8,4.6c-1.2,0.9-2.9,1.4-5.2,1.4
					c-0.6,0-1.4,0-2.5-0.1c-0.1,0-0.2-0.1-0.3-0.1c-0.1-0.1-0.1-0.2-0.1-0.3V6.3c0-0.1,0-0.2,0.1-0.3s0.2-0.1,0.3-0.1
					C164.6,5.7,165.7,5.7,166.9,5.7z M166.1,8V15c0.1,0,0.3,0,0.6,0c1.1,0,1.9-0.3,2.5-0.8s0.9-1.5,0.9-2.8c0-1.1-0.3-2-0.8-2.5
					C168.7,8.3,168,8,167.1,8C166.7,8,166.4,8,166.1,8z"/>
                                </g>
                                <g class="st0">
                                    <path class="st2" d="M81.4,27.6l-0.3,5.7L81,39.1c0,0.2-0.1,0.4-0.2,0.5c-0.1,0.1-0.3,0.2-0.5,0.2h-3.2c-0.2,0-0.4-0.1-0.5-0.2
					c-0.1-0.1-0.2-0.3-0.2-0.5l0.7-17.6c0-0.2,0.1-0.4,0.2-0.5s0.3-0.2,0.5-0.2h4.9c0.5,0,0.7,0.2,0.9,0.7l1.2,4.7l1.8,7.1l1.9-7.1
					l1.3-4.6c0.1-0.5,0.4-0.7,0.9-0.7h4.8c0.5,0,0.7,0.2,0.7,0.7l0.5,17.6c0,0.2,0,0.3-0.2,0.5c-0.1,0.1-0.3,0.2-0.5,0.2h-3.4
					c-0.5,0-0.7-0.2-0.7-0.7L92,33.3l-0.1-5.7l-3.4,11.6c-0.1,0.5-0.4,0.7-0.9,0.7h-2.5c-0.5,0-0.8-0.2-0.9-0.7L81.4,27.6z"/>
                                    <path class="st2" d="M98.9,30.4c0-2.9,0.8-5.2,2.3-7.1s3.7-2.8,6.5-2.8c2.8,0,5,0.9,6.5,2.8c1.5,1.8,2.3,4.1,2.3,6.9
					c0,3-0.8,5.5-2.3,7.3s-3.7,2.7-6.5,2.7c-2.8,0-5-0.9-6.5-2.8C99.6,35.5,98.9,33.2,98.9,30.4z M111.4,30.3c0-1.9-0.3-3.3-0.9-4.3
					c-0.6-1-1.5-1.5-2.8-1.5c-2.5,0-3.8,2-3.8,6c0,3.9,1.3,5.9,3.8,5.9C110.2,36.2,111.4,34.2,111.4,30.3z"/>
                                    <path class="st2" d="M124.8,20.7c1.2,0,2.2,0.1,3.1,0.2c0.9,0.1,1.7,0.4,2.5,0.7c0.8,0.3,1.4,0.8,1.8,1.5s0.6,1.5,0.6,2.4
					c0,0.9-0.3,1.7-0.8,2.5s-1.3,1.3-2.3,1.7c1.1,0.3,2,0.9,2.7,1.8c0.7,0.8,1,1.8,1,2.9c0,2-0.8,3.5-2.4,4.3s-4.1,1.3-7.6,1.3
					c-0.9,0-2.2,0-3.9-0.1c-0.2,0-0.4-0.1-0.5-0.2c-0.1-0.1-0.2-0.3-0.2-0.5V21.7c0-0.2,0.1-0.4,0.2-0.5c0.1-0.1,0.3-0.2,0.5-0.2
					C121.7,20.8,123.5,20.7,124.8,20.7z M123.5,24.5v3.8h1.2c2,0,3-0.7,3-2c0-1.2-0.8-1.8-2.4-1.8C125.2,24.4,124.5,24.4,123.5,24.5
					z M123.5,31.8v4.4c0.3,0,0.8,0,1.5,0c2.1,0,3.2-0.7,3.2-2.2c0-1.5-1-2.2-2.9-2.2H123.5z"/>
                                    <path class="st2" d="M139.8,39.8h-3.5c-0.2,0-0.4-0.1-0.5-0.2s-0.2-0.3-0.2-0.5V21.5c0-0.2,0.1-0.4,0.2-0.5s0.3-0.2,0.5-0.2h3.5
					c0.2,0,0.4,0.1,0.5,0.2s0.2,0.3,0.2,0.5v17.6c0,0.2-0.1,0.4-0.2,0.5S140,39.8,139.8,39.8z"/>
                                    <path class="st2" d="M148.2,21.5v14.3h6.8c0.2,0,0.3,0.1,0.5,0.2c0.1,0.1,0.2,0.3,0.2,0.5l-0.2,2.6c0,0.2-0.1,0.4-0.2,0.5
					c-0.1,0.1-0.3,0.2-0.5,0.2h-10.7c-0.2,0-0.4-0.1-0.5-0.2s-0.2-0.3-0.2-0.5V21.5c0-0.2,0.1-0.4,0.2-0.5s0.3-0.2,0.5-0.2h3.5
					c0.2,0,0.4,0.1,0.5,0.2S148.2,21.3,148.2,21.5z"/>
                                    <path class="st2" d="M161.7,39.8h-3.5c-0.2,0-0.4-0.1-0.5-0.2s-0.2-0.3-0.2-0.5V21.5c0-0.2,0.1-0.4,0.2-0.5s0.3-0.2,0.5-0.2h3.5
					c0.2,0,0.4,0.1,0.5,0.2s0.2,0.3,0.2,0.5v17.6c0,0.2-0.1,0.4-0.2,0.5S161.9,39.8,161.7,39.8z"/>
                                    <path class="st2" d="M164.3,24.2l0.2-2.7c0-0.2,0.1-0.4,0.2-0.5c0.1-0.1,0.3-0.2,0.5-0.2h12.5c0.2,0,0.3,0.1,0.5,0.2
					c0.1,0.1,0.2,0.3,0.2,0.5l-0.2,2.7c0,0.2-0.1,0.3-0.2,0.5c-0.1,0.1-0.3,0.2-0.5,0.2h-3.8v14.2c0,0.2-0.1,0.4-0.2,0.5
					c-0.1,0.1-0.3,0.2-0.5,0.2h-3.5c-0.2,0-0.4-0.1-0.5-0.2c-0.1-0.1-0.2-0.3-0.2-0.5V24.9h-3.9c-0.2,0-0.3-0.1-0.5-0.2
					C164.3,24.5,164.3,24.4,164.3,24.2z"/>
                                    <path class="st2" d="M184.6,39.1v-6.4l-5.4-11.3c-0.1-0.2-0.1-0.3,0-0.4c0.1-0.1,0.2-0.2,0.4-0.2h4.1c0.5,0,0.8,0.2,0.9,0.7
					l1.3,3.6l1.3,4l1.3-4l1.3-3.6c0.1-0.5,0.4-0.7,0.9-0.7h4.1c0.2,0,0.3,0.1,0.4,0.2c0.1,0.1,0.1,0.3,0,0.4l-5.4,11.3v6.4
					c0,0.2-0.1,0.4-0.2,0.5s-0.3,0.2-0.5,0.2h-3.7c-0.2,0-0.4-0.1-0.5-0.2C184.6,39.5,184.6,39.3,184.6,39.1z"/>
                                </g>
                                <path id="Fill-2" class="st3" d="M21.6,0.6c6.2,0,12.5,0,18.7,0c8,0,14.9,2.8,20.3,8.8c3.4,3.8,5.4,8.2,6.3,13.2
				C68.8,33.6,63,45,53.3,50c-5.7,3-11.7,3.8-18,2.4c-9.7-2.2-16.1-8.2-19.3-17.5c-0.8-2.4-0.9-5.2-1.2-7.8
				c-0.1-1.4,0.7-2.2,1.9-2.2c1,0,2,0.9,1.9,2.2c0,2.8,0.5,5.5,1.6,8.1c3,6.9,8,11.5,15.4,13.4c9.5,2.4,18.4-1.5,23.7-8.9
				c8.1-11.4,3.4-27.8-9.5-33.3c-3-1.3-6.1-1.9-9.2-1.9c-13.1,0-24.9,0-38,0C1.9,4.4,1,4.4,0.6,4C0.2,3.5-0.1,2.6,0,2
				c0.1-0.9,1-1.4,1.9-1.4c0.8-0.1,1.6,0,2.5,0C10.6,0.6,15.4,0.6,21.6,0.6"/>
                                <path id="Fill-3" class="st3" d="M25.9,8.8c5.1,0,10.1,0,15.2,0c7.7-0.1,14.7,5,17,12.3c3.2,9.8-1.9,20.1-12,23.2
				c-9.7,2.9-19.7-2.5-22.5-12c-0.5-1.6-0.7-3.2-0.9-4.8c-0.2-1.4,0.7-2.4,1.9-2.4c1.1,0,1.9,0.9,2,2.3c0.5,6.1,3.4,10.5,9.1,12.8
				c6.8,2.8,14.9-0.4,18-7.1c3.6-7.6-0.2-16.9-8.2-19.6c-1.6-0.5-3.4-0.7-5.1-0.7c-8.4-0.1-16.7,0-25.1,0c-2.2,0-5.4,0-7.5,0
				c-1.5,0-2.4-1-2.2-2.2c0.2-1,0.9-1.6,2.1-1.6C13.5,8.8,20.2,8.8,25.9,8.8L25.9,8.8z"/>
                                <path id="Fill-4" class="st1" d="M29.3,16.8c3.8,0,7.5,0,11.2,0c5,0,8.8,2.6,10.1,7.4c1.6,5.7-1.9,10.9-7.1,12.4
				c-4.6,1.3-10.4-1.3-12.1-6.9c-0.3-1-0.3-2.2-0.3-3.3c0-1.1,0.9-1.5,1.8-1.5c0.9,0,1.6,0.5,1.8,1.4c0.2,0.7,0.2,1.4,0.4,2.1
				c0.5,2.6,3.5,4.8,6.2,4.6c2.9-0.2,5.5-2.7,5.7-5.4c0.3-4.1-2.3-7-6.5-7c-7.8,0-15.6,0-23.4,0c-1.6,0-2.4-0.7-2.4-2
				c0-1.3,0.9-1.9,2.5-1.9C21.3,16.8,25.3,16.8,29.3,16.8L29.3,16.8"/>
                            </g>
                        </g>
                    </g>
</svg>

                <?= $end_wrap  ?>

                <?php      $cart = WC()->cart;
                $cart_url = $cart->get_cart_url();
                $count_products = $cart->get_cart_contents_count();
                if($cart->is_empty()){
                    $content_cart = 'Cart';
                } else{
                    $content_cart = $cart->get_cart_total();
                }
                if($_GET['em']){
                    $cart->empty_cart();
                }
                ?>

                <!-- cart -->
                <a href="<?= get_permalink(11) ?>" class="cart">

                    <img src="<?= DIRECT ?>img/shopping-cart-black-shape.png" width="32" height="28" alt="">

                    <span class="cart__price"><?= $content_cart ?></span>

                </a>
                <!-- /cart -->

                <!-- site__header-btn -->
                <button class="site__header-btn">
                    <span></span>
                </button>
                <!-- /site__header-btn -->

                <!-- site__header-get -->
                <a class="site__header-get popup__open" data-popup="get" href="#">

                    <img src="<?= DIRECT ?>img/book.png" width="17" height="18" alt="book">

                    GET A FREE CATALOG</a>
                <!-- /site__header-get -->

                <?php $phone = get_field('main_phone','options');  ?>

                <!-- site__header-call -->
                <a class="site__header-call" href="tel:<?= $phone ?>">

                    <span>NEED HELP? CALL NOW:</span>

                    <svg width="13px" height="18px" viewBox="0 0 13 18" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <!-- Generator: Sketch 43.1 (39012) - http://www.bohemiancoding.com/sketch -->
                        <desc>Created with Sketch.</desc>
                        <defs></defs>
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" opacity="0.5">
                            <g transform="translate(-230.000000, -79.000000)" fill="#FFFFFF">
                                <g transform="translate(230.000000, 79.000000)">
                                    <circle id="Oval-5-Copy-2" cx="11.5" cy="1.5" r="1.5"></circle>
                                    <circle id="Oval-5-Copy-5" cx="11.5" cy="6.5" r="1.5"></circle>
                                    <circle id="Oval-5-Copy-8" cx="11.5" cy="11.5" r="1.5"></circle>
                                    <circle id="Oval-5-Copy-3" cx="6.5" cy="1.5" r="1.5"></circle>
                                    <circle id="Oval-5-Copy-6" cx="6.5" cy="6.5" r="1.5"></circle>
                                    <circle id="Oval-5-Copy-9" cx="6.5" cy="11.5" r="1.5"></circle>
                                    <circle id="Oval-5-Copy-11" cx="6.5" cy="16.5" r="1.5"></circle>
                                    <circle id="Oval-5-Copy-4" cx="1.5" cy="1.5" r="1.5"></circle>
                                    <circle id="Oval-5-Copy-7" cx="1.5" cy="6.5" r="1.5"></circle>
                                    <circle id="Oval-5-Copy-10" cx="1.5" cy="11.5" r="1.5"></circle>
                                </g>
                            </g>
                        </g>
                    </svg>

                    <span>CALL</span> <?= $phone ?></a>
                <!-- /site__header-call -->

                <!-- site__hidden-items -->
                <div class="site__hidden-items">

                    <!-- logo-mobile -->
                    <div class="logo-mobile">

                        <svg width="45px" height="35px" viewBox="0 0 45 35" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <!-- Generator: Sketch 43.1 (39012) - http://www.bohemiancoding.com/sketch -->
                            <desc>Created with Sketch.</desc>
                            <defs></defs>
                            <g id="high-fildelity" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="main-menu-mobile" transform="translate(-30.000000, -25.000000)">
                                    <path d="M44.3772686,25.0148062 C48.5184306,25.0163712 52.6603742,25.0124586 56.8015361,25.0171537 C62.147215,25.0226314 66.6948331,26.895983 70.2935325,30.8946575 C72.5446738,33.3955897 73.8773807,36.3316028 74.4683053,39.6651358 C75.7759995,47.0419468 71.9217017,54.5760443 65.4621769,57.9463557 C61.6680659,59.9253475 57.6777616,60.5020643 53.5170585,59.5544332 C47.059097,58.0832966 42.7913083,54.0752319 40.6542874,47.870635 C40.0954103,46.246907 40.0453849,44.4369395 39.8562265,42.7020938 C39.7569574,41.7951538 40.3408472,41.2192194 41.1217118,41.223132 C41.8181587,41.2262621 42.4247162,41.8295846 42.418463,42.6582727 C42.4043934,44.5237992 42.7303399,46.3228114 43.4572709,48.0294864 C45.4293645,52.6557415 48.7974783,55.7122626 53.7163783,56.9314279 C60.0328618,58.4980319 65.9780634,55.9211953 69.4587343,51.0132332 C74.8560018,43.4024488 71.7294167,32.4956923 63.1219279,28.8421089 C61.150616,28.0055956 59.093323,27.6033806 56.9703717,27.5986855 C48.2487626,27.5791225 40.4283916,27.5939904 31.7067825,27.5775574 C31.2628074,27.5767749 30.6882974,27.539214 30.4115946,27.2723748 C30.1192589,26.9891028 29.9504233,26.3889104 30.012955,25.9694799 C30.1051892,25.3497245 30.6718828,25.0531496 31.2925099,25.0155887 C31.8388807,24.9819403 32.388378,25.0132411 32.936312,25.0132411 C37.050898,25.0140236 40.2634642,25.0132411 44.3772686,25.0148062" id="Fill-2" fill="#0094C1"></path>
                                    <path d="M46.6629608,30.0080697 C50.075839,30.0080697 53.4895082,30.0404846 56.9015955,30.0007763 C62.0743009,29.9399983 66.7764008,33.4537789 68.3669682,38.4845792 C70.5080253,45.2536312 67.0706281,52.3727647 60.2812546,54.4578564 C53.7323248,56.469204 47.041027,52.7033972 45.13725,46.150715 C44.8248312,45.0745386 44.6895816,43.9351531 44.5646141,42.8135958 C44.4602108,41.8711311 45.0526201,41.1669164 45.8316896,41.1385533 C46.6036408,41.1101902 47.0916468,41.7357987 47.1699492,42.7520074 C47.4926501,46.9448813 49.4620746,49.9854036 53.2933567,51.6004785 C57.8997537,53.5429444 63.2931295,51.3354863 65.4389322,46.7098729 C67.8805441,41.4456849 65.321874,35.0761472 59.9340347,33.2033734 C58.8567832,32.8289807 57.6514005,32.7130973 56.5037559,32.7025624 C50.8715182,32.6515089 45.2384895,32.6750097 39.6054607,32.6741994 C38.1366972,32.673389 35.9972219,32.7033728 34.5284583,32.6750097 C33.5429551,32.6563711 32.8959715,31.9651223 33.0138206,31.1474552 C33.1166419,30.4278433 33.6133482,30.0234668 34.425637,30.0226564 C38.281438,30.0194149 42.8071597,30.0210357 46.6629608,30.0210357 L46.6629608,30.0080697 Z" id="Fill-3" fill="#0094C1"></path>
                                    <path d="M48.9852527,36.0015964 C51.5743327,36.0015964 54.1626016,35.9975097 56.7516816,36.0024137 C60.2256883,36.0097697 62.8285573,37.8177117 63.7370064,41.1630583 C64.8190342,45.1483772 62.4424664,48.7315679 58.8046143,49.7703989 C55.6307202,50.6760046 51.6311108,48.8664279 50.4176823,44.9824585 C50.1954367,44.2713782 50.2100368,43.4622179 50.2351814,42.7020976 C50.2603259,41.963228 50.8621735,41.6779785 51.4891656,41.6706225 C52.0934465,41.6640839 52.5833601,41.9918346 52.7285497,42.6481536 C52.8339947,43.1222071 52.8891506,43.6077033 52.9840511,44.0842088 C53.3490529,45.9093148 55.3808967,47.4262861 57.2870176,47.303686 C59.2799279,47.1745473 61.1065595,45.4499733 61.2493158,43.5627499 C61.4634502,40.7102555 59.6416853,38.7184134 56.7865595,38.7126921 C51.4104874,38.7028841 46.0336042,38.7077881 40.6575321,38.7037014 C39.5284596,38.7037014 38.982579,38.2476292 39.0004236,37.3379369 C39.0182681,36.4364179 39.6176823,36.0065004 40.7086324,36.0138564 C43.4672354,36.0334724 46.2266496,36.020395 48.9852527,36.020395 L48.9852527,36.0015964" id="Fill-4" fill="#F37820"></path>
                                </g>
                            </g>
                        </svg>

                    </div>
                    <!-- /logo-mobile -->

                    <!-- login -->
                    <a href="<?= get_permalink(13) ?>" class="login">
                    
                        <img src="<?= DIRECT ?>img/person.png" width="12" height="12" alt="">

                        <?php if( is_user_logged_in() ): ?>
                            Profile
                        <?php else: ?>
                            Log In
                        <?php endif; ?>

                    </a>
                    <!-- /login -->

                    <?php get_template_part( 'content/content', 'search-form' ) ?>

                    <!-- site__hidden-close -->
                    <a href="#" class="site__hidden-close"></a>
                    <!-- /site__hidden-close -->

                    <a href="#" class="site__hidden-btn popup__open" data-popup="get">GET A FREE CATALOG</a>

                    <?php get_template_part( 'content/content', 'home-menu' ) ?>

                </div>
                <!-- /site__hidden-items -->


            </div>
            <!-- /site__header-layout -->

        </header>
        <!-- /site__header -->
