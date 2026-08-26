<?php if (!defined('ABSPATH')) exit; ?><!doctype html>
<html <?php language_attributes(); ?>>
<head><meta charset="<?php bloginfo('charset'); ?>"><meta name="viewport" content="width=device-width, initial-scale=1"><?php wp_head(); ?><style>
.header-top-row{position:relative;min-height:62px}.header-top-row .brand{flex:1}.header-contact{flex:1;justify-content:flex-end}.header-search{position:absolute;left:50%;top:50%;transform:translate(-50%,-50%);width:min(360px,34vw);height:42px;border:1px solid #d7dee8;border-radius:24px;background:#fff;display:flex;align-items:center;gap:6px;padding:4px;box-shadow:0 3px 12px rgba(15,43,76,.04);direction:rtl;z-index:2}.header-search input{flex:1;min-width:0;height:32px;border:0;outline:0;background:transparent;padding:0 13px;text-align:right;color:var(--text);font-size:12px}.header-search input::placeholder{color:#9aa4b1}.header-search button{width:34px;height:34px;min-width:34px;border:1px solid #d2dbe6;border-radius:50%;background:#fff;color:var(--primary);display:grid;place-items:center;padding:0;cursor:pointer;transition:.2s}.header-search button:hover{background:var(--primary);color:#fff;border-color:var(--primary)}.custom-site-logo{display:flex;align-items:center;justify-content:center;flex:none}.custom-site-logo img{width:auto;height:54px;max-width:90px;object-fit:contain}.search-results-page .page-body{padding-top:30px}.search-page-box{padding:20px;margin-bottom:24px}.search-page-form label{display:block;font-size:13px;font-weight:800;color:var(--primary);margin-bottom:8px}.search-page-row{display:flex;gap:10px}.search-page-row input{flex:1;border:1px solid #dce3eb;border-radius:10px;padding:11px 14px;outline:0;background:#fff}.search-page-row input:focus{border-color:#7ca4d1}.search-results-head{display:flex;justify-content:space-between;align-items:center;margin:0 0 14px}.search-results-head h2{font-size:18px;color:var(--primary);margin:0}.search-results-head span{font-size:11px;color:var(--muted)}.search-results-list{display:grid;gap:14px}.search-result-card{display:flex;overflow:hidden}.search-result-image{width:210px;min-width:210px;min-height:150px;background:#f1f5f9}.search-result-image img{width:100%;height:100%;min-height:150px;object-fit:cover}.search-result-content{padding:18px 20px}.search-result-meta{font-size:10px;color:#8a98a8;margin-bottom:3px}.search-result-content h2{font-size:16px;margin:0 0 6px;color:var(--primary)}.search-result-content h2 a:hover{color:var(--primary-2)}.search-result-content p{font-size:11px;color:var(--muted);margin:0 0 8px}.search-read-more{font-size:11px;color:var(--primary);font-weight:700}.search-empty{text-align:center;padding:60px 20px}.search-empty-icon{width:60px;height:60px;border-radius:50%;background:#edf5ff;color:var(--primary);display:grid;place-items:center;margin:0 auto 12px;font-size:30px}.search-empty h2{font-size:18px;color:var(--primary);margin:0 0 5px}.search-empty p{font-size:12px;color:var(--muted);margin:0}.search-pagination{margin-top:20px;text-align:center}.search-pagination ul{display:flex;justify-content:center;gap:6px;list-style:none;padding:0;margin:0}.search-pagination a,.search-pagination span{display:inline-flex;padding:7px 11px;border:1px solid #dce3eb;border-radius:8px;font-size:11px;background:#fff}.search-pagination .current{background:var(--primary);color:#fff;border-color:var(--primary)}
.status-panel{padding:0!important;display:flex;flex-direction:column;min-height:0!important;background:linear-gradient(135deg,#062d62,#073f85)!important;border-radius:14px;overflow:hidden}.status-map-wrap{width:100%;height:245px;overflow:hidden;background:#082f63;flex:none}.status-map-visual{width:100%!important;height:100%!important;max-width:none!important;object-fit:cover;object-position:center;display:block}.status-accessible{padding:18px 22px 22px;position:relative;z-index:1}.status-accessible h3{margin:0 0 7px;font-size:18px}.status-accessible .status-badge{margin-bottom:0}.status-accessible p{font-size:12px;max-width:none;margin:22px 0;color:#dbe7f6}.status-accessible .btn{display:inline-flex}.news-item-link{display:flex;width:100%;cursor:pointer;transition:background .2s,padding .2s}.news-item-link:hover{background:#f7faff;padding-right:8px;padding-left:8px}.news-item-link h4{transition:color .2s}.news-item-link:hover h4{color:var(--primary-2)}
@media(max-width:900px){.header-search{position:static;transform:none;width:min(360px,100%);margin:0 auto 10px}.header-top-row{flex-wrap:wrap;min-height:0}.header-top-row .brand{order:1}.header-contact{order:2}.header-search{order:3;flex-basis:100%}.search-result-image{width:170px;min-width:170px}.status-map-wrap{height:230px}}@media(max-width:650px){.header-contact{font-size:11px}.search-result-card{display:block}.search-result-image{width:100%;min-width:0;height:170px}.search-result-image img{height:170px;min-height:0}.search-result-content{padding:15px}.search-page-row{flex-direction:column}.search-page-row .btn{width:100%}.status-map-wrap{height:205px}.status-accessible{padding:16px 18px 20px}}
</style></head>
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
      <span class="phone">☎ 011-55256008</span>
    </div>
  </div>
</header>
<div class="nav-wrap"><div class="container"><nav class="main-nav"><div><?php ramser_energy_menu(); ?></div><a class="header-cta" href="#contact">خدمات غیرحضوری　♙</a></nav></div></div>
<script>
document.addEventListener('DOMContentLoaded', function(){
  document.querySelectorAll('a,button').forEach(function(el){
    if ((el.textContent || '').replace(/\s+/g,' ').trim().includes('گزارش سریع خرابی')) {
      if (el.tagName.toLowerCase() === 'a') el.href = '<?php echo esc_url(home_url('/report-outage/')); ?>';
      else el.addEventListener('click', function(){ window.location.href = '<?php echo esc_url(home_url('/report-outage/')); ?>'; });
    }
  });
});
</script>
