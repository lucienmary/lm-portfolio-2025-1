</main>
<footer class="footer text-center py-6 text-sm text-gray-500">
    <nav>
        <a href="#">Accueil</a>
        <a href="#">À propos</a>
        <a href="#">Projets</a>
        <a href="#">Contact</a>
        <a href="#">Cookies</a>
        <a href="#">Mentions légales</a>
    </nav>
    <p>Lucien Mary - v1998.01.15</p>
</footer>
<!-- Scripts en fin de page si nécessaire -->
<?php if (getenv('APP_ENV') !== 'dev'): ?>
    <script type="module" src="/dist/assets.js"></script>
<?php endif; ?>
</body>

</html>