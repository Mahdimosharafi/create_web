<?php
if (!defined('ABSPATH')) exit;

/*
 * Route the designed internal pages before falling back to the normal
 * WordPress archive/index template. This keeps direct menu URLs working
 * even when no WordPress Page object/template assignment exists.
 */
$request_path = trim((string) parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH), '/');
$request_path = urldecode($request_path);
$request_path = trim($request_path, '/');

$routes = [
    'services'       => 'page-services.php',
    'خدمات-مشترکین' => 'page-services.php',
    'outages'        => 'page-outages.php',
    'خاموشی-ها'     => 'page-outages.php',
    'program-outage' => 'page-outages.php',
    'اعلام-خرابی'   => 'page-report-outage.php',
    'report-outage'  => 'page-report-outage.php',
    'news'           => 'page-news.php',
    'اخبار'          => 'page-news.php',
    'about'          => 'page-about.php',
    'درباره-ما'      => 'page-about.php',
    'contact'        => 'page-contact.php',
    'تماس-با-ما'     => 'page-contact.php',
];

foreach ($routes as $route => $template) {
    $route_path = trim((string) parse_url(home_url('/' . $route . '/'), PHP_URL_PATH), '/');
    $route_path = urldecode($route_path);
    $route_path = trim($route_path, '/');

    if ($request_path === $route_path && file_exists(get_template_directory() . '/' . $template)) {
        require get_template_directory() . '/' . $template;
        exit;
    }
}

get_header(); ?>
<main class="section"><div class="container"><div class="panel" style="padding:30px"><h1 class="section-title"><?php the_archive_title(); ?></h1><?php if(have_posts()): while(have_posts()): the_post(); ?><article class="article-item"><div><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2><?php the_excerpt(); ?></div></article><?php endwhile; else: ?><p>محتوایی برای نمایش وجود ندارد.</p><?php endif; ?></div></div></main>
<?php get_footer(); ?>
