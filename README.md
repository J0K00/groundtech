# GroundTech Web Application

Une application web pour la gestion des rapports géotechniques et la visualisation des projets sur une carte interactive.

## À propos de GroundTech

GroundTech est une application web développée avec Laravel qui permet aux ingénieurs de créer et gérer des rapports géotechniques, et aux utilisateurs de visualiser les projets sur une carte interactive. L'application offre les fonctionnalités suivantes :

- Création et gestion de rapports géotechniques
- Visualisation des projets sur une carte interactive
- Gestion des utilisateurs avec différents rôles (Admin, Ingénieur, Utilisateur)
- Interface moderne et responsive

## Technologies Utilisées

- [Laravel](https://laravel.com) - Framework PHP
- [Leaflet](https://leafletjs.com) - Bibliothèque JavaScript pour les cartes interactives
- [Tailwind CSS](https://tailwindcss.com) - Framework CSS
- MySQL - Base de données

## Installation

1. Cloner le repository
```bash
git clone https://github.com/votre-username/GroundTechWeb.git
cd GroundTechWeb
```

2. Installer les dépendances
```bash
composer install
npm install
```

3. Configurer l'environnement
```bash
cp .env.example .env
php artisan key:generate
```

4. Configurer la base de données dans le fichier .env

5. Exécuter les migrations
```bash
php artisan migrate
```

6. Lancer l'application
```bash
php artisan serve
npm run dev
```

## License

Ce projet est sous licence MIT. Voir le fichier [LICENSE](LICENSE) pour plus de détails.
