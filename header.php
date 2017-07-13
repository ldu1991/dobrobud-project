<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

?><!DOCTYPE HTML>
<html <?php language_attributes(); ?>>

<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php if ( isset( $_SERVER['HTTP_USER_AGENT'] ) && ( false !== strpos( $_SERVER['HTTP_USER_AGENT'], 'MSIE' ) ) ) : ?>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <?php endif; ?>

    <?php
        $favicon = ld_options( 'favicon', false, 'url' );
        $mobile_favicon = ld_options( 'mobile-favicon', false, 'url' );
        $header_bar_color = ld_options( 'header-bar-color', false, false );
    ?>

    <?php if (!empty($favicon)) { ?>
        <link rel="shortcut icon" href="<?php echo $favicon;?>">
    <?php } ?>
    <?php if (!empty($mobile_favicon)) { ?>
        <link rel="apple-touch-icon-precomposed" href="<?php echo $mobile_favicon;?>">
    <?php } ?>
    <?php if (!empty($header_bar_color)) { ?>
        <meta name="theme-color" content="<?php echo $header_bar_color; ?>">
    <?php } ?>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
 
    <header class="site-header" itemscope itemtype="http://schema.org/WPHeader">
        <div class="container">
            <div class="site-header__block">
                <div class="site-header__logo">
                    <?php Beyond()->get_logo( 'logo', 'logo-retina' ); ?>
                </div>

                <div class="site-header__description" itemprop="description">
                    Оптовая продажа битумной черепицы с доставкой по Украине
                </div>

                <div class="site-header__tel">
                    <?php
                    $contact_center = ld_options( 'contact-center' );
                    if(!empty($contact_center)) {
                        $i=0;
                        foreach($contact_center as $tel) {
                            $tel_link = preg_replace('/[^0-9]/', '', $tel);
                            echo '<a href="tel:'.$tel_link.'">'.$tel.'</a>';
                            $i++;
                            if($i >= 3) break;
                        }
                    }
                    ?>

                    <span class="site-header__tel--icon"></span>
                </div>

                <div class="site-header__call-back">
                    <button>Обратный звонок специалиста</button>
                    <span>Закажите:</span>
                </div>
            </div>
        </div>
    </header>

