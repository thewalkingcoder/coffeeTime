# CoffeeTime

Poc sur le mise en place de l'intégration continue

## Installation

```
composer install

```

```
yarn install
```

```
php bin/console doctrine:database:create

php bin/console doctrine:migration:migrate

```

## Développement mode

```
yarn run server

```

Vérifier dans le package.json la configuration pour votre VM

## Mise en production

```
yarn run build
```

## Déploiement

voir le .gitlab-ci.yml

Pour le hook côté serveur voir le fichier sous deploiement/post-receive
