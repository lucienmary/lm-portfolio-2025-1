---
slug: "the-jungle-snack"
title: "The Jungle Snack"
class: "Node.js - Websocket - SQL"
image: "content/projects/tjs.png"
url: "https://github.com/lucienmary/The_jungle_snack-TFE/tree/master"
desc: "Projet de fin d'étude: Jeu de plateau en ligne, en temps réel."
isOnline: true
---

### Contexte  
En 2020, dans le cadre de mon projet de fin d’étude, j’ai conçu **The Jungle Snack**, un jeu de plateau multi-joueurs en ligne inspiré de **L’argent de poche** (Jumbo, 1996). L’application propose :  
- Un salon de connexion pour configurer ou créer une partie  
- Jusqu’à 4 joueurs par partie, démarrage automatique au bout de 60 s  
- Un déroulé au tour par tour, synchronisé en temps réel via WebSocket  
- Durée moyenne d’une partie : 20 minutes  

### Design & UX  
Le style graphique, coloré et « cartoon », plonge dans un univers de jungle :  
- Illustrations et icônes réalisées sous Adobe Illustrator  
- SCSS modulaires pour une palette de couleurs vives et des animations fluides  
- Dalles du plateau qui réagissent au passage des pions, dés animés, cartes interactives  
- Interface épurée : menu de jeu, panneau de paramètres et retours visuels en temps réel  

### Architecture générale  
- **Stack full JavaScript** : Node.js / Express au back-end, HTML5 / SCSS / JS au front  
- **Temps réel** : Socket.IO pour l’émission et la réception d’événements de jeu  
- **API REST** : Express + JSON Web Tokens pour l’authentification et la gestion des parties  
- **Base de données** : MySQL gérée via Sequelize (modèles, migrations, relations)  
- **Servir les assets** : Express static pour HTML, CSS, JS, images  
  
### Front-end  
- **Technos** : HTML5, SCSS, JavaScript ES6, jQuery  
- **Templates** : JSX pour générer pages publiques et interface de jeu  
- **Communication asynchrone** : AJAX vers l’API REST pour les opérations CRUD  
- **WebSocket client** : intégration du client Socket.IO pour mises à jour en direct  
- **Optimisations** : chargement différé des scripts, sprites CSS pour réduire les requêtes  

### Défis & Solutions  
1. **Courbe d’apprentissage Node.js**  
   - **Défi :** structurer un serveur Express orienté jeu temps réel  
   - **Solution :** routeurs modulaires, tests unitaires des contrôleurs, gestion stricte des erreurs  
2. **Rendu dynamique du plateau**  
   - **Défi :** animer l’avancée des pions et le lancer de dés côté client  
   - **Solution :** combiner CSS keyframes et callbacks jQuery, synchronisation avec Socket.IO  

Cette architecture full-JavaScript m’a permis d’itérer rapidement, de minimiser la latence des échanges et d’offrir une expérience de jeu fluide.

Le projet n'est plus en ligne actuellement, mais vous pouvez consulter le repo github.



<!--STACK-->
### Back-end
- Node.js
- Express.js
- Socket.IO
- Sequelize *(MySQL)*
- JSON Web Token *(jsonwebtoken)*
- Npm package : bcryptjs, body-parser, method-override, cookie-parser, serve-favicon

### Front-end
- HTML5
- SCSS
- JavaScript *(ES6)* & jQuery
- AJAX *(XMLHttpRequest)*
- JSX *(templates)*
- Socket.IO client

### Base de données
- MySQL

### Outils & Packaging
- npm
- Git / GitHub
- Adobe Illustrator & Photoshop *(assets)*

