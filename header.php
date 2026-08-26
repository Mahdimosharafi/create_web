<?php if (!defined('ABSPATH')) exit; ?><!doctype html>
<html <?php language_attributes(); ?>>
<head><meta charset="<?php bloginfo('charset'); ?>"><meta name="viewport" content="width=device-width, initial-scale=1"><?php wp_head(); ?></head>
<body <?php body_class(); ?>><?php wp_body_open(); ?>
<header class="site-top">
  <div class="container top-inner header-top-row">
    <div class="brand">
      <?php
      if (has_custom_logo()) {
          $custom_logo_id = get_theme_mod('custom_logo');
          $logo_url = wp_get_attachment_image_url($custom_logo_id, 'full');
          if ($logo_url) {
              echo '<a class="custom-site-logo" href="' . esc_url(home_url('/')) . '" rel="home" aria-label="' . esc_attr(get_bloginfo('name')) . '"><img src="' . esc_url($logo_url) . '" alt="' . esc_attr(get_bloginfo('name')) . '"></a>';
          } else {
              echo ramser_energy_logo();
          }
      } else {
          echo ramser_energy_logo();
      }
      ?>
      <div><div class="brand-title"><?php echo esc_html(ramser_energy_get('brand_title')); ?></div><div class="brand-sub"><?php echo esc_html(ramser_energy_get('brand_subtitle')); ?></div></div>
    </div>

    <form class="header-search" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
      <input name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php echo esc_attr(ramser_energy_get('search_placeholder')); ?>" aria-label="جستجو در سایت">
      <button aria-label="جستجو" type="submit"><span aria-hidden="true">⌕</span></button>
    </form>

    <div class="top-actions header-contact">
      <span class="phone">☎ <?php echo esc_html(ramser_energy_get('phone')); ?></span>
    </div>
  </div>
</header>
<div class="nav-wrap"><div class="container"><nav class="main-nav"><div><?php ramser_energy_menu(); ?></div><a class="header-cta" href="#contact">خدمات غیرحضوری　♙</a></nav></div></div>
