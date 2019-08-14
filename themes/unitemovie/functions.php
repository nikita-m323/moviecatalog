<?php

// The custom function MUST be hooked to the init action hook
add_action( 'init', 'lc_register_movie_post_type' );
// A custom function that calls register_post_type
function lc_register_movie_post_type() {
    // Set various pieces of text, $labels is used inside the $args array
    $labels = array(
        'name' => _x( 'Фильмы', 'post type general name' ),
        'singular_name' => _x( 'Movie', 'post type singular name' ),

  );
  // Set various pieces of information about the post type
  $args = array(
      'labels' => $labels,
      'public' => true,
      'supports' => array('title','editor','thumbnail'),
      'show_in_nav_menus'=> true,
      'publicly_queryable' => true,
      'show_ui'            => true,
      'show_in_menu'       => true,
      'query_var'          => true,
      'rewrite'            => true,
      'capability_type'    => 'post',
      'has_archive'        => true,
      'hierarchical'       => false,
      'menu_position'      => 6,

  );
  // Register the movie post type with all the information contained in the $arguments array
  register_post_type( 'movie', $args );
}

add_action( 'init', 'create_taxonomy' );
function create_taxonomy(){
    register_taxonomy('genres', array('movie'), array(
        'label'                 => '', // определяется параметром $labels->name
        'labels'                => array(
            'name'              => 'Жанры',
            'singular_name'     => 'Жанр',
            'search_items'      => 'Искать жанры',
            'all_items'         => 'Все жанры',
            'view_item '        => 'Показать жанры',
            'parent_item'       => 'Parent Genre',
            'parent_item_colon' => 'Parent Genre:',
            'edit_item'         => 'Редактировать жанр',
            'update_item'       => 'Обновить жанр',
            'add_new_item'      => 'Добавить новый жанр',
            'new_item_name'     => 'Новое название жанра',
            'menu_name'         => 'Жанры',
        ),
        'description'           => '', // описание таксономии
        'public'                => true,
        'publicly_queryable'    => null, // равен аргументу public
        'show_in_nav_menus'     => true, // равен аргументу public
        'show_ui'               => true, // равен аргументу public
        'show_in_menu'          => true, // равен аргументу show_ui
        'show_tagcloud'         => true, // равен аргументу show_ui
        'show_in_rest'          => null, // добавить в REST API
        'rest_base'             => null, // $taxonomy
        'hierarchical'          => false,
        //'update_count_callback' => '_update_post_term_count',
        'rewrite'               => true,
        //'query_var'             => $taxonomy, // название параметра запроса
        'capabilities'          => array(),
        'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
        'show_admin_column'     => false, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
        '_builtin'              => false,
        'show_in_quick_edit'    => null, // по умолчанию значение show_ui
    ) );
    register_taxonomy('countrys', array('movie'), array(
        'label'                 => '', // определяется параметром $labels->name
        'labels'                => array(
            'name'              => 'Страны',
            'singular_name'     => 'Страна',
            'search_items'      => 'Искать страны',
            'all_items'         => 'Все страны',
            'view_item '        => 'Показать страны',
            'parent_item'       => 'Parent Country',
            'parent_item_colon' => 'Parent Country:',
            'edit_item'         => 'Редактировать страну',
            'update_item'       => 'Обновить страну',
            'add_new_item'      => 'Добавить новую страну',
            'new_item_name'     => 'Новое название страны',
            'menu_name'         => 'Страны',
        ),
        'description'           => '', // описание таксономии
        'public'                => true,
        'publicly_queryable'    => null, // равен аргументу public
        'show_in_nav_menus'     => true, // равен аргументу public
        'show_ui'               => true, // равен аргументу public
        'show_in_menu'          => true, // равен аргументу show_ui
        'show_tagcloud'         => true, // равен аргументу show_ui
        'show_in_rest'          => null, // добавить в REST API
        'rest_base'             => null, // $taxonomy
        'hierarchical'          => false,
        //'update_count_callback' => '_update_post_term_count',
        'rewrite'               => true,
        //'query_var'             => $taxonomy, // название параметра запроса
        'capabilities'          => array(),
        'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
        'show_admin_column'     => false, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
        '_builtin'              => false,
        'show_in_quick_edit'    => null, // по умолчанию значение show_ui
    ) );
    register_taxonomy('years', array('movie'), array(
        'label'                 => '', // определяется параметром $labels->name
        'labels'                => array(
            'name'              => 'Год',
            'singular_name'     => 'Год',
            'search_items'      => 'Искать год',
            'all_items'         => 'Все года',
            'view_item '        => 'Показать год',
            'parent_item'       => 'Parent Year',
            'parent_item_colon' => 'Parent Year:',
            'edit_item'         => 'Редактировать год',
            'update_item'       => 'Обновить год',
            'add_new_item'      => 'Добавить новый год',
            'new_item_name'     => 'Новое название года',
            'menu_name'         => 'Год',
        ),
        'description'           => '', // описание таксономии
        'public'                => true,
        'publicly_queryable'    => null, // равен аргументу public
        'show_in_nav_menus'     => true, // равен аргументу public
        'show_ui'               => true, // равен аргументу public
        'show_in_menu'          => true, // равен аргументу show_ui
        'show_tagcloud'         => true, // равен аргументу show_ui
        'show_in_rest'          => null, // добавить в REST API
        'rest_base'             => null, // $taxonomy
        'hierarchical'          => false,
        //'update_count_callback' => '_update_post_term_count',
        'rewrite'               => true,
        //'query_var'             => $taxonomy, // название параметра запроса
        'capabilities'          => array(),
        'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
        'show_admin_column'     => false, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
        '_builtin'              => false,
        'show_in_quick_edit'    => null, // по умолчанию значение show_ui
    ) );
    register_taxonomy('actors', array('movie'), array(
        'label'                 => '', // определяется параметром $labels->name
        'labels'                => array(
            'name'              => 'Актеры',
            'singular_name'     => 'Актер',
            'search_items'      => 'Искать актера',
            'all_items'         => 'Все актеры',
            'view_item '        => 'Показать актера',
            'parent_item'       => 'Parent Actor',
            'parent_item_colon' => 'Parent Actor:',
            'edit_item'         => 'Редактировать актера',
            'update_item'       => 'Обновить актера',
            'add_new_item'      => 'Добавить нового актера',
            'new_item_name'     => 'Новое название актера',
            'menu_name'         => 'Актеры',
        ),
        'description'           => '', // описание таксономии
        'public'                => true,
        'publicly_queryable'    => null, // равен аргументу public
        'show_in_nav_menus'     => true, // равен аргументу public
        'show_ui'               => true, // равен аргументу public
        'show_in_menu'          => true, // равен аргументу show_ui
        'show_tagcloud'         => true, // равен аргументу show_ui
        'show_in_rest'          => null, // добавить в REST API
        'rest_base'             => null, // $taxonomy
        'hierarchical'          => false,
        //'update_count_callback' => '_update_post_term_count',
        'rewrite'               => true,
        //'query_var'             => $taxonomy, // название параметра запроса
        'capabilities'          => array(),
        'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
        'show_admin_column'     => false, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
        '_builtin'              => false,
        'show_in_quick_edit'    => null, // по умолчанию значение show_ui
    ) );
}

add_action( 'init', 'genres_for_movie' );
function genres_for_movie(){
    register_taxonomy_for_object_type( 'genres', 'movie');
    register_taxonomy_for_object_type( 'countrys', 'movie');
    register_taxonomy_for_object_type( 'years', 'movie');
    register_taxonomy_for_object_type( 'actors', 'movie');
}


//-------output of five recent films----------------------
function five_movie($atts){
    $atts=shortcode_atts(array(
        'count'=>5
),$atts);
    $out_posts= get_posts( array(
        'numberposts' => $atts['count'],
        'orderby'     => 'date',
        'order'       => 'DESC',
        'post_type'   => 'movie',
    ) );
    $out = '<ul>';
    foreach( $out_posts as $post ){
        setup_postdata($post);
        $out .= '<li><a href="'. get_the_permalink($post->ID) .'">'. get_the_title($post->ID) .'</a></li>';
    }
    $out .= '</ul>';
    wp_reset_postdata(); // сброс
    return $out;
}

add_shortcode( 'five', 'five_movie' );