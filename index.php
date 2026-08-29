<?php
if (!defined('ABSPATH')) exit;

// Some WordPress configurations fall back to index.php for search requests.
// Always use the dedicated search layout so the normal header, content and footer remain intact.
if (is_search() || isset($_GET['s'])) {
    $search_template = get_template_directory() . '/search.php';
    if (is_file($search_template)) {
        require $search_template;
        exit;
    }
}

$request_path = trim((string) parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH), '/');
$request_path = urldecode($request_path);
$request_path = trim($request_path, '/');

$routes = [
    'services'=>['template'=>'page-services.php','title'=>'خدمات مشترکین'],
    'خدمات-مشترکین'=>['template'=>'page-services.php','title'=>'خدمات مشترکین'],
    'outages'=>['template'=>'page-outages.php','title'=>'برنامه خاموشی‌ها'],
    'خاموشی-ها'=>['template'=>'page-outages.php','title'=>'برنامه خاموشی‌ها'],
    'program-outage'=>['template'=>'page-outages.php','title'=>'برنامه خاموشی‌ها'],
    'اعلام-خرابی'=>['template'=>'page-report-outage.php','title'=>'گزارش خاموشی'],
    'report-outage'=>['template'=>'page-report-outage.php','title'=>'گزارش خاموشی'],
    'news'=>['template'=>'page-news.php','title'=>'اخبار'],
    'اخبار'=>['template'=>'page-news.php','title'=>'اخبار'],
    'about'=>['template'=>'page-about.php','title'=>'درباره ما'],
    'درباره-ما'=>['template'=>'page-about.php','title'=>'درباره ما'],
    'contact'=>['template'=>'page-contact.php','title'=>'تماس با ما'],
    'تماس-با-ما'=>['template'=>'page-contact.php','title'=>'تماس با ما'],
    'bill'=>['template'=>'page-bill.php','title'=>'مشاهده قبض'],
    'bill-payment'=>['template'=>'page-bill-payment.php','title'=>'پرداخت قبض برق'],
    'connection'=>['template'=>'page-connection.php','title'=>'درخواست انشعاب'],
    'request-tracking'=>['template'=>'page-request-tracking.php','title'=>'پیگیری درخواست'],
];

foreach ($routes as $route => $page) {
    $route_path = trim((string) parse_url(home_url('/'.$route.'/'), PHP_URL_PATH), '/');
    $route_path = urldecode($route_path);
    if ($request_path === $route_path) {
        $template_path = get_template_directory() . '/' . $page['template'];
        if (is_file($template_path)) {
            global $wp_query;
            if ($wp_query) {
                $wp_query->is_404 = false;
                $wp_query->is_page = true;
                $wp_query->is_archive = false;
            }
            status_header(200);
            add_filter('pre_get_document_title', function () use ($page) { return $page['title'].' — '.get_bloginfo('name'); }, 9999);
            require $template_path;
            exit;
        }
    }
}

get_header(); ?>
<main class="section"><div class="container"><div class="panel" style="padding:30px"><h1 class="section-title"><?php the_archive_title(); ?></h1><?php if(have_posts()): while(have_posts()): the_post(); ?><article class="article-item"><div><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2><?php the_excerpt(); ?></div></article><?php endwhile; else: ?><p>محتوایی برای نمایش وجود ندارد.</p><?php endif; ?></div></div></main>
<?php get_footer(); ?>
