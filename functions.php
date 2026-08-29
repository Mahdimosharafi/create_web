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
    wp_enqueue_style('ramser-energy-style', get_stylesheet_uri(), [], '2.0.1');
    wp_enqueue_style('ramser-energy-estedad', 'https://fonts.googleapis.com/css2?family=Estedad:wght@100..900&display=swap', [], null);
}
add_action('wp_enqueue_scripts','ramser_energy_assets');

function ramser_energy_defaults() {
    return [
        'brand_title'=>'شرکت توزیع نیروی برق مازندران','brand_subtitle'=>'مدیریت توزیع نیروی برق شهرستان رامسر','phone'=>'011-۴۲۳۳۳۳۳۳','search_placeholder'=>'جستجو...',
        'hero_eyebrow'=>'با انرژی روشن','hero_title'=>'رامسر را روشن نگه می‌داریم','hero_text'=>'تأمین برق پایدار، مطمئن و با کیفیت برای شهروندان شهرستان رامسر','hero_button'=>'گزارش سریع خرابی',
        'quick_1'=>'پاسخگویی ۲۴ ساعته','quick_2'=>'خدمات آنلاین','quick_3'=>'برق مطمئن','quick_4'=>'شفافیت و پاسخگویی',
        'services_title'=>'خدمات سریع','services_subtitle'=>'اکثر خدمات پرکاربرد را اینجا پیدا کنید','services_link'=>'مشاهده همه خدمات',
        'service_1'=>'پرداخت قبض برق','service_1_desc'=>'پرداخت آنلاین قبض به صورت سریع و آسان','service_2'=>'مشاهده قبض','service_2_desc'=>'مشاهده و دریافت قبض برق','service_3'=>'اعلام خرابی','service_3_desc'=>'گزارش قطعی یا خرابی شبکه برق','service_4'=>'برنامه خاموشی','service_4_desc'=>'مشاهده برنامه خاموشی‌های احتمالی','service_5'=>'درخواست انشعاب','service_5_desc'=>'ثبت درخواست انشعاب جدید برق','service_6'=>'پیگیری درخواست','service_6_desc'=>'مشاهده وضعیت و پیگیری درخواست‌ها',
        'status_title'=>'وضعیت برق در رامسر','status_ok'=>'وضعیت عادی','status_text'=>'همه مناطق تحت پوشش دارای برق پایدار هستند.','status_button'=>'مشاهده جزئیات مناطق',
        'news_title'=>'آخرین اطلاعیه‌ها','news_more'=>'مشاهده همه','news_1'=>'استقرار سامانه پاسخگویی هوشمند برق','news_2'=>'بهینه سازی مصرف برق در تابستان','news_3'=>'برنامه خاموشی روز شنبه ۲۴ خرداد',
        'stat_1'=>'۷۸,۵۴۲','stat_1_label'=>'مشترک','stat_2'=>'۲۵۶','stat_2_label'=>'کیلومتر شبکه فشار متوسط','stat_3'=>'۸۱۲','stat_3_label'=>'کیلومتر شبکه فشار ضعیف','stat_4'=>'۱۸۶','stat_4_label'=>'دستگاه توزیع','stat_5'=>'۱۲۱','stat_5_label'=>'مرکز پاسخگویی ۲۴ ساعته',
        'education_title'=>'مقالات و آموزش','education_more'=>'مشاهده همه','education_1'=>'چگونه مصرف برق را کاهش دهیم؟','education_2'=>'آشنایی با تجهیزات اندازه‌گیری برق','education_3'=>'نکات ایمنی در استفاده از برق',
        'articles_title'=>'اخبار','articles_more'=>'مشاهده همه','featured_title'=>'جلسه هماهنگی مدیریت برق رامسر با شهرداران برگزار شد','featured_text'=>'به منظور بررسی مشکلات و راهکارهای بهبود خدمات، جلسه هماهنگی برگزار شد.',
        'app_title'=>'اپلیکیشن برق من','app_text'=>'قبض خود را مشاهده و پرداخت کنید، از خاموشی‌ها مطلع شوید و درخواست خود را ثبت کنید.','app_bazaar'=>'دانلود از بازار','app_google'=>'دانلود از گوگل پلی',
        'footer_about_title'=>'درباره ما','footer_about'=>'شرکت توزیع نیروی برق غرب مازندران، مدیریت توزیع نیروی برق شهرستان رامسر با هدف ارائه خدمات مطلوب به مشترکین و تأمین برق پایدار و مطمئن فعالیت می‌کند.','footer_services_title'=>'خدمات پرکاربرد','footer_services'=>'پرداخت قبض|مشاهده قبض|درخواست انشعاب|پیگیری درخواست|سوالات متداول','footer_access_title'=>'دسترسی سریع','footer_access'=>'صفحه اصلی|خدمات مشترکین|خاموشی‌ها|اعلام خرابی|اخبار و اطلاعیه‌ها','footer_contact_title'=>'راه‌های ارتباطی','footer_contact'=>'رامسر، خیابان شهید رجایی، شرکت توزیع نیروی برق غرب مازندران|011-۴۲۳۳۳۳۳۳|info@mazpnedc.ir','copyright'=>'تمامی حقوق این سایت متعلق به شرکت توزیع نیروی برق غرب مازندران - مدیریت توزیع نیروی برق شهرستان رامسر است.','developer'=>'طراحی و توسعه: مهدی مشرفی'
    ];
}
function ramser_energy_get($key) { $d=ramser_energy_defaults(); return get_theme_mod('re_'.$key, $d[$key] ?? ''); }

function ramser_energy_page_defaults() {
    return [
        'outage_title'=>'برنامه خاموشی‌ها','outage_notice'=>'توجه: برنامه خاموشی بر اساس آخرین اطلاعات شبکه نمایش داده می‌شود.','outage_region'=>'منطقه','outage_date'=>'تاریخ','outage_time'=>'ساعت قطع','outage_duration'=>'مدت زمان','outage_reason'=>'نوع خاموشی','outage_empty'=>'در حال حاضر برنامه‌ای برای این محدوده ثبت نشده است.',
        'report_title'=>'اعلام خرابی','report_intro'=>'خرابی یا قطعی برق را سریعاً به ما اطلاع دهید تا در کوتاه‌ترین زمان پیگیری شود.','report_type'=>'نوع خرابی','report_address'=>'آدرس دقیق','report_phone'=>'شماره همراه','report_description'=>'توضیحات','report_submit'=>'ثبت و ارسال گزارش','report_map'=>'محل تقریبی خرابی روی نقشه','report_success'=>'گزارش شما با موفقیت ثبت شد. کد پیگیری برای شما نمایش داده خواهد شد.',
        'billpay_title'=>'پرداخت قبض','billpay_intro'=>'شناسه قبض یا شناسه پرداخت خود را وارد کنید و قبض را آنلاین پرداخت نمایید.','billpay_id'=>'شناسه قبض','billpay_payment'=>'شناسه پرداخت','billpay_amount'=>'مبلغ قابل پرداخت','billpay_card'=>'شماره کارت','billpay_pay'=>'پرداخت قبض','billpay_secure'=>'پرداخت امن و رمزنگاری‌شده','billpay_help'=>'اطلاعات قبض را با دقت وارد کنید.',
        'bill_title'=>'مشاهده قبض','bill_intro'=>'با وارد کردن شناسه قبض، جزئیات و سوابق قبض برق خود را مشاهده کنید.','bill_tab_current'=>'قبض جاری','bill_tab_history'=>'سوابق قبض','bill_total'=>'مبلغ قابل پرداخت','bill_due'=>'مهلت پرداخت','bill_number'=>'شماره قبض','bill_period'=>'دوره مصرف','bill_download'=>'دریافت PDF قبض',
        'tracking_title'=>'پیگیری درخواست‌ها','tracking_intro'=>'با وارد کردن کد پیگیری، آخرین وضعیت درخواست خود را مشاهده کنید.','tracking_code'=>'کد پیگیری','tracking_national'=>'کد ملی / موبایل','tracking_search'=>'پیگیری درخواست','tracking_status'=>'وضعیت درخواست','tracking_date'=>'تاریخ ثبت','tracking_type'=>'نوع درخواست','tracking_result'=>'درخواست شما در حال بررسی است.',
        'news_page_title'=>'اخبار و اطلاعیه‌ها','news_page_intro'=>'آخرین اخبار، اطلاعیه‌ها و رویدادهای مدیریت توزیع برق رامسر','news_read'=>'ادامه مطلب','news_filter'=>'دسته‌بندی','news_all'=>'همه اخبار','news_empty'=>'هنوز خبری ثبت نشده است.',
        'about_title'=>'درباره ما','about_intro'=>'مدیریت توزیع نیروی برق شهرستان رامسر','about_text'=>'این مجموعه با هدف ارائه خدمات مطلوب به مشترکین، توسعه شبکه و تأمین برق پایدار و مطمئن فعالیت می‌کند.','about_mission'=>'ماموریت ما','about_mission_text'=>'ارائه خدمات سریع، شفاف و قابل اعتماد به شهروندان و مشترکین.','about_values'=>'ارزش‌های ما','about_values_text'=>'پاسخگویی، شفافیت، ایمنی، نوآوری و رضایت مشترکین.',
        'contact_title'=>'تماس با ما','contact_intro'=>'برای ارتباط با مدیریت توزیع برق رامسر از راه‌های زیر با ما در تماس باشید.','contact_address'=>'رامسر، خیابان شهید رجایی، شرکت توزیع نیروی برق غرب مازندران','contact_phone'=>'011-۴۲۳۳۳۳۳۳','contact_email'=>'info@mazpnedc.ir','contact_form_name'=>'نام و نام خانوادگی','contact_form_phone'=>'شماره تماس','contact_form_message'=>'پیام شما','contact_form_submit'=>'ارسال پیام'
    ];
}
function ramser_energy_page_get($key) { $d=ramser_energy_page_defaults(); return get_theme_mod('re_page_'.$key, $d[$key] ?? ''); }

function ramser_energy_customize_register($wp_customize) {
    $wp_customize->add_panel('re_panel', ['title'=>'تنظیمات سایت برق رامسر','priority'=>30,'description'=>'نوشته‌ها و تصاویر قالب از این بخش قابل تغییر هستند.']);
    $sections = [
        'header'=>['سربرگ و برند',['brand_title','brand_subtitle','phone','search_placeholder']],
        'hero'=>['صفحه اصلی - هدر',['hero_eyebrow','hero_title','hero_text','hero_button']],
        'services'=>['صفحه اصلی - خدمات',['services_title','services_subtitle','services_link','service_1','service_1_desc','service_2','service_2_desc','service_3','service_3_desc','service_4','service_4_desc','service_5','service_5_desc','service_6','service_6_desc']],
        'status'=>['صفحه اصلی - وضعیت برق',['status_title','status_ok','status_text','status_button']],
        'news'=>['صفحه اصلی - اطلاعیه‌ها',['news_title','news_more','news_1','news_2','news_3']],
        'stats'=>['صفحه اصلی - آمار',['stat_1','stat_1_label','stat_2','stat_2_label','stat_3','stat_3_label','stat_4','stat_4_label','stat_5','stat_5_label']],
        'content'=>['صفحه اصلی - اخبار و آموزش',['education_title','education_more','education_1','education_2','education_3','articles_title','articles_more','featured_title','featured_text']],
        'app'=>['صفحه اصلی - اپلیکیشن',['app_title','app_text','app_bazaar','app_google']],
        'footer'=>['پابرگ',['footer_about_title','footer_about','footer_services_title','footer_services','footer_access_title','footer_access','footer_contact_title','footer_contact','copyright','developer']]
    ];
    foreach ($sections as $id=>$data) {
        $section='re_'.$id;
        $wp_customize->add_section($section,['title'=>$data[0],'panel'=>'re_panel']);
        foreach($data[1] as $key){
            $wp_customize->add_setting('re_'.$key,['default'=>ramser_energy_get($key),'sanitize_callback'=>'sanitize_textarea_field']);
            $type = in_array($key,['hero_text','status_text','footer_about','footer_services','footer_access','footer_contact','copyright','featured_text','app_text']) ? 'textarea' : 'text';
            $wp_customize->add_control('re_'.$key,['label'=>ramser_energy_label($key),'section'=>$section,'type'=>$type]);
        }
    }
    $wp_customize->add_setting('re_hero_image',['default'=>'','sanitize_callback'=>'esc_url_raw']);
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'re_hero_image',['label'=>'تصویر پس‌زمینه هدر اصلی','section'=>'re_hero']));
    $wp_customize->add_setting('re_logo_image',['default'=>'','sanitize_callback'=>'esc_url_raw']);
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'re_logo_image',['label'=>'لوگوی سایت','section'=>'re_header']));

    $page_sections=[
        'outage'=>['صفحه برنامه خاموشی‌ها',['outage_title','outage_notice','outage_region','outage_date','outage_time','outage_duration','outage_reason','outage_empty']],
        'report'=>['صفحه اعلام خرابی',['report_title','report_intro','report_type','report_address','report_phone','report_description','report_submit','report_map','report_success']],
        'billpay'=>['صفحه پرداخت قبض',['billpay_title','billpay_intro','billpay_id','billpay_payment','billpay_amount','billpay_card','billpay_pay','billpay_secure','billpay_help']],
        'bill'=>['صفحه مشاهده قبض',['bill_title','bill_intro','bill_tab_current','bill_tab_history','bill_total','bill_due','bill_number','bill_period','bill_download']],
        'tracking'=>['صفحه پیگیری درخواست‌ها',['tracking_title','tracking_intro','tracking_code','tracking_national','tracking_search','tracking_status','tracking_date','tracking_type','tracking_result']],
        'news_page'=>['صفحه اخبار و اطلاعیه‌ها',['news_page_title','news_page_intro','news_read','news_filter','news_all','news_empty']],
        'about'=>['صفحه درباره ما',['about_title','about_intro','about_text','about_mission','about_mission_text','about_values','about_values_text']],
        'contact'=>['صفحه تماس با ما',['contact_title','contact_intro','contact_address','contact_phone','contact_email','contact_form_name','contact_form_phone','contact_form_message','contact_form_submit']]
    ];
    foreach($page_sections as $id=>$data){
        $section='re_page_'.$id;
        $wp_customize->add_section($section,['title'=>$data[0],'panel'=>'re_panel']);
        foreach($data[1] as $key){
            $wp_customize->add_setting('re_page_'.$key,['default'=>ramser_energy_page_get($key),'sanitize_callback'=>'sanitize_textarea_field']);
            $wp_customize->add_control('re_page_'.$key,['label'=>ramser_energy_label($key),'section'=>$section,'type'=>preg_match('/(intro|text|notice|success|help|result|address)$/',$key)?'textarea':'text']);
        }
    }

    $images=[
        'status_map'=>'تصویر نقشه وضعیت شبکه','education_1_image'=>'تصویر آموزش ۱','education_2_image'=>'تصویر آموزش ۲','education_3_image'=>'تصویر آموزش ۳','featured_image'=>'تصویر خبر اصلی','app_image'=>'تصویر اپلیکیشن',
        'outage_image'=>'تصویر صفحه خاموشی‌ها','outage_map'=>'نقشه خاموشی‌ها','report_image'=>'تصویر صفحه اعلام خرابی','report_map'=>'نقشه اعلام خرابی','billpay_image'=>'تصویر صفحه پرداخت قبض','bill_image'=>'تصویر صفحه مشاهده قبض','bill_chart'=>'نمودار مصرف قبض','tracking_image'=>'تصویر صفحه پیگیری درخواست','news_page_image'=>'تصویر صفحه اخبار','news_1_image'=>'تصویر خبر ۱','news_2_image'=>'تصویر خبر ۲','news_3_image'=>'تصویر خبر ۳','about_image'=>'تصویر صفحه درباره ما','contact_map'=>'نقشه صفحه تماس با ما'
    ];
    $wp_customize->add_section('re_images',['title'=>'تصاویر تمام صفحات','panel'=>'re_panel','description'=>'تصاویر دلخواه را از رسانه وردپرس انتخاب کنید.']);
    foreach($images as $key=>$label){
        $wp_customize->add_setting('re_img_'.$key,['default'=>'','sanitize_callback'=>'esc_url_raw']);
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'re_img_'.$key,['label'=>$label,'section'=>'re_images']));
    }
}
add_action('customize_register','ramser_energy_customize_register');

function ramser_energy_label($key){
    $labels=['brand_title'=>'عنوان سازمان','brand_subtitle'=>'زیرعنوان سازمان','phone'=>'شماره تماس','search_placeholder'=>'متن جستجو','hero_eyebrow'=>'متن کوچک هدر','hero_title'=>'عنوان اصلی','hero_text'=>'توضیح هدر','hero_button'=>'متن دکمه هدر','services_title'=>'عنوان خدمات','services_subtitle'=>'توضیح خدمات','services_link'=>'متن مشاهده خدمات','status_title'=>'عنوان وضعیت برق','status_ok'=>'متن وضعیت','status_text'=>'توضیح وضعیت','status_button'=>'متن دکمه وضعیت','news_title'=>'عنوان اطلاعیه‌ها','news_more'=>'متن مشاهده اطلاعیه‌ها','education_title'=>'عنوان آموزش','education_more'=>'متن مشاهده آموزش','articles_title'=>'عنوان اخبار','articles_more'=>'متن مشاهده اخبار','featured_title'=>'عنوان خبر اصلی','featured_text'=>'توضیح خبر اصلی','app_title'=>'عنوان اپلیکیشن','app_text'=>'توضیح اپلیکیشن','app_bazaar'=>'متن بازار','app_google'=>'متن گوگل پلی'];
    if(isset($labels[$key])) return $labels[$key];
    if(strpos($key,'service_')===0) return 'خدمت '.$key;
    if(strpos($key,'stat_')===0) return 'آمار '.$key;
    if(strpos($key,'news_')===0) return 'اطلاعیه '.$key;
    if(strpos($key,'education_')===0) return 'آموزش '.$key;
    if(strpos($key,'page_')===0) return 'متن '.$key;
    return 'متن '.$key;
}

function ramser_energy_logo(){
    $logo=get_theme_mod('re_logo_image');
    if($logo) return '<img src="'.esc_url($logo).'" alt="'.esc_attr(ramser_energy_get('brand_title')).'">';
    return '<div class="logo-fallback">'.ramser_energy_svg('bolt').'</div>';
}
function ramser_energy_menu(){
    if(has_nav_menu('primary')) {
        wp_nav_menu(['theme_location'=>'primary','container'=>false,'menu_class'=>'menu']);
        return;
    }
    $items=[['صفحه اصلی',home_url('/')],['خدمات مشترکین','#services'],['خاموشی‌ها',home_url('/program-outage/')],['اعلام خرابی',home_url('/report-outage/')],['اخبار و اطلاعیه‌ها',home_url('/news/')],['درباره ما',home_url('/about/')],['تماس با ما',home_url('/contact/')]];
    echo '<ul class="menu">'; foreach($items as $item) echo '<li><a href="'.esc_url($item[1]).'">'.esc_html($item[0]).'</a></li>'; echo '</ul>';
}
function ramser_energy_svg($name,$class=''){
    $icons=[
        'bolt'=>'<path d="M13 2 4 14h6l-1 8 9-12h-6l1-8z" fill="currentColor" stroke="none"/>',
        'card'=>'<rect x="2.5" y="5.5" width="19" height="13" rx="2.2"/><line x1="2.5" y1="10" x2="21.5" y2="10"/><line x1="6" y1="15" x2="10" y2="15"/>',
        'receipt'=>'<path d="M6 2.5h9l5 5v14a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1v-18a1 1 0 0 1 1-1z"/><path d="M14 2.5v5h5"/><line x1="8" y1="13" x2="16" y2="13"/><line x1="8" y1="17" x2="13" y2="17"/>',
        'alert'=>'<path d="M12 3 2.5 20h19L12 3z"/><line x1="12" y1="9.5" x2="12" y2="14.3"/><circle cx="12" cy="17.2" r="0.9" fill="currentColor" stroke="none"/>',
        'calendar'=>'<rect x="3" y="4.5" width="18" height="16.5" rx="2.2"/><line x1="3" y1="9.5" x2="21" y2="9.5"/><line x1="8" y1="2.5" x2="8" y2="6.5"/><line x1="16" y1="2.5" x2="16" y2="6.5"/>',
        'plug'=>'<path d="M9 2v4.5M15 2v4.5M7 6.5h10v4.5a5 5 0 0 1-10 0z"/><path d="M12 16v3.5M9 22h6"/>',
        'clipboard-check'=>'<path d="M9 4h6a1 1 0 0 1 1 1v1H8V5a1 1 0 0 1 1-1z"/><rect x="5" y="6" width="14" height="16" rx="2.2"/><path d="M9 13.6 11 15.6 15 11.2"/>',
        'headset'=>'<path d="M4.5 13a7.5 7.5 0 0 1 15 0"/><rect x="2.5" y="13" width="5" height="7" rx="2"/><rect x="16.5" y="13" width="5" height="7" rx="2"/>',
        'monitor'=>'<rect x="3" y="4" width="18" height="13" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/>',
        'shield'=>'<path d="M12 3 19 6v6c0 5-3.5 8-7 9-3.5-1-7-4-7-9V6z"/><path d="M9 12l2 2 4-4.5"/>',
        'eye'=>'<path d="M2 12s3.8-7 10-7 10 7 10 7-3.8 7-10 7-10-7-10-7z"/><circle cx="12" cy="12" r="3"/>',
        'megaphone'=>'<path d="M3 10v4h3l7 4.5V5.5L6 10H3z"/><path d="M17 9a4 4 0 0 1 0 6"/>',
        'users'=>'<circle cx="8" cy="8" r="3.3"/><path d="M2 20.5c0-3.6 2.7-6.3 6-6.3s6 2.7 6 6.3"/><circle cx="17.3" cy="9" r="2.4"/><path d="M15.7 14.4c2.6.5 4.6 2.9 4.6 6.1"/>',
        'route'=>'<circle cx="4.5" cy="18.5" r="2"/><circle cx="19.5" cy="5.5" r="2"/><path d="M6.5 18.5H15a3 3 0 0 0 3-3v-1a3 3 0 0 0-3-3H9a3 3 0 0 1-3-3v-1a3 3 0 0 1 3-3h8.5" stroke-dasharray="3 3"/>',
        'box'=>'<path d="M3 7.5 12 3l9 4.5-9 4.5-9-4.5z"/><path d="M3 7.5v9L12 21l9-4.5v-9"/><path d="M12 12v9"/>',
        'search'=>'<circle cx="11" cy="11" r="7"/><line x1="21" y1="21" x2="16.6" y2="16.6"/>',
        'phone'=>'<path d="M6.6 10.8c1.4 2.8 3.8 5.2 6.6 6.6l2.2-2.2c.3-.3.7-.4 1.1-.3 1.2.4 2.5.6 3.8.6.6 0 1 .4 1 1V20c0 .6-.4 1-1 1C11.4 21 3 12.6 3 3c0-.6.4-1 1-1h3.5c.6 0 1 .4 1 1 0 1.3.2 2.6.6 3.8.1.4 0 .8-.3 1.1z"/>',
        'mail'=>'<rect x="2.5" y="4.5" width="19" height="15" rx="2.2"/><path d="M3 6l9 6.5L21 6"/>',
        'pin'=>'<path d="M12 22s7-7.7 7-12.5a7 7 0 1 0-14 0C5 14.3 12 22 12 22z"/><circle cx="12" cy="9.5" r="2.6"/>',
        'chevron'=>'<polyline points="14 6 8 12 14 18"/>',
    ];
    $inner=$icons[$name] ?? $icons['bolt'];
    return '<svg class="icon icon-'.esc_attr($name).' '.esc_attr($class).'" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">'.$inner.'</svg>';
}
function ramser_energy_icon($i){$names=['card','receipt','alert','calendar','plug','clipboard-check']; return ramser_energy_svg($names[$i-1] ?? 'bolt');}
function ramser_energy_stat_icon($i){$names=['users','route','route','box','headset']; return ramser_energy_svg($names[$i-1] ?? 'bolt');}
function ramser_energy_quick_icon($i){$names=['headset','monitor','shield','eye']; return ramser_energy_svg($names[$i-1] ?? 'bolt');}
function ramser_energy_img($key,$class=''){
    $url=get_theme_mod('re_img_'.$key,'');
    if($url) return '<img class="'.esc_attr($class).'" src="'.esc_url($url).'" alt="">';
    return '<div class="image-placeholder '.esc_attr($class).'">برای افزودن تصویر، از بخش «تصاویر تمام صفحات» در سفارشی‌سازی استفاده کنید.</div>';
}
