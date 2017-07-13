<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

$price = get_field( 'price' );
$style_shingles = get_field( 'style_shingles' );
?>
<div class="slid">
    <article class="style-shingles">
        <div class="style-shingles__title">
            <?php the_title( '<h4>', '</h4>' ); ?>
            <span><?php _e('от ', 'dobrobud'); echo $price; _e(' грн./м2', 'dobrobud'); ?></span>
        </div>

        <div class="style-selection">
            <div class="style-selection__img img<?php the_ID(); ?>"></div>
            <form class="style-selection__color">
                <?php
                    $i = 1;
                    foreach($style_shingles as $styl) {
                    $checked = ($i === 1) ? 'checked' : '';
                ?>
                <label>
                    <input class="color-shingles<?php the_ID(); ?>" name="<?php the_ID(); ?>" type="radio" data-img="<?php echo $styl['shingles_img']['url']; ?>" data-color="<?php echo $styl['shingles_color']; ?>" <?php echo $checked; ?> />
                    <div class="color-style">
                        <span><i style="background-color: <?php echo $styl['shingles_color']; ?>"></i></span>
                        &nbsp;
                    </div>
                </label>
                <?php
                    $i++;
                    }
                ?>
            </form>
        </div>
    </article>
</div>