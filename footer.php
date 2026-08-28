<?php if (!defined('ABSPATH')) exit; ?>
<style>
/* Compact footer layout based on the supplied reference */
.site-footer{background:#062d62;color:#fff;margin-top:20px;padding:16px 0 8px;line-height:1.55}
.site-footer .container{width:min(1180px,calc(100% - 32px))}
.footer-grid.footer-grid-compact{display:grid;grid-template-columns:1.35fr 1fr 1fr 1.2fr;gap:0;align-items:start}
.footer-grid-compact .footer-col{min-height:110px;border-left:1px solid rgba(255,255,255,.2);padding:0 24px}
.footer-grid-compact .footer-col:last-child{border-left:0;padding-right:0}.footer-grid-compact .footer-about{padding-left:0}
.footer-grid-compact h3{font-size:12px;margin:0 0 7px;color:#fff;font-weight:800}.footer-grid-compact p,.footer-grid-compact a{font-size:9px;line-height:1.9;color:#d7e3f2;margin:0;display:block}
.footer-grid-compact .footer-links a{padding:1px 0}.footer-grid-compact .footer-links a:hover{color:#ffd400}
.footer-brand-compact{display:flex;align-items:center;gap:9px;margin-bottom:7px}.electricity-logo{width:48px;height:48px;flex:none}.electricity-logo svg{display:block;width:100%;height:100%}.footer-brand-compact h3{font-size:11px;margin:0 0 2px}.footer-brand-compact span{font-size:8px;color:#d7e3f2}.footer-about>p{font-size:8px;line-height:1.8;max-width:260px}
.footer-contact .contact-line{display:flex;align-items:center;gap:5px}.footer-phone{direction:ltr;font-size:10px!important;font-weight:700;letter-spacing:.2px}.footer-social{display:flex;gap:7px;margin-top:7px}.footer-social a{width:17px;height:17px;border:1px solid rgba(255,255,255,.7);border-radius:50%;display:grid;place-items:center;font-size:9px!important;line-height:1;color:#fff}.footer-social a:hover{background:#fff;color:#062d62}
.site-footer .footer-bottom{border-top:1px solid rgba(255,255,255,.2);margin-top:10px;padding-top:7px;min-height:0;display:flex;justify-content:center;gap:20px;text-align:center;color:#c5d3e4;font-size:8px}.site-footer .footer-bottom div{font-size:8px}
@media(max-width:800px){.footer-grid.footer-grid-compact{grid-template-columns:1fr 1fr;gap:18px}.footer-grid-compact .footer-col{min-height:0;padding:0 14px;border-left:0;border-bottom:1px solid rgba(255,255,255,.16);padding-bottom:14px}.footer-grid-compact .footer-about{padding-left:14px}.site-footer .footer-bottom{flex-direction:column;gap:2px}}
@media(max-width:520px){.footer-grid.footer-grid-compact{grid-template-columns:1fr}.footer-grid-compact .footer-col{padding-right:0;padding-left:0}.footer-grid-compact .footer-about{padding-left:0}}
</style>
<footer class="site-footer" id="contact"><div class="container">
<div class="footer-grid footer-grid-compact">
 <div class="footer-col footer-about" id="about"><div class="footer-brand footer-brand-compact"><div class="electricity-logo" aria-label="لوگوی شرکت برق"><svg viewBox="0 0 64 64" role="img" aria-hidden="true"><circle cx="32" cy="32" r="31" fill="#ffd400"/><path d="M8 35c8-10 14-7 18-17 3-8 5-14 6-20 3 10 7 15 12 20 5 5 9 9 12 17" fill="none" stroke="#e51f28" stroke-width="6" stroke-linecap="round"/><path d="M29 17h8l-5 12h7L25 49l5-15h-7z" fill="#163c72"/></svg></div><div><h3><?php echo esc_html(ramser_energy_get('brand_title')); ?></h3><span><?php echo esc_html(ramser_energy_get('brand_subtitle')); ?></span></div></div><p><?php echo nl2br(esc_html(ramser_energy_get('footer_about'))); ?></p></div>
 <div class="footer-col footer-links"><h3><?php echo esc_html(ramser_energy_get('footer_services_title')); ?></h3><?php foreach(preg_split('/\|/',ramser_energy_get('footer_services')) as $x) echo '<a href="#services">'.esc_html(trim($x)).'</a>'; ?></div>
 <div class="footer-col footer-links"><h3><?php echo esc_html(ramser_energy_get('footer_access_title')); ?></h3><?php foreach(preg_split('/\|/',ramser_energy_get('footer_access')) as $x) echo '<a href="#">'.esc_html(trim($x)).'</a>'; ?></div>
 <div class="footer-col footer-contact"><h3><?php echo esc_html(ramser_energy_get('footer_contact_title')); ?></h3><?php $contact_lines=array_filter(preg_split('/\|/',ramser_energy_get('footer_contact'))); foreach($contact_lines as $index=>$line): ?><p class="contact-line contact-line-<?php echo esc_attr($index+1); ?>"><?php if($index===1): ?><a class="footer-phone" href="tel:01155256008" dir="ltr">011-55256008</a><?php else: echo esc_html(trim($line)); endif; ?></p><?php endforeach; ?><div class="footer-social" aria-label="شبکه‌های اجتماعی"><a href="#" aria-label="اینستاگرام">◎</a><a href="#" aria-label="تلگرام">◈</a><a href="#" aria-label="واتساپ">◉</a><a href="#" aria-label="اطلاعات">i</a></div></div>
</div>
<div class="footer-bottom"><div><?php echo esc_html(ramser_energy_get('copyright')); ?></div><div><?php echo esc_html(ramser_energy_get('developer')); ?></div></div>
</div></footer><?php wp_footer(); ?></body></html>
