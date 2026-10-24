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

## Réglages

- **Lien du bouton** : `POTASSE_BOT_URL` dans `functions.php` (`https://t.me/excomptable_bot?start=site`).
- **Couleurs, polices, tailles** : `theme.json`.
- **Bouton fixe et petits styles** : `style.css`.

## Licences

Thème sous GPL v2 ou ultérieure. Polices sous SIL Open Font License 1.1 (fichiers `LICENSE.txt` dans `assets/fonts/`).
