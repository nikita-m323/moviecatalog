<?php

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header page-header">
        <div class="image_movie">
            <?php
            if ( of_get_option( 'single_post_image', 1 ) == 1 ) :
                the_post_thumbnail( 'medium' );
            endif;
            ?>
        </div>
        <h1 class="entry-title "><?php the_title(); ?></h1>

        <div class="entry-meta">
            <?php unite_posted_on(); ?>
        </div><!-- .entry-meta -->
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php the_content(); ?>
        <?php
        wp_link_pages( array(
            'before' => '<div class="page-links">' . __( 'Pages:', 'unite' ),
            'after'  => '</div>',
        ) );
        ?>
    </div><!-- .entry-content -->

    <footer class="entry-meta">
        <?php

        $countrys = get_the_terms( $post->ID, 'countrys' );
        if( is_array( $countrys ) ){
            foreach( $countrys as $countrys ){
                echo '<a href="'. get_term_link( $countrys->term_id, $countrys->taxonomy ) .'">'. $countrys->name .'</a>, ';
            }
        }

        $genres = get_the_terms( $post->ID, 'genres' );
        if( is_array( $genres ) ){
            $end_element = array_pop($genres);
            foreach ($genres as $genres) {
                // выводим все кроме последнего с запятой
                echo '<a href="'. get_term_link( $genres->term_id, $genres->taxonomy ) .'">'. $genres->name .'</a>, ';
            }
            // выводим последний без запятой
            echo '<a href="'. get_term_link( $end_element->term_id, $end_element->taxonomy ) .'">'. $end_element->name .'</a>';
        }
        ?>

        <div class="session_cost">
            <?php $price = get_field("session_cost");
                echo 'Стоимость сеанса: '.$price;
            ?>
        </div>

        <div class="release_date">
            <?php $date = get_field("release_date");
            echo 'Дата выхода: '.$date;
            ?>
        </div>

        <?php edit_post_link( __( 'Edit', 'unite' ), '<i class="fa fa-pencil-square-o"></i><span class="edit-link">', '</span>' ); ?>
        <?php unite_setPostViews(get_the_ID()); ?>
        <hr class="section-divider">
    </footer><!-- .entry-meta -->
</article><!-- #post-## -->
