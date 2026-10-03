<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.WordPress.org/Creating_an_Error_404_Page
 *
 * @package Job Forum
 */

get_header(); ?>

<div class="header-image-box text-center">
  <div class="container">
    <?php if ( get_theme_mod('job_forum_header_page_title' , true)) : ?>
      <h1><?php echo esc_html(get_theme_mod('job_forum_page_not_found_title', __('404 Error!', 'job-forum'))); ?></h1>
    <?php endif; ?>
    <?php if ( get_theme_mod('job_forum_header_breadcrumb' , true)) : ?>
      <div class="crumb-box mt-3">
        <?php job_forum_the_breadcrumb(); ?>
      </div>
    <?php endif; ?>
  </div>
</div>

<div id="content">
	<div class="container">
		<div class="py-5 text-center not-found-content">
      <p><?php echo esc_html(get_theme_mod('job_forum_page_not_found_text', __('The page you are looking for may have been moved, deleted, or possibly never existed.', 'job-forum'))); ?></p>
			<?php get_search_form(); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>