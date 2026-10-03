<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.WordPress.org/themes/basics/template-hierarchy/
 *
 * @package Job Forum
 */

get_header(); ?>

<div class="header-image-box text-center">
  <div class="container">
    <?php if ( get_theme_mod('job_forum_header_page_title' , true)) : ?>
      <h1><?php the_title(); ?></h1>
    <?php endif; ?>
    <?php if ( get_theme_mod('job_forum_header_breadcrumb' , true)) : ?>
      <div class="crumb-box mt-3">
        <?php job_forum_the_breadcrumb(); ?>
      </div>
    <?php endif; ?>
  </div>
</div>

<div id="content" class="mt-5">
  <div class="container">
    <?php $job_forum_single_page_layout = get_theme_mod( 'job_forum_single_page_layout','One Column');
      if($job_forum_single_page_layout == 'One Column'): ?>
          <?php
            while ( have_posts() ) :
              the_post();
              get_template_part( 'template-parts/content', get_post_type());

              wp_link_pages(
                array(
                  'before' => '<div class="job-forum-pagination">',
                  'after' => '</div>',
                  'link_before' => '<span>',
                  'link_after' => '</span>'
                )
              );
              comments_template();
            endwhile;
          ?>
      <?php elseif ($job_forum_single_page_layout == 'Left Sidebar') : ?>
        <div class="row">
          <div class="col-lg-4 col-md-4">
            <div class="sidebar-area  <?php if( get_theme_mod('job_forum_enable_sticky_sidebar', false) == 1) { ?> sidebar-sticky <?php } else { ?> close-sticky <?php } ?>
            <?php echo esc_attr( get_theme_mod('job_forum_enable_sidebar_animation', true) ? 'zoomInRight wow' : '' ); ?>">
              <?php
                dynamic_sidebar('sidebar-2');
              ?>
            </div>
          </div>
          <div class="col-lg-8 col-md-8">
            <?php
              while ( have_posts() ) :
                the_post();
                get_template_part( 'template-parts/content', get_post_type());

                wp_link_pages(
                  array(
                    'before' => '<div class="job-forum-pagination">',
                    'after' => '</div>',
                    'link_before' => '<span>',
                    'link_after' => '</span>'
                  )
                );
                comments_template();
              endwhile;
            ?>
          </div>
        </div>
      <?php elseif ($job_forum_single_page_layout == 'Right Sidebar') : ?>
        <div class="row">
          <div class="col-lg-8 col-md-8">
            <?php
              while ( have_posts() ) :
                the_post();
                get_template_part( 'template-parts/content', get_post_type());

                wp_link_pages(
                  array(
                    'before' => '<div class="job-forum-pagination">',
                    'after' => '</div>',
                    'link_before' => '<span>',
                    'link_after' => '</span>'
                  )
                );
                comments_template();
              endwhile;
            ?>
          </div>
          <div class="col-lg-4 col-md-4">
            <div class="sidebar-area  <?php if( get_theme_mod('job_forum_enable_sticky_sidebar', false) == 1) { ?> sidebar-sticky <?php } else { ?> close-sticky <?php } ?>
            <?php echo esc_attr( get_theme_mod('job_forum_enable_sidebar_animation', true) ? 'zoomInRight wow' : '' ); ?>">
              <?php
                dynamic_sidebar('sidebar-2');
              ?>
            </div>
          </div>
        </div>
      <?php endif; ?>
  </div>
</div>

<?php get_footer(); ?>