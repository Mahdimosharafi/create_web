<?php get_header(); ?>
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
        <div class="panel search-empty">
          <div class="search-empty-icon">⌕</div>
          <h2>نتیجه‌ای پیدا نشد</h2>
          <p>عبارت دیگری را امتحان کنید یا از کلمات کوتاه‌تر استفاده کنید.</p>
        </div>
      <?php endif; ?>
    </div>
  </section>
</main>
<?php get_footer(); ?>
