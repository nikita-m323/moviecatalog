<?php
/*
 * Plugin Name: Плагин вывода страны и жанров, цени и даты
 * Description: Плагин вывода страны и жанров, цени и даты
 * Version: 1.1
 * Author: Никита Макуха
 */


add_filter( 'the_content', 'my_the_content_filter' );

function my_the_content_filter( $content ){
    if( $GLOBALS['post']->post_type == 'movie' && (! is_single() )){
        $country_out='<span class="glyphicon glyphicon-hand-right"></span>';
            $countrys = get_the_terms( $post->ID, 'countrys' );
            if( is_array( $countrys ) ){
                foreach( $countrys as $countrys ){
                    $country_out.= '<a href="'. get_term_link( $countrys->term_id, $countrys->taxonomy ) .'">'. $countrys->name .'</a>, ';
                }
            }
        $genres_out=null;
            $genres = get_the_terms( $post->ID, 'genres' );
            if( is_array( $genres ) ){
                $end_element = array_pop($genres);
                foreach ($genres as $genres) {
                    $genres_out.= '<a href="'. get_term_link( $genres->term_id, $genres->taxonomy ) .'">'. $genres->name .'</a>, ';
                }
                $genres_out.= '<a href="'. get_term_link( $end_element->term_id, $end_element->taxonomy ) .'">'. $end_element->name .'</a>';
            }

            $price = get_field("session_cost");
            $price_out='<div class="session_cost">
                <span class="glyphicon glyphicon-euro"></span>
                <span class="label label-success">
                    '.$price.'
                </span>
            </div>';

            $date = get_field("release_date");
            $date_out='<div class="release_date">
                <span class="glyphicon glyphicon-calendar"></span>
                <span class="label label-info">
                     '.$date.' 
                </span>
            </div>';

        return $content. $country_out. $genres_out. $price_out. $date_out;
    }
    else return $content;
}

?>