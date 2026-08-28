<?php
if (!defined('ABSPATH')) exit;

/* Route search phrases to the matching internal page before the normal WordPress search. */
if (isset($_GET['s'])) {
    $search_term = sanitize_text_field(wp_unslash($_GET['s']));

    if ($search_term !== '') {
        $normalized_search = trim(preg_replace('/\s+/u', ' ', str_replace(["\u{064A}", "\u{0649}", "\u{0643}", "\u{200C}", "\u{200F}"], ["\u{06CC}", "\u{06CC}", "\u{06A9}", ' ', ''], mb_strtolower($search_term, 'UTF-8'))));
        $normalized_compact = str_replace([' ', '-', '–', '—'], '', $normalized_search);

        $search_routes = [
            ['terms' => ['خاموشی ها', 'خاموشی', 'برنامه خاموشی', 'قطعی برق', 'قطعی'], 'route' => 'outages'],
            ['terms' => ['اعلام خرابی', 'گزارش خرابی', 'گزارش خاموشی', 'خرابی برق'], 'route' => 'report-outage'],
            ['terms' => ['خدمات مشترکین', 'خدمات'], 'route' => 'services'],
            ['terms' => ['اخبار', 'اطلاعیه', 'اطلاعیه ها'], 'route' => 'news'],
            ['terms' => ['درباره ما', 'درباره'], 'route' => 'about'],
            ['terms' => ['تماس با ما', 'تماس'], 'route' => 'contact'],
            ['terms' => ['پرداخت قبض', 'پرداخت قبض برق'], 'route' => 'bill-payment'],
            ['terms' => ['مشاهده قبض', 'قبض برق', 'قبض'], 'route' => 'bill'],
            ['terms' => ['انشعاب', 'درخواست انشعاب'], 'route' => 'connection'],
            ['terms' => ['پیگیری درخواست', 'پیگیری'], 'route' => 'request-tracking'],
        ];

        foreach ($search_routes as $search_route) {
            foreach ($search_route['terms'] as $term) {
                $normalized_term = trim(preg_replace('/\s+/u', ' ', str_replace(["\u{064A}", "\u{0649}", "\u{0643}", "\u{200C}", "\u{200F}"], ["\u{06CC}", "\u{06CC}", "\u{06A9}", ' ', ''], mb_strtolower($term, 'UTF-8'))));
                $term_compact = str_replace([' ', '-', '–', '—'], '', $normalized_term);

                if ($normalized_search === $normalized_term || $normalized_compact === $term_compact || mb_strpos($normalized_search, $normalized_term, 0, 'UTF-8') !== false) {
                    wp_safe_redirect(home_url('/' . $search_route['route'] . '/'));
                    exit;
                }
            }
        }
    }
}

/* Route designed internal pages before the normal WordPress index fallback. */
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
    'bill'           => ['template' => 'page-bill.php', 'title' => 'مشاهده قبض'],
    'bill-payment'   => ['template' => 'page-bill-payment.php', 'title' => 'پرداخت قبض برق'],
    'connection'     => ['template' => 'page-connection.php', 'title' => 'درخواست انشعاب'],
    'request-tracking' => ['template' => 'page-request-tracking.php', 'title' => 'پیگیری درخواست'],
];

foreach ($routes as $route => $page) {
    $route_path = trim((string) parse_url(home_url('/' . $route . '/'), PHP_URL_PATH), '/');
    $route_path = urldecode($route_path);
    $route_path = trim($route_path, '/');

    if ($request_path === $route_path) {
        $template_path = get_template_directory() . '/' . ltrim($page['template'], '/');
        if (is_file($template_path)) {
            global $wp_query;

            // This is a valid virtual page, so never render it as a 404/archive.
            if ($wp_query) {
                $wp_query->is_404 = false;
                $wp_query->is_page = true;
                $wp_query->is_archive = false;
            }
            status_header(200);

            add_filter('pre_get_document_title', function ($title) use ($page) {
                return $page['title'] . ' — ' . get_bloginfo('name');
            }, 9999);
            add_filter('wp_title', function ($title) use ($page) {
                return $page['title'] . ' — ' . get_bloginfo('name');
            }, 9999);

            require $template_path;
            exit;
        }
    }
}

get_header(); ?>
<main class="section"><div class="container"><div class="panel" style="padding:30px"><h1 class="section-title"><?php the_archive_title(); ?></h1><?php if(have_posts()): while(have_posts()): the_post(); ?><article class="article-item"><div><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2><?php the_excerpt(); ?></div></article><?php endwhile; else: ?><p>محتوایی برای نمایش وجود ندارد.</p><?php endif; ?></div></div></main>
<?php get_footer(); ?>
