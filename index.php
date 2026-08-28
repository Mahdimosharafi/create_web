<?php
if (!defined('ABSPATH')) exit;

/*
 * Route designed internal pages before the normal WordPress index fallback.
 * These URLs are intentionally rendered from theme templates even when a
 * matching WordPress Page object has not been created.
 */
$request_path = trim((string) parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH), '/');
$request_path = urldecode($request_path);
$request_path = trim($request_path, '/');

$routes = [
    'services'       => ['template' => 'page-services.php', 'title' => 'خدمات مشترکین'],
    'خدمات-مشترکین' => ['template' => 'page-services.php', 'title' => 'خدمات مشترکین'],
    'outages'        => ['template' => 'page-outages.php', 'title' => 'برنامه خاموشی‌ها'],
    'خاموشی-ها'     => ['template' => 'page-outages.php', 'title' => 'برنامه خاموشی‌ها'],
    'program-outage' => ['template' => 'page-outages.php', 'title' => 'برنامه خاموشی‌ها'],
    'اعلام-خرابی'   => ['template' => 'page-report-outage.php', 'title' => 'گزارش خاموشی'],
    'report-outage'  => ['template' => 'page-report-outage.php', 'title' => 'گزارش خاموشی'],
    'news'           => ['template' => 'page-news.php', 'title' => 'اخبار'],
    'اخبار'          => ['template' => 'page-news.php', 'title' => 'اخبار'],
    'about'          => ['template' => 'page-about.php', 'title' => 'درباره ما'],
    'درباره-ما'      => ['template' => 'page-about.php', 'title' => 'درباره ما'],
    'contact'        => ['template' => 'page-contact.php', 'title' => 'تماس با ما'],
    'تماس-با-ما'     => ['template' => 'page-contact.php', 'title' => 'تماس با ما'],
];

foreach ($routes as $route => $page) {
    $route_path = trim((string) parse_url(home_url('/' . $route . '/'), PHP_URL_PATH), '/');
    $route_path = urldecode($route_path);
    $route_path = trim($route_path, '/');

    if ($request_path === $route_path && file_exists(get_template_directory() . '/' . $page['template'])) {
        global $wp_query, $post;

        // The URL is a valid theme route, not a WordPress 404/archive page.
        if ($wp_query) {
            $wp_query->is_404 = false;
            $wp_query->is_page = true;
            $wp_query->is_archive = false;
        }
        status_header(200);

        // Make WordPress' document title use the actual section being viewed.
        add_filter('pre_get_document_title', function ($title) use ($page) {
            return $page['title'] . ' — ' . get_bloginfo('name');
        }, 9999);
        add_filter('wp_title', function ($title) use ($page) {
            return $page['title'] . ' — ' . get_bloginfo('name');
        }, 9999);

        // Expose a lightweight virtual page title to templates that use the_title().
        $post = new stdClass();
        $post->ID = 0;
        $post->post_title = $page['title'];
        $post->post_name = $route;
        $post->post_type = 'page';
        $post->post_status = 'publish';
        $post->filter = 'raw';
        setup_postdata($post);

        require get_template_directory() . '/' . $page['template'];
        wp_reset_postdata();
        exit;
    }
}

get_header(); ?>
<main class="section"><div class="container"><div class="panel" style="padding:30px"><h1 class="section-title"><?php the_archive_title(); ?></h1><?php if(have_posts()): while(have_posts()): the_post(); ?><article class="article-item"><div><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2><?php the_excerpt(); ?></div></article><?php endwhile; else: ?><p>محتوایی برای نمایش وجود ندارد.</p><?php endif; ?></div></div></main>
<?php get_footer(); ?>
