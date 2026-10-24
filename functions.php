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

/**
 * Partage et référencement, sans extension.
 * Titre d'onglet parlant sur l'accueil, description, aperçu pour les partages
 * (WhatsApp, Discord, réseaux sociaux) et icône du site.
 */
const POTASSE_DESCRIPTION = 'Potasse, le bot Telegram qui t\'aide à réviser le BTS Comptabilité et Gestion : réponses à tes questions de cours, QCM trois fois par jour et répétition espacée. Fait par un étudiant, gratuit pendant le rodage.';

add_filter(
	'document_title_parts',
	function ( $parts ) {
		if ( is_front_page() ) {
			$parts = array( 'title' => __( 'Potasse — le bot Telegram pour réviser le BTS CG', 'potasse' ) );
		}
		return $parts;
	}
);

add_action(
	'wp_head',
	function () {
		$titre = is_front_page() ? __( 'Potasse — le bot Telegram pour réviser le BTS CG', 'potasse' ) : wp_get_document_title();
		$url   = is_front_page() ? home_url( '/' ) : get_permalink();
		$image = get_theme_file_uri( 'assets/images/partage.jpg' );

		$balises = array(
			array( 'name', 'description', POTASSE_DESCRIPTION ),
			array( 'property', 'og:type', 'website' ),
			array( 'property', 'og:locale', 'fr_FR' ),
			array( 'property', 'og:site_name', 'Potasse' ),
			array( 'property', 'og:title', $titre ),
			array( 'property', 'og:description', POTASSE_DESCRIPTION ),
			array( 'property', 'og:url', $url ),
			array( 'property', 'og:image', $image ),
			array( 'property', 'og:image:width', '1200' ),
			array( 'property', 'og:image:height', '630' ),
			array( 'property', 'og:image:alt', __( 'Potasse : « Réviser ta compta, c\'est pas marrant. Heureusement, t\'as un bon pote. » et la photo de Joseph à sa fenêtre.', 'potasse' ) ),
			array( 'name', 'twitter:card', 'summary_large_image' ),
		);
		foreach ( $balises as $b ) {
			printf( '<meta %1$s="%2$s" content="%3$s" />' . "\n", $b[0], esc_attr( $b[1] ), esc_attr( $b[2] ) );
		}

		// Icône du site (onglet, écran d'accueil du téléphone), sauf si une icône est choisie dans WordPress.
		if ( ! has_site_icon() ) {
			printf( '<link rel="icon" href="%s" type="image/svg+xml" />' . "\n", esc_url( get_theme_file_uri( 'assets/images/favicon.svg' ) ) );
			printf( '<link rel="icon" href="%s" sizes="512x512" type="image/png" />' . "\n", esc_url( get_theme_file_uri( 'assets/images/icone-512.png' ) ) );
			printf( '<link rel="apple-touch-icon" href="%s" />' . "\n", esc_url( get_theme_file_uri( 'assets/images/icone-180.png' ) ) );
		}
		echo '<meta name="theme-color" content="#F5E9D7" />' . "\n";
	},
	1
);

/**
 * Mini QCM jouable de l'accueil : un clic, la correction et la petite blague.
 * Aucune donnée envoyée nulle part, tout se passe dans la page.
 */
add_action(
	'wp_footer',
	function () {
		$js = <<<'JS'
(function () {
	var reactions = {
		juste: ['Bien vu !', 'Carré. Le 2184 te remercie.', 'Exact, tu peux ranger tes armoires.'],
		faux: ['Raté, mais c\'est comme ça qu\'on retient.', 'Presque ! Elle reviendrait demain sur Telegram.', 'Pas grave : une erreur, c\'est une fiche qui rentre.']
	};
	function auHasard(liste) { return liste[Math.floor(Math.random() * liste.length)]; }
	document.querySelectorAll('.potasse-quiz').forEach(function (quiz) {
		var bonne = quiz.getAttribute('data-bonne');
		var boutons = quiz.querySelectorAll('.potasse-quiz-options button');
		var correction = quiz.querySelector('.potasse-quiz-correction');
		var verdict = quiz.querySelector('.potasse-quiz-verdict');
		boutons.forEach(function (bouton) {
			bouton.addEventListener('click', function () {
				var choix = bouton.getAttribute('data-lettre');
				boutons.forEach(function (b) {
					b.disabled = true;
					if (b.getAttribute('data-lettre') === bonne) { b.classList.add('est-juste'); }
				});
				if (choix !== bonne) { bouton.classList.add('est-faux'); }
				verdict.textContent = auHasard(choix === bonne ? reactions.juste : reactions.faux);
				correction.hidden = false;
				// Le focus va sur la réponse (clavier, lecteur d'écran), et la correction
				// remonte au-dessus du bouton fixe sur téléphone.
				verdict.focus({ preventScroll: true });
				correction.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
			});
		});
	});
})();
JS;
		wp_print_inline_script_tag( $js );
	}
);
