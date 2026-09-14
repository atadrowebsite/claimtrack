<?php
if (!defined('ABSPATH')) { exit; }
status_header(404);
nocache_headers();
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width,initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class('ct-site-404'); ?>>
<?php wp_body_open(); ?>
<main class="ct-404-page">
    <section class="ct-404-card">
        <?php $ct_settings=get_option('claimtrack_settings',array()); $ct_logo=!empty($ct_settings['logo_id'])?wp_get_attachment_image_url(absint($ct_settings['logo_id']),'full'):''; $ct_logo=$ct_logo?:(!empty($ct_settings['logo_url'])?esc_url_raw($ct_settings['logo_url']):get_theme_file_uri('assets/claimtrack-logo.png')); ?>
        <img src="<?php echo esc_url($ct_logo); ?>" alt="ClaimTrack Region 18">
        <div class="ct-404-code">404</div>
        <h1>Halaman tidak ditemukan</h1>
        <p>Alamat yang Anda buka tidak tersedia atau sudah dipindahkan.</p>
        <a href="<?php echo esc_url(home_url('/')); ?>">Kembali ke ClaimTrack</a>
    </section>
</main>
<?php wp_footer(); ?>
</body>
</html>
