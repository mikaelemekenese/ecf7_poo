<h1>Evaluation - Compétences 6 et 7</h1>
<br>
Pour cet ECF, nous avons été tenus de réaliser une plateforme de location de films au format DVD pour l'entreprise Sakila. Cette dernière sera un outil destiné à être utilisé en interne par les employés qui gèreront les locations par les clients de l'entreprise. Le projet sera entièrement réalisé en orienté objet.
<br><br>

<h2>Choix techniques et prises de décision</h2>
<br>

* Pour la mise en forme du site, j'ai décidé d'utiliser le framework CSS Bulma, très esthétique et facile à utiliser.
* La liste des films étant très longue (1000 au total), j'ai établi en page d'accueil un système de "filtre" de la base de données, afin de dégager la liste de films par catégorie ou par acteur ainsi qu'un système de recherche de titres de films.
* La location de film s'effectuera dans la page de détails de chaque film (accès via les boutons "View details" pour chaque films en page d'accueil).
* Les retours se feront via la page "Rentals" (barre de navigation) qui affiche la liste des locations en cours.
<br><br>

<h2>Identification des contraintes et difficultés rencontrées</h2>
<br>

* La base de données étant si imposante n'était pas évidente à comprendre, notamment les relations entre les tables ainsi tout ce qui concerne les "views", les "stored procedures" et les "functions".
* Je ne suis pas parvenu à rendre fonctionnels la location et le retour de DVD. Les requêtes sont correctes (elles fonctionnent sur Workbench) et le formulaire est bon mais le problème se situe au niveau de l'envoi des données.
<br>

<h2>Installation du projet</h2>
<br>

1. Dans MySql Workbench, vous devez importer les deux fichiers .sql (d'abord sakila-schema.sql puis sakila-data.sql) de la BDD : Server > Data Import > Import from Self-Contained File.<br>

2. Après avoir lancé votre serveur en local (localhost), rendez-vous sur votre navigateur.<br>
