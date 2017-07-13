<form class="assortment-cat">
    <?php

    $args = array(
    	'type'         => 'post',
    	'taxonomy'     => 'category',
        'hide_empty'   => 0,
        'exclude'      => '1',
    );
    $categories = get_categories( $args );
    if( $categories ){
        $i = 1;
    	foreach( $categories as $cat ) {
            $checked = ($i === 1) ? 'checked' : '';
    	    $logo_brand = get_field( 'logo_brand', 'category_'.$cat->term_id );
    ?>
    <label>
        <input class="brand" name="brand" type="radio" value="<?php echo $cat->term_id; ?>" <?php echo $checked; ?> />
        <div class="logo-brand">
            <img src="<?php echo $logo_brand['url']; ?>" alt="<?php echo $cat->name; ?>" />
        </div>        
        <span class="radio-custom"></span>
        <h4><?php echo $cat->name; ?></h4>
    </label>
    <?php $i++; } } ?>
</form>