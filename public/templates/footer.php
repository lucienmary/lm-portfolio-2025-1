</main>
<footer class="footer px-6 xl:px-0 py-5 text-sm text-gray-500 font-sans-serif">
    <div class="container m-auto flex flex-col md:flex-row xl:flex-row justify-between">
        <nav class="flex flex-wrap gap-2 xl:gap-6 sm:justify-center">
            <a href="#">Accueil</a>
            <a class="before:content-['-'] before:me-2" href="#">À propos</a>
            <a class="before:content-['-'] before:me-2" href="#">Projets</a>
            <a class="before:content-['-'] before:me-2" href="#">Contact</a>
            <a class="before:content-['-'] before:me-2" href="#">Cookies</a>
            <a class="before:content-['-'] before:me-2" href="#">Mentions légales</a>
        </nav>
        <p class="mt-6 pt-4 md:mt-0 md:pt-0 text-center border-t md:border-none border-t-gray-800">Lucien Mary - v1998.01.15</p>
    </div>
</footer>
<!-- Scripts en fin de page si nécessaire -->
<?php if (getenv('APP_ENV') !== 'dev'): ?>
    <script type="module" src="/dist/assets.js"></script>
<?php endif; ?>
</body>

</html>