<?php
if (!defined('ABSPATH')) { exit; }
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<?php wp_head(); ?>
</head>
<body <?php body_class('claimtrack-front-app'); ?>>
<?php wp_body_open(); ?>
<?php
// Fallback theme-level. Plugin v1.9+ juga memaksa template aplikasi sendiri.
if (shortcode_exists('claimtrack_app')) {
    echo do_shortcode('[claimtrack_app]'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
} else {
    echo '<main class="ct-theme-fallback"><h1>ClaimTrack</h1><p>Aktifkan plugin ClaimTrack Core untuk membuka dashboard.</p></main>';
}
?>
<?php wp_footer(); ?>
</body>
</html>
