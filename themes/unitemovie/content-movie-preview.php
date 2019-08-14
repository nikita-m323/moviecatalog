

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="movie-preview col-md-4 ">
        <header class="entry-header page-header">

            <?php
            if ( of_get_option( 'single_post_image', 1 ) == 1 ) :
                the_post_thumbnail( 'medium', array( 'class' => 'thumbnail' ));
            endif;
            ?>

            <h1 class="entry-title "><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>


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


            <?php edit_post_link( __( 'Edit', 'unite' ), '<i class="fa fa-pencil-square-o"></i><span class="edit-link">', '</span>' ); ?>
            <?php unite_setPostViews(get_the_ID()); ?>

        </footer><!-- .entry-meta -->
    </div>
</article><!-- #post-## -->
