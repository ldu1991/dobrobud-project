<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

// Register Custom Post Type
function custom_post_gratitude() {

	$labels = array(
		'name'                => _x( 'Благодарности', 'Post Type General Name', 'st' ),
		'singular_name'       => _x( 'Благодарности', 'Post Type Singular Name', 'st' ),
		'menu_name'           => __( 'Благодарности', 'st' ),
		'name_admin_bar'      => __( 'Благодарности', 'st' ),
		'parent_item_colon'   => __( 'Источник записи:', 'st' ),
		'all_items'           => __( 'Все материалы', 'st' ),
		'add_new_item'        => __( 'Добавление записи', 'st' ),
		'add_new'             => __( 'Добавить запись', 'st' ),
		'new_item'            => __( 'Новая запись', 'st' ),
		'edit_item'           => __( 'Редактирование записи', 'st' ),
		'update_item'         => __( 'Обновление записи', 'st' ),
		'view_item'           => __( 'Посмотреть проект', 'st' ),
		'search_items'        => __( 'Поиск записи', 'st' ),
		'not_found'           => __( 'Проекты не найдены', 'st' ),
		'not_found_in_trash'  => __( 'Не найдено в корзине', 'st' ),
	);
	$args = array(
		'label'               => __( 'gratitude', 'st' ),
		'description'         => __( 'Благодарности', 'st' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail', ),
        'taxonomies'          => array(),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 6,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
        // 'menu_icon'           => plugins_url( 'images/image.png', __FILE__ ),
		'capability_type'     => 'post',
	);
	register_post_type( 'gratitude', $args );

}

// Hook into the 'init' action
add_action( 'init', 'custom_post_gratitude' );