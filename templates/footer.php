</main>
<footer class="footer text-center py-5 text-sm text-gray-500 font-sans-serif">
    <div class="container m-auto flex justify-between">
        <nav class="flex gap-6">
            <a href="#">Accueil</a>
            <a href="#">À propos</a>
            <a href="#">Projets</a>
            <a href="#">Contact</a>
            <a href="#">Cookies</a>
            <a href="#">Mentions légales</a>
        </nav>
        <p>Lucien Mary - v1998.01.15</p>
    </div>
</footer>
<!-- Scripts en fin de page si nécessaire -->
<?php if (getenv('APP_ENV') !== 'dev'): ?>
    <script type="module" src="/dist/assets.js"></script>
<?php endif; ?>
</body>

</html>