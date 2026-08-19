<?php if (!defined('ABSPATH')) exit; ?><!doctype html>
<html <?php language_attributes(); ?>>
<head><meta charset="<?php bloginfo('charset'); ?>"><meta name="viewport" content="width=device-width, initial-scale=1"><?php wp_head(); ?></head>
<body <?php body_class(); ?>><?php wp_body_open(); ?>
<header class="site-top">
  <div class="container top-inner">
    <div class="brand">
      <?php echo ramser_energy_logo(); ?>
      <div><div class="brand-title"><?php echo esc_html(ramser_energy_get('brand_title')); ?></div><div class="brand-sub"><?php echo esc_html(ramser_energy_get('brand_subtitle')); ?></div></div>
    </div>
    <div class="top-actions">
      <span class="phone">☎ <?php echo esc_html(ramser_energy_get('phone')); ?></span>
      <form class="search" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>"><input name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_attr(ramser_energy_get('search_placeholder')); ?>"><button aria-label="جستجو" type="submit">⌕</button></form>
      <span>نسخه فارسی</span><span>◉</span><span>EN</span>
    </div>
  </div>
</header>
<div class="nav-wrap"><div class="container"><nav class="main-nav"><div><?php ramser_energy_menu(); ?></div><a class="header-cta" href="#contact">خدمات غیرحضوری　♙</a></nav></div></div>
