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
 * La même feuille de style dans l'éditeur, pour voir le vrai rendu
 * (bandes, cartes, style « Manuscrit », listes, FAQ) pendant qu'on écrit.
 */
add_action(
	'after_setup_theme',
	function () {
		add_theme_support( 'editor-styles' );
		add_editor_style( 'style.css' );
	}
);

/**
 * Ponctuation française : espace insécable avant « ? ! : ; » et à l'intérieur des guillemets « »,
 * pour qu'un signe ne se retrouve jamais seul en début de ligne sur téléphone.
 * Ne touche qu'au texte, jamais aux balises ni à leurs attributs.
 */
function potasse_ponctuation_francaise( $html ) {
	if ( ! is_string( $html ) || '' === $html ) {
		return $html;
	}
	$nbsp   = "\u{00A0}";
	$morceaux = preg_split( '/(<[^>]*>)/u', $html, -1, PREG_SPLIT_DELIM_CAPTURE );
	foreach ( $morceaux as $i => $morceau ) {
		if ( '' === $morceau || '<' === $morceau[0] ) {
			continue;
		}
		$morceau = preg_replace( '/[ \x{00A0}\x{202F}]+([?!:;»])/u', $nbsp . '$1', $morceau );
		$morceau = preg_replace( '/«[ \x{00A0}\x{202F}]+/u', '«' . $nbsp, $morceau );
		$morceaux[ $i ] = $morceau;
	}
	return implode( '', $morceaux );
}
add_filter( 'the_content', 'potasse_ponctuation_francaise', 20 );

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

		// Styles de listes : coches (« C'est pour toi si… ») et feuille de route (« Ce qui arrive »).
		register_block_style(
			'core/list',
			array(
				'name'  => 'coches',
				'label' => __( 'Coches', 'potasse' ),
			)
		);
		register_block_style(
			'core/list',
			array(
				'name'  => 'feuille-de-route',
				'label' => __( 'Feuille de route', 'potasse' ),
			)
		);
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
			'<div class="potasse-cta-fixe est-masque"><a href="%1$s" rel="noopener">%2$s</a></div><noscript><style>.potasse-cta-fixe.est-masque{transform:none;opacity:1;pointer-events:auto}</style></noscript>',
			esc_url( $url ),
			esc_html__( 'Démarrer sur Telegram', 'potasse' )
		);

		// Masque le bouton fixe tant qu'un bouton vers le bot est déjà visible à l'écran
		// (celui du haut de l'accueil ou l'appel final), dès le chargement, pour ne jamais en afficher deux.
		$js = <<<'JS'
(function () {
	var cta = document.querySelector('.potasse-cta-fixe');
	if (!cta) { return; }
	var cibles = document.querySelectorAll('.wp-block-post-content a.wp-block-button__link[href*="t.me/"]');
	// Le bouton part caché (pas de flash à l'arrivée) ; sans autre bouton dans la page, on le montre tout de suite.
	if (!cibles.length) { cta.classList.remove('est-masque'); return; }
	var attente = false;
	function miseAJour() {
		attente = false;
		var visible = false;
		cibles.forEach(function (c) {
			var r = c.getBoundingClientRect();
			if (r.bottom > 0 && r.top < window.innerHeight) { visible = true; }
		});
		cta.classList.toggle('est-masque', visible);
	}
	function demander() {
		if (!attente) { attente = true; window.requestAnimationFrame(miseAJour); }
	}
	miseAJour();
	window.addEventListener('scroll', demander, { passive: true });
	window.addEventListener('resize', demander);
	window.addEventListener('load', demander);
})();
JS;
		wp_print_inline_script_tag( $js );
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
