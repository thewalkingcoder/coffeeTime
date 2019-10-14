# CoffeeTime

Poc sur le mise en place de l'intégration continue

## Installation

### Côté backend

Copier .env en .env.local

Modifier le fichier de configuration par rapport à votre environnement

En suivant

```

composer install

php bin/console doctrine:database:create

php bin/console doctrine:migration:migrate

```
### Côté frontend

```
yarn install

yarn build

```

## Développement mode

```
yarn run server

```

Vérifier dans le package.json la configuration pour votre VM


## Déploiement

voir le .gitlab-ci.yml

Pour le hook côté serveur voir le fichier sous deploiement/post-receive
