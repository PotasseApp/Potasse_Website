<?php
/**
 * Title: Potasse — Page d'accueil
 * Slug: potasse/accueil
 * Categories: potasse
 * Block Types: core/post-content
 * Post Types: page
 * Viewport width: 400
 * Description: Les 9 sections, photo et captures comprises, de la page d'accueil en bandes pleine largeur (crème et beige en alternance, vert pour l'appel final). Textes du kit, octobre 2026.
 *
 * @package Potasse
 */
?>
<!-- wp:group {"tagName":"section","align":"full","layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull"><!-- wp:columns {"verticalAlignment":"center","align":"wide","className":"potasse-hero"} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center potasse-hero"><!-- wp:column {"verticalAlignment":"center","width":"58%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:58%"><!-- wp:heading {"level":1,"className":"potasse-nom"} -->
<h1 class="wp-block-heading potasse-nom">Potasse</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"is-style-manuscrit potasse-sous-nom"} -->
<p class="is-style-manuscrit potasse-sous-nom">Potasse, construit par un étudiant pour des étudiants 🌱</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"potasse-accroche"} -->
<p class="potasse-accroche">Réviser ta compta, c'est pas marrant. Heureusement, t'as un <mark class="potasse-surligne">bon pote</mark>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"fontSize":"large"} -->
<p class="has-large-font-size">Il répond à tes questions de cours, te quizze trois fois par jour et revient sur ce que tu oublies. Pour le BTS Comptabilité et Gestion.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="https://t.me/excomptable_bot?start=site">Démarrer sur Telegram</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:paragraph {"className":"potasse-rassurance","fontSize":"small"} -->
<p class="potasse-rassurance has-small-font-size">Gratuit pendant le rodage · il suffit d'avoir Telegram</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"42%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:42%"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"potasse-photo"} -->
<figure class="wp-block-image size-full potasse-photo"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/joseph-velux.webp' ) ); ?>" alt="Joseph, le créateur de Potasse, qui sourit à la fenêtre d'un velux au-dessus d'une rivière"/><figcaption class="wp-element-caption">Ma salle de révision : vue sur rivière, zéro amphi.</figcaption></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","align":"full","className":"potasse-valeurs-section","layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull potasse-valeurs-section"><!-- wp:columns {"align":"wide","className":"potasse-valeurs"} -->
<div class="wp-block-columns alignwide potasse-valeurs"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph {"className":"potasse-tampon"} -->
<p class="potasse-tampon">fait main</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Bricolé par un étudiant, le soir, entre deux chapitres. Pas de levée de fonds, pas d'équipe marketing : juste quelqu'un qui révise le même BTS que toi.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph {"className":"potasse-tampon"} -->
<p class="potasse-tampon">écolo</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Un site léger : images compressées, aucune vidéo, aucun pisteur. Bientôt, Potasse tournera dans un datacenter suisse alimenté en énergie renouvelable, dont la chaleur des serveurs sert à chauffer des logements.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph {"className":"potasse-tampon"} -->
<p class="potasse-tampon">souverain</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Tes données ne sont ni vendues ni utilisées pour entraîner une IA. Potasse déménage en Suisse, chez un hébergeur indépendant. <a href="/ou-sont-tes-donnees/">Où en est le déménagement</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","align":"full","backgroundColor":"accent-6","layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull has-accent-6-background-color has-background"><!-- wp:heading -->
<h2 class="wp-block-heading">Tu relis ton cours pour la dixième fois. Tu retiens rien.</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Normal. On ne retient pas en relisant, on retient en se faisant interroger. Sauf qu'à distance, personne ne t'interroge. Alors j'ai bricolé quelqu'un qui le fait.</p>
<!-- /wp:paragraph --></section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","align":"full","layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull"><!-- wp:heading -->
<h2 class="wp-block-heading">Comment ça marche</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"potasse-barre","fontSize":"large"} -->
<p class="potasse-barre has-large-font-size"><s>Révolutionne tes révisions grâce à l'IA.</s> Tu poses ta question, il te répond. C'est tout.</p>
<!-- /wp:paragraph -->

<!-- wp:columns {"align":"wide","className":"potasse-etapes"} -->
<div class="wp-block-columns alignwide potasse-etapes"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Il connaît tes cours.</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Pose ta question comme à un pote : « c'est quoi la VNC ? ». Il répond à partir de fiches écrites pour le BTS CG, pas d'Internet au hasard. Et il se souvient de ce que vous venez de dire : « et en dégressif ? » suffit.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Il insiste là où tu bloques.</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Trois QCM par jour, à 9 h, 13 h et 18 h, du lundi au samedi. Juste ? La question revient dans 3 jours, puis 7, 21, 45 et 90. Faux ? Elle revient demain. C'est la répétition espacée.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Tu gardes la main.</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>« quiz TVA » pour réviser un thème, « stats » pour voir tes thèmes en vert, orange ou rouge, « pause 3 » pour souffler trois jours. Et le bouton « Me quizzer » sous chaque réponse te teste tout de suite.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","align":"full","backgroundColor":"accent-6","layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull has-accent-6-background-color has-background"><!-- wp:heading -->
<h2 class="wp-block-heading">Essaie, là, tout de suite</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Une vraie question de la banque de Potasse. Clique sur ta réponse.</p>
<!-- /wp:paragraph -->

<!-- wp:html -->
<div class="potasse-quiz" data-bonne="A">
	<p class="potasse-quiz-theme">P1 · Comptes</p>
	<p class="potasse-quiz-enonce">Une entreprise achète des armoires et des tables de réunion pour 4&nbsp;800&nbsp;€ HT (chaque meuble coûte plus de 500&nbsp;€ HT), à utiliser plusieurs années. Quel compte <span class="potasse-insecable">débite-t-elle&nbsp;?</span></p>
	<div class="potasse-quiz-options">
		<button type="button" data-lettre="A"><b>A</b> 2184</button>
		<button type="button" data-lettre="B"><b>B</b> 2182</button>
		<button type="button" data-lettre="C"><b>C</b> 2183</button>
		<button type="button" data-lettre="D"><b>D</b> 6064</button>
	</div>
	<div class="potasse-quiz-correction" hidden>
		<p class="potasse-quiz-verdict" aria-live="polite" tabindex="-1"></p>
		<p>Armoires et tables = mobilier&nbsp;: 2184. Le 2182 est le matériel de transport, le 2183 le matériel de bureau et informatique, le 6064 les fournitures administratives (des charges, pas un bien durable).</p>
		<p class="potasse-quiz-memo">Mnémo&nbsp;: le 2182 roule, le 2184 reste dans le bureau.</p>
	</div>
</div>
<!-- /wp:html -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">Sur Telegram, il y en a trois par jour, et celles que tu rates reviennent le lendemain.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="https://t.me/excomptable_bot?start=quiz">Démarrer sur Telegram</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","align":"full","layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull"><!-- wp:heading -->
<h2 class="wp-block-heading">À quoi ça ressemble</h2>
<!-- /wp:heading -->

<!-- wp:columns {"isStackedOnMobile":false,"align":"wide","className":"potasse-captures"} -->
<div class="wp-block-columns alignwide is-not-stacked-on-mobile potasse-captures"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/capture-quiz.webp' ) ); ?>" alt="Capture de Telegram : Potasse envoie un QCM sur les créances douteuses, avec quatre réponses possibles"/><figcaption class="wp-element-caption">Un QCM avec mon café</figcaption></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/capture-explication.webp' ) ); ?>" alt="Capture de Telegram : Potasse explique pas à pas l'écriture d'un acompte client avec TVA"/><figcaption class="wp-element-caption">Quand j'ai pas compris un cours</figcaption></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/capture-quiz-amortissement.webp' ) ); ?>" alt="Capture de Telegram : une série de questions de quiz sur l'amortissement"/><figcaption class="wp-element-caption">5 min dans les transports</figcaption></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","align":"full","backgroundColor":"accent-6","layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull has-accent-6-background-color has-background"><!-- wp:heading -->
<h2 class="wp-block-heading">C'est pour toi si…</h2>
<!-- /wp:heading -->

<!-- wp:list {"className":"is-style-coches"} -->
<ul class="wp-block-list is-style-coches"><!-- wp:list-item -->
<li>Tu prépares ton BTS CG, en classe ou à distance</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Tu relis sans retenir</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Tu n'as personne pour te poser des questions</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Tu as 5 minutes, pas 2 heures</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:paragraph {"className":"potasse-postit"} -->
<p class="potasse-postit">Promis : pas de pub, pas de pisteur, pas de revente de tes données.</p>
<!-- /wp:paragraph --></section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","align":"full","layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull"><!-- wp:heading -->
<h2 class="wp-block-heading">Ce qui arrive</h2>
<!-- /wp:heading -->

<!-- wp:list {"className":"is-style-feuille-de-route"} -->
<ul class="wp-block-list is-style-feuille-de-route"><!-- wp:list-item -->
<li><strong>Tout le programme</strong><br>P4 à P7 s'écrivent au rythme de mes propres révisions.</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><strong>Bilan de la semaine</strong><br>Tes progrès et quoi revoir, envoyés tout seuls.</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><strong>Entraînement à l'épreuve</strong><br>Des séries chronométrées façon examen.</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><strong>Tes données en Suisse</strong><br>Potasse déménage chez Infomaniak, à Genève : énergie renouvelable, serveurs qui chauffent des logements, et une IA hébergée sur place.</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","align":"full","backgroundColor":"accent-6","layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull has-accent-6-background-color has-background"><!-- wp:group {"className":"potasse-cahier","layout":{"type":"constrained"}} -->
<div class="wp-block-group potasse-cahier"><!-- wp:heading -->
<h2 class="wp-block-heading">Pas une startup. Juste un étudiant.</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Je m'appelle Joseph, je prépare le BTS Comptabilité et Gestion à distance, pour la session de juin 2027. Je relisais mes cours sans rien retenir et personne ne pouvait m'interroger. Alors j'ai construit Potasse, sous un velux, un jour de pluie. Je m'en sers tous les jours : chaque fiche que j'écris pour mon BTS le rend plus fort.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"is-style-manuscrit"} -->
<p class="is-style-manuscrit">Je crée Potasse pour qu'on s'en sorte.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"potasse-signature"} -->
<p class="potasse-signature">Joseph</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","align":"full","layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull"><!-- wp:heading -->
<h2 class="wp-block-heading">Questions fréquentes</h2>
<!-- /wp:heading -->

<!-- wp:details -->
<details class="wp-block-details"><summary>C'est gratuit ?</summary><!-- wp:paragraph -->
<p>Oui. Potasse est gratuit pendant son rodage. Une formule payante n'arrivera qu'avec au moins 30 utilisateurs actifs, et tu seras prévenu avant.</p>
<!-- /wp:paragraph --></details>
<!-- /wp:details -->

<!-- wp:details -->
<details class="wp-block-details"><summary>Ça couvre tout le programme ?</summary><!-- wp:paragraph -->
<p>Pas encore. Potasse connaît les processus déjà rédigés, la CEJM, les maths et l'anglais ; P4 à P7 arrivent au fil de mes révisions. Si une réponse manque, le bot te le dit au lieu d'inventer.</p>
<!-- /wp:paragraph --></details>
<!-- /wp:details -->

<!-- wp:details -->
<details class="wp-block-details"><summary>Pourquoi Telegram ?</summary><!-- wp:paragraph -->
<p>Parce que c'est gratuit, rapide et que tu n'as rien à installer de plus. Une version web est à l'étude.</p>
<!-- /wp:paragraph --></details>
<!-- /wp:details -->

<!-- wp:details -->
<details class="wp-block-details"><summary>C'est pas juste ChatGPT ?</summary><!-- wp:paragraph -->
<p>Non. Potasse répond à partir de fiches de cours vérifiées, il te relance tout seul plusieurs fois par jour, et derrière il y a un humain qui lit tes retours.</p>
<!-- /wp:paragraph --></details>
<!-- /wp:details -->

<!-- wp:details -->
<details class="wp-block-details"><summary>Quelle IA fait tourner Potasse ?</summary><!-- wp:paragraph -->
<p>Aujourd'hui, les réponses sont rédigées par Mistral AI, une entreprise française, à partir de mes fiches. Bientôt, ce seront des modèles open source hébergés en Suisse chez Infomaniak, dans un datacenter alimenté en énergie renouvelable dont la chaleur chauffe des logements à Genève. Dans tous les cas, Potasse n'utilise jamais tes messages pour entraîner une IA.</p>
<!-- /wp:paragraph --></details>
<!-- /wp:details -->

<!-- wp:details -->
<details class="wp-block-details"><summary>Il peut se tromper ?</summary><!-- wp:paragraph -->
<p>Oui, comme tout assistant. Chaque question a un bouton ⚠️ Signaler, les QCM générés par l'IA sont relus chaque semaine, et quand une écriture comptable ne s'équilibre pas, le bot la fait corriger avant de te répondre. Vérifie quand même avec ton cours.</p>
<!-- /wp:paragraph --></details>
<!-- /wp:details -->

<!-- wp:details -->
<details class="wp-block-details"><summary>Que deviennent mes données ?</summary><!-- wp:paragraph -->
<p>Le strict minimum, jamais vendu, jamais utilisé pour entraîner une IA. Tout est expliqué sur la page <a href="/ou-sont-tes-donnees/">Où sont tes données</a>.</p>
<!-- /wp:paragraph --></details>
<!-- /wp:details -->

<!-- wp:details -->
<details class="wp-block-details"><summary>Comment te faire un retour ?</summary><!-- wp:paragraph -->
<p>Réponds directement au bot ou écris-moi sur Instagram @joseph_bleuroi. Je lis tout.</p>
<!-- /wp:paragraph --></details>
<!-- /wp:details --></section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","align":"full","backgroundColor":"accent-1","textColor":"base","layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull has-base-color has-accent-1-background-color has-text-color has-background"><!-- wp:heading {"textAlign":"center","textColor":"base"} -->
<h2 class="wp-block-heading has-text-align-center has-base-color has-text-color">On potasse ensemble ?</h2>
<!-- /wp:heading -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"base","textColor":"accent-1"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-accent-1-color has-base-background-color has-text-color has-background wp-element-button" href="https://t.me/excomptable_bot?start=site">Démarrer sur Telegram</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></section>
<!-- /wp:group -->
