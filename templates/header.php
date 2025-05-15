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

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&family=Zilla+Slab:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <?php else: ?>
        <script type="module" src="/dist/assets.js"></script>
        <link rel="stylesheet" href="/dist/assets.css">
    <?php endif; ?>
</head>

<body class="bg-gray-950 text-gray-200 flex flex-col min-h-screen font-serif">
    <header>
        <div class="container m-auto flex justify-center py-6">
            <p class="inline me-auto font-sans-serif">Lucien Mary</p>
            <nav class="space-x-4" aria-label="Liens de menu">
                <a href="#">À propos</a>
                <a href="#">Mes projets</a>
                <a href="#">Me contacter</a>
            </nav>
        </div>
    </header>
    <main class="flex-grow">