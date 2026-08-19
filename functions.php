<?php
if (!defined('ABSPATH')) exit;

function ramser_energy_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', ['height'=>80,'width'=>180,'flex-height'=>true,'flex-width'=>true]);
    add_theme_support('html5', ['search-form','comment-form','comment-list','gallery','caption','style','script']);
    register_nav_menus(['primary'=>'منوی اصلی']);
}
add_action('after_setup_theme','ramser_energy_setup');

function ramser_energy_assets() {
    wp_enqueue_style('ramser-energy-style', get_stylesheet_uri(), [], '1.0.0');
}
add_action('wp_enqueue_scripts','ramser_energy_assets');

function ramser_energy_defaults() {
    return [
        'brand_title'=>'شرکت توزیع نیروی برق مازندران',
        'brand_subtitle'=>'مدیریت توزیع نیروی برق شهرستان رامسر',
        'phone'=>'011-۴۲۳۳۳۳۳۳',
        'search_placeholder'=>'جستجو...',
        'hero_eyebrow'=>'با انرژی روشن',
        'hero_title'=>'رامسر را روشن نگه می‌داریم',
        'hero_text'=>'تأمین برق پایدار، مطمئن و با کیفیت برای شهروندان شهرستان رامسر',
        'hero_button'=>'گزارش سریع خرابی',
        'quick_1'=>'پاسخگویی ۲۴ ساعته','quick_2'=>'خدمات آنلاین','quick_3'=>'برق مطمئن','quick_4'=>'شفافیت و پاسخگویی',
        'services_title'=>'خدمات سریع','services_subtitle'=>'اکثر خدمات پرکاربرد را اینجا پیدا کنید','services_link'=>'مشاهده همه خدمات',
        'service_1'=>'پرداخت قبض برق','service_1_desc'=>'پرداخت آنلاین قبض به صورت سریع و آسان',
        'service_2'=>'مشاهده قبض','service_2_desc'=>'مشاهده و دریافت قبض برق',
        'service_3'=>'اعلام خرابی','service_3_desc'=>'گزارش قطعی یا خرابی شبکه برق',
        'service_4'=>'برنامه خاموشی','service_4_desc'=>'مشاهده برنامه خاموشی‌های احتمالی',
        'service_5'=>'درخواست انشعاب','service_5_desc'=>'ثبت درخواست انشعاب جدید برق',
        'service_6'=>'پیگیری درخواست','service_6_desc'=>'مشاهده وضعیت و پیگیری درخواست‌ها',
        'status_title'=>'وضعیت برق در رامسر','status_ok'=>'وضعیت عادی','status_text'=>'همه مناطق تحت پوشش دارای برق پایدار هستند.','status_button'=>'مشاهده جزئیات مناطق',
        'news_title'=>'آخرین اطلاعیه‌ها','news_more'=>'مشاهده همه','news_1'=>'استقرار سامانه پاسخگویی هوشمند برق','news_2'=>'بهینه سازی مصرف برق در تابستان','news_3'=>'برنامه خاموشی روز شنبه ۲۴ خرداد',
        'stat_1'=>'۷۸,۵۴۲','stat_1_label'=>'مشترک','stat_2'=>'۲۵۶','stat_2_label'=>'کیلومتر شبکه فشار متوسط','stat_3'=>'۸۱۲','stat_3_label'=>'کیلومتر شبکه فشار ضعیف','stat_4'=>'۱۸۶','stat_4_label'=>'دستگاه توزیع','stat_5'=>'۱۲۱','stat_5_label'=>'مرکز پاسخگویی ۲۴ ساعته',
        'education_title'=>'مقالات و آموزش','education_more'=>'مشاهده همه','education_1'=>'چگونه مصرف برق را کاهش دهیم؟','education_2'=>'آشنایی با تجهیزات اندازه‌گیری برق','education_3'=>'نکات ایمنی در استفاده از برق',
        'articles_title'=>'اخبار','articles_more'=>'مشاهده همه','featured_title'=>'جلسه هماهنگی مدیریت برق رامسر با شهرداران برگزار شد','featured_text'=>'به منظور بررسی مشکلات و راهکارهای بهبود خدمات، جلسه هماهنگی برگزار شد.',
        'app_title'=>'اپلیکیشن برق من','app_text'=>'قبض خود را مشاهده و پرداخت کنید، از خاموشی‌ها مطلع شوید و درخواست خود را ثبت کنید.','app_bazaar'=>'دانلود از بازار','app_google'=>'دانلود از گوگل پلی',
        'footer_about_title'=>'درباره ما','footer_about'=>'شرکت توزیع نیروی برق غرب مازندران، مدیریت توزیع نیروی برق شهرستان رامسر با هدف ارائه خدمات مطلوب به مشترکین و تأمین برق پایدار و مطمئن فعالیت می‌کند.',
        'footer_services_title'=>'خدمات پرکاربرد','footer_services'=>'پرداخت قبض|مشاهده قبض|درخواست انشعاب|پیگیری درخواست|سوالات متداول',
        'footer_access_title'=>'دسترسی سریع','footer_access'=>'صفحه اصلی|خدمات مشترکین|خاموشی‌ها|اعلام خرابی|اخبار و اطلاعیه‌ها',
        'footer_contact_title'=>'راه‌های ارتباطی','footer_contact'=>'رامسر، خیابان شهید رجایی، شرکت توزیع نیروی برق غرب مازندران|011-۴۲۳۳۳۳۳۳|info@mazpnedc.ir',
        'copyright'=>'تمامی حقوق این سایت متعلق به شرکت توزیع نیروی برق غرب مازندران - مدیریت توزیع نیروی برق شهرستان رامسر است.',
        'developer'=>'طراحی و توسعه: مهدی مشرفی'
    ];
}
function ramser_energy_get($key) { $d=ramser_energy_defaults(); return get_theme_mod('re_'.$key, $d[$key] ?? ''); }
function ramser_energy_customize_register($wp_customize) {
    $wp_customize->add_panel('re_panel',['title'=>'تنظیمات سایت برق رامسر','priority'=>30,'description'=>'تمام نوشته‌ها، تصاویر و اطلاعات نمایشی قالب از این بخش قابل تغییر هستند.']);
    $sections=[
      'header'=>['سربرگ و برند',['brand_title','brand_subtitle','phone','search_placeholder']],
      'hero'=>['صفحه اصلی - هدر اصلی',['hero_eyebrow','hero_title','hero_text','hero_button']],
      'services'=>['صفحه اصلی - خدمات',['services_title','services_subtitle','services_link','service_1','service_1_desc','service_2','service_2_desc','service_3','service_3_desc','service_4','service_4_desc','service_5','service_5_desc','service_6','service_6_desc']],
      'status'=>['صفحه اصلی - وضعیت برق',['status_title','status_ok','status_text','status_button']],
      'news'=>['صفحه اصلی - اطلاعیه‌ها',['news_title','news_more','news_1','news_2','news_3']],
      'stats'=>['صفحه اصلی - آمار',['stat_1','stat_1_label','stat_2','stat_2_label','stat_3','stat_3_label','stat_4','stat_4_label','stat_5','stat_5_label']],
      'content'=>['صفحه اصلی - اخبار و آموزش',['education_title','education_more','education_1','education_2','education_3','articles_title','articles_more','featured_title','featured_text']],
      'app'=>['صفحه اصلی - اپلیکیشن',['app_title','app_text','app_bazaar','app_google']],
      'footer'=>['پابرگ',['footer_about_title','footer_about','footer_services_title','footer_services','footer_access_title','footer_access','footer_contact_title','footer_contact','copyright','developer']],
    ];
    foreach($sections as $id=>$data){
      $wp_customize->add_section('re_'.$id,['title'=>$data[0],'panel'=>'re_panel']);
      foreach($data[1] as $key){
        $label=ramser_energy_label($key);
        $wp_customize->add_setting('re_'.$key,['default'=>ramser_energy_get($key),'sanitize_callback'=>'sanitize_textarea_field']);
        $wp_customize->add_control('re_'.$key,['label'=>$label,'section'=>'re_'.$id,'type'=>in_array($key,['hero_text','status_text','footer_about','footer_services','footer_access','footer_contact','copyright','featured_text','app_text'])?'textarea':'text']);
      }
    }
    $wp_customize->add_setting('re_hero_image',['default'=>'','sanitize_callback'=>'esc_url_raw']);
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'re_hero_image',['label'=>'تصویر پس‌زمینه هدر اصلی','section'=>'re_hero']));
    $wp_customize->add_setting('re_logo_image',['default'=>'','sanitize_callback'=>'esc_url_raw']);
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'re_logo_image',['label'=>'لوگوی سایت','section'=>'re_header']));
}
function ramser_energy_label($key){
  $labels=['brand_title'=>'عنوان سازمان','brand_subtitle'=>'زیرعنوان سازمان','phone'=>'شماره تماس','search_placeholder'=>'متن جای‌نگهدار جستجو','hero_eyebrow'=>'متن کوچک هدر','hero_title'=>'عنوان اصلی','hero_text'=>'توضیح هدر','hero_button'=>'متن دکمه هدر','services_title'=>'عنوان خدمات','services_subtitle'=>'توضیح خدمات','services_link'=>'لینک خدمات','status_title'=>'عنوان وضعیت برق','status_ok'=>'متن وضعیت','status_text'=>'توضیح وضعیت','status_button'=>'متن دکمه وضعیت','news_title'=>'عنوان اطلاعیه‌ها','news_more'=>'مشاهده بیشتر','education_title'=>'عنوان آموزش','education_more'=>'مشاهده بیشتر آموزش','articles_title'=>'عنوان اخبار','articles_more'=>'مشاهده بیشتر اخبار','featured_title'=>'عنوان خبر اصلی','featured_text'=>'توضیح خبر اصلی','app_title'=>'عنوان اپلیکیشن','app_text'=>'توضیح اپلیکیشن','app_bazaar'=>'متن بازار','app_google'=>'متن گوگل پلی','footer_about_title'=>'عنوان درباره ما','footer_about'=>'متن درباره ما','footer_services_title'=>'عنوان خدمات پابرگ','footer_services'=>'آیتم‌های خدمات پابرگ، با | جدا کنید','footer_access_title'=>'عنوان دسترسی سریع','footer_access'=>'آیتم‌های دسترسی سریع، با | جدا کنید','footer_contact_title'=>'عنوان راه‌های ارتباطی','footer_contact'=>'اطلاعات تماس، هر مورد در یک خط','copyright'=>'متن کپی‌رایت','developer'=>'متن توسعه‌دهنده'];
  if(isset($labels[$key])) return $labels[$key];
  if(strpos($key,'_desc')!==false) return 'توضیح '.$key;
  if(strpos($key,'_label')!==false) return 'برچسب '.$key;
  return 'متن '.$key;
}
add_action('customize_register','ramser_energy_customize_register');

function ramser_energy_logo(){
  $logo=get_theme_mod('re_logo_image');
  if($logo) return '<img src="'.esc_url($logo).'" alt="'.esc_attr(ramser_energy_get('brand_title')).'">';
  return '<div class="logo-fallback">⚡</div>';
}
function ramser_energy_menu(){
  if(has_nav_menu('primary')) wp_nav_menu(['theme_location'=>'primary','container'=>false,'menu_class'=>'menu']);
  else { echo '<ul class="menu"><li class="current-menu-item"><a href="'.esc_url(home_url('/')).'">صفحه اصلی</a></li><li><a href="#services">خدمات مشترکین</a></li><li><a href="#news">خاموشی‌ها</a></li><li><a href="#news">اعلام خرابی</a></li><li><a href="#news">اخبار و اطلاعیه‌ها</a></li><li><a href="#about">درباره ما</a></li><li><a href="#contact">تماس با ما</a></li></ul>'; }
}
function ramser_energy_icon($i){$icons=['▣','▤','⚡','◫','⚠','▧']; return $icons[$i-1] ?? '⚡';}
