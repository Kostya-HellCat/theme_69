<?php
	$lang = get_field('settings_lang', 'options') ?: 'en';

	$post_id = '';
	if ( is_page() || is_single() ) {
		$post_id = $post->ID;
	} elseif ( is_author() ) {
		$author  = get_user_by( 'id', get_query_var( 'author' ) );
		$post_id = "user_{$author->ID}";
	} elseif ( is_archive() ) {
		$post_id = get_queried_object();
	}
	$post_meta_fields = get_field( 'meta_fields', $post_id );
	$post_title       = $post_meta_fields ? $post_meta_fields['title'] : '';
	$post_description = $post_meta_fields ? $post_meta_fields['description'] : '';
	$site_name        = get_field( 'site_name', 'options' );
	$post_image_id    = $post_meta_fields ? $post_meta_fields['image'] : '';
	$post_image       = wp_get_attachment_image_src( $post_image_id, 'full' );

    $favicon = get_field('favicon', 'options');
?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1"/>
<meta name="viewport" content="width=device-width">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title><?= $post_title ?></title>
<meta property="og:locale" content="<?= $lang ?>">
<meta property="og:type" content="article">
<meta property="og:title" content="<?= $post_title ?>">
<meta property="og:description" content="<?= $post_description ?>">
<meta name="description" content="<?= $post_description ?>">
<meta name="twitter:description" content="<?= $post_description ?>">
<meta property="og:site_name" content="<?= $site_name ?>">
<meta property="og:image" content="<?= $post_image[0] ?? '' ?>">
<meta property="og:image:secure_url" content="<?= $post_image[0] ?? '' ?>">
<meta property="og:image:width" content="<?= $post_image[1] ?? '' ?>">
<meta property="og:image:height" content="<?= $post_image[2] ?? '' ?>">
<meta name="twitter:image" content="<?= $post_image[0] ?? '' ?>">
<meta name="twitter:card" content="summary_large_image">
<?php if ( !empty($favicon) ): ?>
    <link rel="icon" href="<?= $favicon['url'] ?>" type="<?= $favicon['mime_type'] ?>">
<?php endif; ?>

<?php wp_head(); ?>

<?php if ( is_front_page() && !empty( get_field( 'organization', 'options' ) ) ) : ?>
    <script type='application/ld+json'>
    {
        "@context": "https://www.schema.org",
        "@type": "Organization",
        "name": "<?= get_field( 'organization', 'options' ) ?>",
        "url": "<?= get_home_url() ?>",
        "logo": "<?= wp_get_attachment_image_src( get_field( 'header_logo', 'options' ), 'full' )[0] ?>",
        "description": "<?= get_field( 'organization_description', 'options' ) ?>",
         "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "<?= get_field( 'organization_email', 'options' ) ?>",
            "contactType": "<?= get_field( 'organization_contact_type', 'options' ) ?>"
        }
    }
    </script>
<?php endif; ?>
