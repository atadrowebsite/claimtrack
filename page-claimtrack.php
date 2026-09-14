<?php
if (!defined('ABSPATH')) { exit; }
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<?php wp_head(); ?>
</head>
<body <?php body_class('claimtrack-page-app'); ?>>
<?php wp_body_open(); ?>
<?php
$rendered = false;
while (have_posts()) {
    the_post();
    if (has_shortcode((string)get_the_content(), 'claimtrack_app')) {
        the_content();
        $rendered = true;
    }
}
if (!$rendered && shortcode_exists('claimtrack_app')) {
    echo do_shortcode('[claimtrack_app]'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
?>
<?php wp_footer(); ?>
</body>
</html>
