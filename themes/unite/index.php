<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package unite
 */

get_header(); ?>

    <aside class="sidebar">
        <div class="sidebar_title"><span class="title-h5">Наши агенства</span></div>

        <div class="sidebar_list">
        <?php
         wp_reset_query();

         $resent_list = get_transient( 'estate_sidebar' );

         if ( !$resent_list ) :
             $resent_list = new WP_Query(array('post_type' => 'agency', 'order' => 'ASC', 'posts_per_page' => -1));
             set_transient( 'estate_sidebar', $resent_list, 12 * HOUR_IN_SECONDS );
         endif;

         if ( $resent_list->have_posts() ) :
         while ( $resent_list->have_posts() ) :
            $resent_list->the_post(); ?>

                <a href="<?php echo esc_url(get_permalink()); ?>"><span><?php esc_html(the_title()); ?></span></a>

         <?php endwhile; endif; wp_reset_query(); ?>
         </div>
    </aside>



    <main class="main">
        <section class="estate">
            <div class="estate-container">
                <div class="estate_title"><span class="title-h1">Недвижимость</span></div>


                <div class="estate_content">
                <?php
                wp_reset_query();

                $resent_list = get_transient( 'estate_post' );

                if ( !$resent_list ) :
                    $resent_list = new WP_Query(array('post_type'=> 'estate', 'order'=> 'ASC', 'posts_per_page'=> -1));
                    set_transient( 'estate_post', $resent_list, 12 * HOUR_IN_SECONDS );
                endif;


                if ( $resent_list->have_posts() ) :
                while ( $resent_list->have_posts() ) :
                    $resent_list->the_post(); ?>

                    <div class="estateContent_card">
                        <div class="card_img">
                            <a href="<?php echo esc_url(get_permalink()); ?>"><img src="<?php esc_url(the_post_thumbnail_url()); ?>" alt="card img" /></a>
                        </div>

                        <div class="card_title"><span class="title-h4"><?php esc_html(the_title()); ?></span></div>

                        <div class="card_desc">
                            <div class="cardDesc_block">
                                <div class="block_prop"><span>Адрес</span></div>
                                <?php $estate_address= get_field( 'address' ); ?>
                                    <?php if ( $estate_address ): ?>
                                        <div class="block_value"><span><?php echo esc_html(wp_kses_post( $estate_address )); ?></span></div>
                                <?php endif ?>
                            </div>

                            <div class="cardDesc_block">
                                <div class="block_prop"><span>Площадь</span></div>
                                <?php $estate_area = get_field( 'area' ); ?>
                                    <?php if ( $estate_area ): ?>
                                        <div class="block_value"><span><?php echo esc_html(wp_kses_post( $estate_area )); ?>м<sup>2</sup></span></div>
                                <?php endif ?>
                            </div>
                            <div class="cardDesc_block">
                                <div class="block_prop"><span>Жилая площадь</span></div>
                                <?php $estate_space= get_field( 'living_space' ); ?>
                                    <?php if ( $estate_space ): ?>
                                        <div class="block_value"><span><?php echo esc_html(wp_kses_post( $estate_space )); ?>м<sup>2</sup></span></div>
                                <?php endif ?>
                            </div>
                            <div class="cardDesc_block">
                                <div class="block_prop"><span>Этаж</span></div>
                                <?php $estate_floor = get_field( 'floor' ); ?>
                                    <?php if ( $estate_floor ): ?>
                                        <div class="block_value"><span><?php echo esc_html(wp_kses_post( $estate_floor )); ?></span></div>
                                <?php endif ?>
                            </div>
                            <div class="cardDesc_block">
                                <div class="block_prop"><span>Стоимость</span></div>
                                <?php $estate_cost = get_field( 'cost' ); ?>
                                    <?php if ( $estate_cost ): ?>
                                        <div class="block_value"><span><?php echo esc_html(wp_kses_post( $estate_cost )); ?></span></div>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>

                <?php  endwhile; endif; wp_reset_query(); ?>
            </div>
        </section>
    </main>


<?php get_footer(); ?>
