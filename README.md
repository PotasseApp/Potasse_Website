# Potasse — thème du site vitrine

Thème enfant WordPress de **Twenty Twenty-Five** pour le site vitrine de Potasse (potasse.app).

Ce dépôt contient **uniquement du code** : aucun texte de page, aucun réglage, aucune donnée d'élève. Les textes vivent dans la base WordPress (voir le « Kit site vitrine Potasse »).

## Ce que fait le thème

- **Palette Earthy Garden** : crème `#F5E9D7`, sapin `#3E5C2C`, kaki `#7A9B4F`, bois `#D9B98C`, brun `#6B4423`, noir `#1C1C1C`.
- **Polices hébergées sur le site** (Instrument Serif pour les titres, DM Sans pour le texte, Caveat pour les touches manuscrites). Rien n'est chargé depuis Google.
- **Pensé d'abord pour le téléphone** : texte de 16 px minimum, boutons de 44 px minimum, bouton « Démarrer sur Telegram » fixé en bas de l'écran sur mobile.
- **Aucun appel à un service extérieur** : le script d'émojis de WordPress (qui charge des images depuis s.w.org) et les pré-connexions DNS sont retirés.
- **Style « Manuscrit »** disponible sur les paragraphes et les titres, dans l'éditeur.

## Installer dans le site Local

1. Le thème parent **Twenty Twenty-Five** doit être installé (il l'est par défaut dans WordPress 6.7 et plus).
2. Dans **GitHub Desktop** : *File → Clone repository* → `PotasseApp/Potasse_Website`.
3. Comme *Local path*, choisis le dossier des thèmes du site, avec un dossier final nommé `potasse` :
   `C:\Users\<toi>\Local Sites\potasse\app\public\wp-content\themes\potasse`
4. Dans WordPress : **Apparence → Thèmes → Potasse → Activer**.

Pour récupérer une mise à jour : GitHub Desktop → **Fetch origin**, puis **Pull**.

## Créer les pages avec les compositions

Le thème fournit 4 compositions prêtes (dossier `patterns/`), rangées dans la catégorie **Potasse** :

| Page à créer | Slug (permalien) | Composition |
| --- | --- | --- |
| Accueil | `accueil` | Potasse — Page d'accueil |
| Où sont tes données | `ou-sont-tes-donnees` | Potasse — Où sont tes données |
| Politique de confidentialité | `confidentialite` | Potasse — Politique de confidentialité |
| Mentions légales | `mentions-legales` | Potasse — Mentions légales |

1. **Pages → Ajouter** : WordPress propose de partir d'une composition ; choisis celle de la page. Sinon : bouton **+** → onglet **Compositions** → catégorie **Potasse**.
2. Dans le panneau de droite, vérifie le **slug** du tableau : le pied de page et la FAQ pointent vers ces adresses.
3. Pour l'accueil, choisis le modèle **Page sans titre** (« Page No Title ») (le titre est déjà dans la composition).
4. **Réglages → Lecture** : « Une page statique » → Page d'accueil : **Accueil**.
5. Complète les passages entre crochets [ ] et ajoute la photo et les captures.

L'en-tête (logo et bouton « Démarrer ») et le pied de page (signature et liens légaux) viennent du thème (`parts/`). La page d'accueil utilise le modèle `templates/front-page.html`, sans titre de page.

Styles de blocs ajoutés par le thème : **Manuscrit** (paragraphes, titres), **Coches** et **Feuille de route** (listes).

**Après une mise à jour de la composition d'accueil**, le contenu déjà enregistré dans la page ne change pas : pour profiter de la nouvelle version, ouvre la page Accueil, sélectionne tous les blocs (Ctrl+A deux fois), supprime-les, puis insère à nouveau la composition « Potasse — Page d'accueil ».

## Mini QCM de l'accueil

La question jouable de la section « Essaie, là, tout de suite » est un bloc HTML de la composition d'accueil, tiré de la banque Questions Potasse (n° 67, compte 2184). Pour la changer : modifier l'énoncé, les 4 boutons, `data-bonne` (lettre juste) et l'explication. Les petites réactions drôles sont dans `functions.php`.

## Réglages

- **Lien du bouton** : `POTASSE_BOT_URL` dans `functions.php` (`https://t.me/excomptable_bot?start=site`).
- **Couleurs, polices, tailles** : `theme.json`.
- **Bouton fixe et petits styles** : `style.css`.

## Partage et référencement

Gérés par le thème, sans extension (`functions.php`) :

- titre d'onglet de l'accueil : « Potasse — le bot Telegram pour réviser le BTS CG » ;
- description (`POTASSE_DESCRIPTION`) et balises de partage (aperçu WhatsApp, Discord, réseaux sociaux) avec l'image `assets/images/partage.jpg` (1200 × 630) ;
- icône du site (pousse) : `favicon.svg`, `icone-512.png`, `icone-180.png`, sauf si une icône est choisie dans WordPress ;
- page 404 aux couleurs de Potasse (`templates/404.html`).

## Licences

Thème sous GPL v2 ou ultérieure. Polices sous SIL Open Font License 1.1 (fichiers `LICENSE.txt` dans `assets/fonts/`).
