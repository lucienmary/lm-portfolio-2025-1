<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($meta['title'] ?? 'Mon Portfolio', ENT_QUOTES) ?></title>
    <?php if (getenv('APP_ENV') === 'dev'): ?>
        <script type="module" src="http://localhost:5173/@vite/client"></script>

        <script type="module" src="http://localhost:5173/src/main.js"></script>
        <link rel="stylesheet" href="http://localhost:5173/src/main.css">
    <?php else: ?>
        <script type="module" src="/dist/assets.js"></script>
        <link rel="stylesheet" href="/dist/assets.css">
    <?php endif; ?>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&family=Zilla+Slab:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
</head>

<body class="bg-gray-950 text-gray-200 flex flex-col min-h-screen font-serif">
    <header class="fixed top-0 w-screen font-sans-serif">
        <div class="container m-auto flex place-content-end py-6">
            <p class="me-auto hidden">Lucien Mary</p>
            <nav class="space-x-4 font-light" aria-label="Liens de menu">
                <a href="#">À propos</a>
                <a href="#">Mes projets</a>
                <a href="#">Me contacter</a>
            </nav>
        </div>
    </header>
    <main class="flex-grow">