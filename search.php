<?php
/*
 * Smart site search:
 * - If the searched phrase matches one of the site's pages, open that page directly.
 * - Otherwise let WordPress show the normal search results / "نتیجه‌ای پیدا نشد" state.
 * This must run before get_header() because search.php is the template WordPress uses for ?s=...
 */
$search_term = isset($_GET['s']) ? sanitize_text_field(wp_unslash($_GET['s'])) : '';

if ($search_term !== '') {
    $normalize = static function ($text) {
        $text = wp_strip_all_tags((string) $text);
        $text = mb_strtolower($text, 'UTF-8');
        $text = str_replace(
            ["\u{064A}", "\u{0649}", "\u{0643}", "\u{0629}", "\u{200C}", "\u{200F}", "\u{200E}"],
            ["\u{06CC}", "\u{06CC}", "\u{06A9}", "\u{0647}", ' ', '', ''],
            $text
        );
        $text = preg_replace('/[ـ\s\-–—_]+/u', ' ', $text);
        return trim($text);
    };

    $compact = static function ($text) use ($normalize) {
        return str_replace(' ', '', $normalize($text));
    };

    $query_normalized = $normalize($search_term);
    $query_compact = $compact($search_term);

    $page_aliases = [
        'خاموشی' => 'outages','خاموشی ها' => 'outages','برنامه خاموشی' => 'outages','برنامه خاموشی ها' => 'outages','قطعی برق' => 'outages','قطعی' => 'outages',
        'اعلام خرابی' => 'report-outage','گزارش خرابی' => 'report-outage','گزارش خاموشی' => 'report-outage',
        'خدمات' => 'services','خدمات مشترکین' => 'services','اخبار' => 'news','اطلاعیه' => 'news','اطلاعیه ها' => 'news','اخبار و اطلاعیه ها' => 'news',
        'درباره' => 'about','درباره ما' => 'about','تماس' => 'contact','تماس با ما' => 'contact',
        'پرداخت قبض' => 'bill-payment','پرداخت قبض برق' => 'bill-payment','قبض' => 'bill','مشاهده قبض' => 'bill','قبض برق' => 'bill',
        'انشعاب' => 'connection','درخواست انشعاب' => 'connection','پیگیری' => 'request-tracking','پیگیری درخواست' => 'request-tracking',
    ];

    $target_route = '';
    foreach ($page_aliases as $alias => $route) {
        $alias_normalized = $normalize($alias);
        $alias_compact = $compact($alias);
        if ($query_normalized === $alias_normalized || $query_compact === $alias_compact || mb_strpos($query_normalized, $alias_normalized, 0, 'UTF-8') !== false) {
            $target_route = $route;
            break;
        }
    }

    if ($target_route === '') {
        $pages = get_pages(['post_status'=>'publish','number'=>100,'sort_column'=>'menu_order,post_title']);
        foreach ($pages as $page) {
            $title = $normalize($page->post_title);
            $slug = $normalize($page->post_name);
            if ($query_normalized === $title || $query_compact === $compact($page->post_title) || $query_normalized === $slug || ($title !== '' && mb_strpos($query_normalized, $title, 0, 'UTF-8') !== false)) {
                wp_safe_redirect(get_permalink($page->ID));
                exit;
            }
        }
    }

    if ($target_route !== '') {
        $target_page = get_page_by_path($target_route, OBJECT, 'page');
        $target_url = $target_page ? get_permalink($target_page->ID) : home_url('/' . $target_route . '/');
        wp_safe_redirect($target_url);
        exit;
    }
}

get_header(); ?>
<main class="inner-page search-results-page">
  <section class="page-hero">
    <div class="container">
      <h1><?php echo esc_html('جستجو در سایت'); ?></h1>
      <p><?php if (get_search_query()) echo esc_html('نتایج جستجو برای: ' . get_search_query()); else echo esc_html('عبارت موردنظر خود را جستجو کنید.'); ?></p>
    </div>
  </section>
  <section class="page-body">
    <div class="container">
      <div class="search-page-box panel">
        <form class="search-page-form" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
          <label for="search-page-input">عبارت جستجو</label>
          <div class="search-page-row">
            <input id="search-page-input" type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="مثلاً قبض، خاموشی، انشعاب...">
            <button class="btn" type="submit">جستجو</button>
          </div>
        </form>
      </div>

      <?php if (have_posts()) : ?>
        <div class="search-results-head">
          <h2>نتایج جستجو</h2>
          <span><?php echo esc_html($wp_query->found_posts); ?> نتیجه</span>
        </div>
        <div class="search-results-list">
          <?php while (have_posts()) : the_post(); ?>
            <article class="search-result-card panel">
              <?php if (has_post_thumbnail()) : ?>
                <a class="search-result-image" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
              <?php else : ?>
                <a class="search-result-image image-placeholder" href="<?php the_permalink(); ?>" aria-label="تصویر مطلب">تصویری برای این مطلب ثبت نشده است</a>
              <?php endif; ?>
              <div class="search-result-content">
                <div class="search-result-meta"><?php echo esc_html(get_the_date('Y/m/d')); ?><?php if (get_post_type() !== 'page') : ?> · <?php echo esc_html(get_post_type_object(get_post_type())->labels->singular_name); ?><?php endif; ?></div>
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <p><?php echo esc_html(wp_trim_words(wp_strip_all_tags(get_the_excerpt()), 28, '...')); ?></p>
                <a class="search-read-more" href="<?php the_permalink(); ?>">مشاهده مطلب ←</a>
              </div>
            </article>
          <?php endwhile; ?>
        </div>
        <div class="search-pagination"><?php echo wp_kses_post(paginate_links(['type'=>'list','mid_size'=>1,'prev_text'=>'→ قبلی','next_text'=>'بعدی ←'])); ?></div>
      <?php else : ?>
        <div class="panel search-empty" style="width:100%;max-width:760px;margin:30px auto;text-align:center;display:flex;flex-direction:column;align-items:center;justify-content:center;min-height:280px;">
          <div class="search-empty-icon">⌕</div>
          <h2>نتیجه‌ای پیدا نشد</h2>
          <p>عبارت دیگری را امتحان کنید یا از کلمات کوتاه‌تر استفاده کنید.</p>
        </div>
      <?php endif; ?>
    </div>
  </section>
</main>
<?php get_footer(); ?>
