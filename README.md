<h1>Evaluation - Compétences 6 et 7</h1>
<br>
Pour cet ECF, nous avons été tenus de réaliser une plateforme de location de films au format DVD pour l'entreprise Sakila. Cette dernière sera un outil destiné à être utilisé en interne par les employés qui gèreront les locations par les clients de l'entreprise. Le projet sera entièrement réalisé en orienté objet.
<br><br>

<h2>Choix techniques et prises de décision</h2>

* Pour la mise en forme du site, j'ai décidé d'utiliser le framework CSS Bulma, très esthétique et facile à utiliser.
* Pour une meilleure lisibilité du code, j'ai séparé les fichiers de vues (views et partials pour les header et footer) de ceux de classes et placé le fichier de base de données dans un dossier qui lui est propre.
* La liste des films étant très longue (1000 au total), j'ai établi en page d'accueil un système de "filtre" afin de dégager la liste de films par catégorie ou par acteur ainsi qu'un système de recherche de films (uniquement sur les titres de film).
* La location de film s'effectuera dans la page de détails de chaque film (accès via les boutons "View details" en page d'accueil).
* Les retours se feront via la page "Rentals" (barre de navigation) qui affiche la liste des locations en cours (cliquer sur "Rental details" pour le retour).
<br><br>

<h2>Identification des contraintes et difficultés rencontrées</h2>

* La base de données étant si imposante n'était pas évidente à comprendre, notamment les relations entre les tables ainsi que tout ce qui concerne les "views", les "stored procedures" et les "functions".
* Les fonctionnalités principales du site, la location et le rendu des films, n'ont pas été évidentes à mettre en place.
* Je ne suis pas parvenu à instaurer un système de paiement pour les locations.
<br>

<h2>Installation du projet</h2>

1. Dans MySql Workbench, vous devez importer les deux fichiers .sql (d'abord sakila-schema.sql puis sakila-data.sql) de la BDD : Server > Data Import > Import from Self-Contained File.<br>

2. Après avoir lancé votre serveur en local (localhost), rendez-vous sur votre navigateur pour afficher les données : localhost/{nom du dossier contenant le projet placé dans htdocs}<br>
