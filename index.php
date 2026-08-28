<?php
if (!defined('ABSPATH')) exit;

$request_path = trim((string) parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH), '/');
$routes = [
    'services' => 'page-services.php',
    'outages' => 'page-outages.php',
    'خاموشی-ها' => 'page-outages.php'
];
foreach ($routes as $route => $template) {
    $route_path = trim((string) parse_url(home_url('/' . $route . '/'), PHP_URL_PATH), '/');
    if ($request_path === $route_path && file_exists(get_template_directory() . '/' . $template)) {
        require get_template_directory() . '/' . $template;
        exit;
    }
}

get_header(); ?>
<main class="section"><div class="container"><div class="panel" style="padding:30px"><h1 class="section-title"><?php the_archive_title(); ?></h1><?php if(have_posts()): while(have_posts()): the_post(); ?><article class="article-item"><div><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2><?php the_excerpt(); ?></div></article><?php endwhile; else: ?><p>محتوایی برای نمایش وجود ندارد.</p><?php endif; ?></div></div></main>
<?php get_footer(); ?>