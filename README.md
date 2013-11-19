# classiques

> Classiques de la litérature québecoise

[![Build Status](https://travis-ci.org/codicille/classiques.png?branch=master)](https://travis-ci.org/codicille/classiques)

## Guide de démarrage

### Gestion de la bibliothèque

Pour ajouter ou modifier un livre à la bibliothèque, voir le fichier `bibliotheque.json`
qui contient tous les métas donnés sur les oeuvres de la bibliothèque.

Pour ajouter un livre, assurez-vous d'utiliser le tag déterminé dans `bibliotheque.json`
pour mettre le ou les fichiers liés dans le dossier `oeuvres`, par exemple `/oeurvre/la-scouine.html`.

### Application PHP

Ce site web a été conçu afin d'être simple à mettre à jour et modifier par tout
développeur web. Vous avez besoin de PHP 5.4+ pour partir simplement un site web
de développement. Pour la mise en ligne, celle-ci se fait automatiquement quand
des modifications sont apportées à ce dépôt github.

    php -S localhost:8000

### Feuilles de style

Ce site web utilise [SASS](http://sass-lang.com/) en tant que préprocesseur pour les feuilles de style.

Afin d'utiliser SASS en local sur votre machine de développement vous devez commencer par installer le gem sass.

    gem install sass

Pour débuter l'observation et la compilation en temps réel des feuilles de style, il suffit d'utiliser la commande sass watch.

    sass --watch ./css

### Tests

L'application est automatiquement testée lors d'une modification, mais vous pouvez
installer et rouler les tests avec PHP Composer:

    composer install --dev
    ./vendor/bin/phpunit ./tests

## Mise en ligne manuelle

Prérequis : https://toolbelt.heroku.com

Configuration :

    git remote add staging git@heroku.com:classiques-staging.git
    heroku config:push --remote staging
    git remote add production git@heroku.com:classiques.git
    heroku config:push --remote staging

Mise en ligne :

    git push [staging|production] master

## Crédits & licence

Le code source des Classiques de la lirétature québecoise est disponible sous la
licence GNU General Public License Version 3. Consultez [LICENSE](LICENSE.md) pour
les détails. La licence est disponible uniquement en anglais puisqu'il serait
complexe et coûteux de fournir une traduction officielle cette licence. Vous
pouvez toutefois trouvez des traductions approximatives n'ayant pas valeur légale
sur [GNU](http://www.gnu.org/licenses/translations.html).

Le project est une réalisation conjointe de de René Audet, Codicille éditeur,
Département des littératures, Université Laval, Hookt Studios, Heliom
et tous les autres contributeurs.

Les contributions sont bienvenues, veuillez toutefois d'abord consulter le [guide de contribution](CONTRIBUTING.md).