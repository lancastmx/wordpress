<?php

function init_template(){
        
add_theme_support('post-thumbnails');
add_theme_support('title-tag'); 

register_nav_menus(array('top_menu' => 'Menú principal'));

}

add_action( 'after_setup_theme','init_template');

function assets(){

wp_register_style('bootstrap','https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css','','5.1.3','all');
wp_register_style('ebGaramond','https://fonts.googleapis.com/css2?family=EB+Garamond&display=swap', '','1.0','all');
    
wp_enqueue_style('estilos', get_stylesheet_uri(),array('bootstrap','ebGaramond'),'1.0','all');

wp_register_script('popper','https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js','','1.16.0',true);
wp_enqueue_script('bootstrap','https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js', array('jquery','popper'),'5.1.3',true);


wp_enqueue_script('custom',get_template_directory_uri().'/assets/js/custom.js','','1.0',true);

}


add_action('wp_enqueue_scripts','assets');

function sidebar(){
    register_sidebar(
        array(
            'name' => 'Pie de página',
            'id' => 'footer',
            'description' => 'Zona de widgets para pie de página',
            'before_title' => '<p>',
            'after_title' => '</p>',
            'before_widget' => '<div id=""%1$s class=%2$s>',
            'after_widget ' => '</div>',
        )
        );
}

add_action( 'widgets_init', 'sidebar');

function productos_type(){
        $libels = array(
            'name' => 'Productos',
            'singular_name'=> 'Producto',
            'menu_name' => 'productos',
        );

        $args = array(
            'label' => 'Productos',
            'description' => 'Productos ejemplo',
            'libels ' => $libels,
            'supports' => array('title','editor','thumbnali','revisions'),
            'public' => true,
            'show_in_menu' => true,
            'menu_position'=> 5,
            'menu_icon' => 'dashicons-cart',
            'can_export' => true,
            'publicly_queryable' => true,
            'rewrite' => true,
            'show_in_rest' => true,
        );
        register_post_type( 'producto', $args);
}

add_action( 'init','productos_type');