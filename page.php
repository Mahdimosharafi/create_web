<?php
if (!defined('ABSPATH')) exit;

// Dedicated fallback for the Customer Services page.
// This guarantees that an existing WordPress page with the /services/ slug
// uses the designed services UI even when another page template is selected.
if (is_page('services') && file_exists(get_template_directory() . '/page-services.php')) {
    require get_template_directory() . '/page-services.php';
    exit;
}

get_header();
?>
<main class="section">
  <div class="container">
    <div class="panel" style="padding:30px">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <h1 class="section-title"><?php the_title(); ?></h1>
        <div class="page-content"><?php the_content(); ?></div>
      <?php endwhile; else : ?>
        <p>محتوایی برای نمایش وجود ندارد.</p>
      <?php endif; ?>
    </div>
  </div>
</main>
<?php get_footer(); ?>
