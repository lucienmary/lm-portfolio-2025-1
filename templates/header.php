<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($meta['title'] ?? 'Portfolio', ENT_QUOTES) ?> - Lucien Mary - Développeur Front end / UI/UX webdesigner</title>
    <?php if (getenv('APP_ENV') === 'dev'): ?>
        <!-- HMR + dev client Vite -->
        <script type="module" src="http://localhost:5173/@vite/client"></script>
        <script type="module" src="http://localhost:5173/src/main.js"></script>
        <link rel="stylesheet" href="http://localhost:5173/src/main.css">
    <?php else: ?>
        <!-- Prod : lire public/dist/manifest.json et injecter -->
        <?php
        $manifest = json_decode(file_get_contents(__DIR__ . '/../public/dist/manifest.json'), true);
        ?>
        <script type="module" src="/dist/<?= $manifest['src/main.js']['file'] ?>"></script>
        <?php if (isset($manifest['src/main.js']['css'])): ?>
            <link rel="stylesheet" href="/dist/<?= $manifest['src/main.js']['css'][0] ?>">
        <?php endif; ?>
    <?php endif; ?>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&family=Zilla+Slab:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
</head>

<body class="bg-main text-gray-200 flex flex-col min-h-screen font-serif">
    <header id="header" class="fixed top-0 w-screen font-sans-serif z-100 duration-300">
        <div class="container m-auto flex place-content-end px-6 py-6">
            <a id="logo" class="me-auto text-2xl/[21px] opacity-0 duration-300" href="/index.php">Lucienmary.be</a>
            <nav class="space-x-4 font-light" aria-label="Liens de menu">
                <a class="hover:text-gray-400 duration-200" href="/index.php">Accueil</a>
                <a class="hover:text-gray-400 duration-200" href="/index.php#about">À propos</a>
                <a class="hover:text-gray-400 duration-200" href="projects.php">Mes projets</a>
                <a class="hover:text-gray-400 duration-200" href="#contact">Me contacter</a>
            </nav>
        </div>
    </header>
    <main class="flex-grow">