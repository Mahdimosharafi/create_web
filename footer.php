<?php if (!defined('ABSPATH')) exit; ?>
<footer class="site-footer" id="contact"><div class="container">
<div class="footer-grid">
 <div class="footer-col" id="about"><div class="footer-brand"><?php echo ramser_energy_logo(); ?><div><h3><?php echo esc_html(ramser_energy_get('brand_title')); ?></h3></div></div><p><?php echo nl2br(esc_html(ramser_energy_get('footer_about'))); ?></p></div>
 <div class="footer-col"><h3><?php echo esc_html(ramser_energy_get('footer_services_title')); ?></h3><?php foreach(preg_split('/\|/',ramser_energy_get('footer_services')) as $x) echo '<a href="#services">'.esc_html(trim($x)).'</a>'; ?></div>
 <div class="footer-col"><h3><?php echo esc_html(ramser_energy_get('footer_access_title')); ?></h3><?php foreach(preg_split('/\|/',ramser_energy_get('footer_access')) as $x) echo '<a href="#">'.esc_html(trim($x)).'</a>'; ?></div>
 <div class="footer-col"><h3><?php echo esc_html(ramser_energy_get('footer_contact_title')); ?></h3><p><?php echo nl2br(esc_html(ramser_energy_get('footer_contact'))); ?></p></div>
</div>
<div class="footer-bottom"><div><?php echo esc_html(ramser_energy_get('copyright')); ?></div><div><?php echo esc_html(ramser_energy_get('developer')); ?></div></div>
</div></footer><?php wp_footer(); ?></body></html>
