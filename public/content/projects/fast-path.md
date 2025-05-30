---
slug: "fast-path"
title: "Fast Path"
class: "Extension Chrome"
image: "content/projects/fast-path.png"
url: "https://chromewebstore.google.com/detail/fast-path/ehchjkpecneoleoglbiemoeaaocohgia"
desc: "Cette extension permet d'utiliser un chemin préenregistré pour naviguer plus rapidement sur un site web, via un raccourci clavier."
isOnline: true
---
### Contexte & fonctionnalités  
Fast Path permet, via un raccourci clavier, d’ouvrir instantanément un chemin préenregistré sur l’URL courante.  
- Raccourci pour ouvrir le popup (Ctrl + Shift + E / ⌘ + Shift + E)  
- Saisie du chemin relatif (ex. `/admin`)  
- Choix d’ouvrir dans l’onglet actuel, un nouvel onglet ou une nouvelle fenêtre  
- Raccourcis dédiés pour exécuter l’action (Ctrl + E), basculer le mode d’ouverture (Ctrl + Shift + X) et gérer le groupement d’onglets (Ctrl + Shift + G) 

### Design & UX  
- Popup minimaliste : seul élément visuel, il doit rester visible et identifiable  
- Palette très colorée et contrastée pour se démarquer du site en arrière-plan  
- Icônes et styles réalisés en SCSS, conçus pour être immédiatement reconnaissables  

<!--STACK-->

### Front-end popup & options
- HTML *(popup.html, options.html)* 
- SCSS → CSS *(dossier `styles/`)*
- JavaScript ES6 *(popup.js, options.js)*
- API Chrome Extensions *(storage.sync, tabs, commands)*
### Packaging & diffusion
- Manifest v3 *(service worker en background.js, permissions storage et tabs)*
- Icônes multi-tailles *(16 px, 38 px, 48 px, 128 px)* 
- Publication sur le Chrome Web Store 
