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
            $manifest = json_decode(file_get_contents(__DIR__ . '/../.vite/manifest.json'), true);
            $css  = $manifest['src/main.js']['css'][0];
            $js   = $manifest['src/main.js']['file'];
        ?>
        <link rel="stylesheet" href="/<?= $css ?>">
        <script defer src="/<?= $js ?>"></script>
    <?php endif; ?>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&family=Zilla+Slab:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
</head>

<body class="bg-main text-gray-200 flex flex-col min-h-screen font-serif overflow-x-hidden">
    <header id="header" class="fixed top-0 w-screen font-sans-serif z-100 duration-300">
        <div class="container m-auto flex place-content-end px-6 py-6">
            <a id="logo" class="me-auto text-2xl/[21px] opacity-0 duration-300" href="/index.php">Lucienmary.be</a>
            <nav class="">
                <div class="mx-auto max-w-7xl md:px-6 lg:px-8">
                    <div class="relative flex items-center justify-between">
                        <div class="inset-y-0 flex items-center md:hidden">
                            <!-- Mobile menu button-->
                            <button type="button" class="relative inline-flex items-center justify-center rounded-md" aria-controls="mobile-menu" aria-expanded="false">
                                <!-- <span class=""></span> -->
                                <span class="sr-only">Open main menu</span>
                                <svg class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" aria-hidden="true" data-slot="icon">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                                </svg>
                                <svg class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" aria-hidden="true" data-slot="icon">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <div class="flex flex-1 items-center justify-center md:items-stretch md:justify-start">
                            <div class="hidden md:ml-6 md:block">
                                <div class="flex space-x-4 hover:text-gray-400 duration-50 ease-in">
                                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                                    <!-- <a href="#" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white" aria-current="page">Dashboard</a>
                                    <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Team</a>
                                    <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Projects</a>
                                    <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Calendar</a> -->
                                    <a class="hover:text-gray-200 duration-200" href="/index.php">Accueil</a>
                                    <a class="hover:text-gray-200 duration-200" href="/index.php#about">À propos</a>
                                    <a class="hover:text-gray-200 duration-200" href="projects.php">Mes projets</a>
                                    <a class="hover:text-gray-200 duration-200" href="#contact">Me contacter</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mobile menu, show/hide based on menu state. -->
                <div class="md:hidden absolute right-0 bg-main rounded-lg mt-2 me-2" id="mobile-menu">
                    <div class="space-y-1 px-2 pt-2 pb-3">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <a class="block rounded-md px-3 py-1 text-base font-medium text-gray-300 hover:outline outline-green-500 hover:text-white" href="/index.php">Accueil</a>
                        <a class="block rounded-md px-3 py-1 text-base font-medium text-gray-300 hover:outline outline-green-500 hover:text-white" href="/index.php#about">À propos</a>
                        <a class="block rounded-md px-3 py-1 text-base font-medium text-gray-300 hover:outline outline-green-500 hover:text-white" href="projects.php">Mes projets</a>
                        <a class="block rounded-md px-3 py-1 text-base font-medium text-gray-300 hover:outline outline-green-500 hover:text-white" href="#contact">Me contacter</a>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <main class="flex-grow">