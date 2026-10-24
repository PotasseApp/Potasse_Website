<?php
/**
 * Thème Potasse — fonctions.
 *
 * @package Potasse
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Lien vers le bot. Le paramètre ?start=site permet de savoir qui arrive par le site.
 */
const POTASSE_BOT_URL = 'https://t.me/excomptable_bot?start=site';

/**
 * Feuille de style du thème enfant (le thème parent charge la sienne).
 */
add_action(
	'wp_enqueue_scripts',
	function () {
		wp_enqueue_style(
			'potasse-style',
			get_stylesheet_uri(),
			array(),
			wp_get_theme()->get( 'Version' )
		);
	}
);

/**
 * Catégorie « Potasse » pour retrouver les compositions du thème (dossier patterns/).
 */
add_action(
	'init',
	function () {
		register_block_pattern_category(
			'potasse',
			array( 'label' => __( 'Potasse', 'potasse' ) )
		);
	}
);

/**
 * Style « Manuscrit » (police Caveat) proposé sur les paragraphes et les titres.
 */
add_action(
	'init',
	function () {
		foreach ( array( 'core/paragraph', 'core/heading' ) as $block ) {
			register_block_style(
				$block,
				array(
					'name'  => 'manuscrit',
					'label' => __( 'Manuscrit', 'potasse' ),
				)
			);
		}
	}
);

/**
 * Bouton « Démarrer » fixé en bas de l'écran sur téléphone.
 * Le style se trouve dans style.css ; il est masqué au-delà de 781 px de large.
 */
add_filter(
	'body_class',
	function ( $classes ) {
		$classes[] = 'has-potasse-cta';
		return $classes;
	}
);

add_action(
	'wp_footer',
	function () {
		$url = apply_filters( 'potasse_bot_url', POTASSE_BOT_URL );
		printf(
			'<div class="potasse-cta-fixe"><a href="%1$s" rel="noopener">%2$s</a></div>',
			esc_url( $url ),
			esc_html__( 'Démarrer sur Telegram', 'potasse' )
		);
	}
);

/**
 * Sobriété et confidentialité : aucun appel à un service extérieur.
 * WordPress charge par défaut un script d'émojis qui va chercher des images
 * sur s.w.org ; on le retire, les émojis du téléphone s'affichent très bien seuls.
 */
add_action(
	'init',
	function () {
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_action( 'admin_print_styles', 'print_emoji_styles' );
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
		add_filter( 'emoji_svg_url', '__return_false' );
	}
);

/**
 * Pas de pré-connexion DNS vers des domaines extérieurs.
 */
add_filter(
	'wp_resource_hints',
	function ( $urls, $relation_type ) {
		if ( 'dns-prefetch' === $relation_type ) {
			return array();
		}
		return $urls;
	},
	10,
	2
);
