<?php
require __DIR__ . '/../vendor/autoload.php';
use Symfony\Component\Yaml\Yaml;

// Charge tous les fichiers Markdown de content/projects/
$dir = __DIR__ . '/../content/projects/';
$projects = [];

foreach (glob($dir . '*.md') as $file) {
    $raw = file_get_contents($file);
    $metaRaw = null;
    $contentRaw = $raw;

    // Sépare front-matter YAML et contenu Markdown
    if (preg_match('/^---\s*(.*?)\s*---\s*(.*)$/s', $raw, $matches)) {
        $metaRaw = $matches[1];
        $contentRaw = $matches[2];
    }

    // Parse les métadonnées YAML si présentes
    $meta = [];
    if ($metaRaw !== null) {
        try {
            $meta = Yaml::parse($metaRaw);
        } catch (\Throwable $e) {
            // En cas d'erreur de parsing, ignore et utilise un fallback
            $meta = [];
        }
    }

    // Construit le tableau projet avec valeurs par défaut
    $slugDefault = pathinfo($file, PATHINFO_FILENAME);
    $projects[] = [
        'slug'        => $meta['slug']        ?? $slugDefault,
        'title'       => $meta['title']       ?? $slugDefault,
        'description' => $meta['description'] ?? '',
        'image'       => $meta['image']       ?? '',
        'url'         => $meta['url']         ?? '',
        'content'     => $contentRaw,
    ];
}

include __DIR__ . '/../templates/header.php';
?>

<section>
    <div class="container m-auto">
        <div class="flex">
            <div class="">
                <h1 class="font-sans-serif">
                    <span>Hello, je suis</span>
                    <span class="font-bold block">Lucien Mary</span>
                    <span>Développeur Front end</span>
                    <span class="border px-3 rounded-full">Disponible</span>
                </h1>
                <div class="font-sans-serif">
                    <a href="#">LinkedIn</a>
                    <a href="#">Mail</a>
                    <a href="#">Curriculum vitae</a>
                </div>
            </div>
            <div>
                <img src="#" alt="Photo de Lucien Mary">
            </div>
        </div>
    </div>
</section>

<section>
    <div>
        <h2 class="font-sans-serif">Qui suis-je&nbsp;?</h2>
        <p>Passionné par le design et le développement frontend, je donne vie à des interfaces élégantes et intuitives pour PME et sites e-commerce.</p>
        <p>Mon objectif&nbsp;?Offrir des expériences utilisateur qui séduisent, tout en garantissant des performances au top sur tous les supports.</p>
        <p>À 27 ans, je jongle avec le code le jour et troque mon clavier contre un sécateur ou un marteau le soir. Parce que créer, c’est dans mon ADN, en ligne comme dans la vraie vie.</p>
    </div>
    <div>
        <h2 class="font-sans-serif">Stack</h2>
        <ul>
            <li>CSS/SCSS - Bootstrap 5, TailwindCSS</li>
            <li>JavaScript/TypeScript - Angular, jQuery, GSAP</li>
            <li>PrestaShop, Wordpress</li>
            <li>Git, Asana, Monday</li>
            <li>Git, Asana, Monday</li>
            <li>Git, Asana, Monday</li>
        </ul>
    </div>
</section>

<section class="splide bg-white text-black text-center py-24">
    <div class="container m-auto">
        <h2 class="font-sans-serif font-bold">Portfolio</h2>
        <div class="splide__track">
          <ul class="splide__list">
            <?php foreach ($projects as $p): ?>
            <li class="splide__slide">
              <?php if (!empty($p['image'])): ?>
                  <img src="<?= htmlspecialchars($p['image'], ENT_QUOTES) ?>" alt="<?= htmlspecialchars($p['title'], ENT_QUOTES) ?>" class="rounded-lg mb-2">
              <?php endif; ?>
              <h3 class="text-2xl font-sans-serif font-bold"><?= htmlspecialchars($p['title'], ENT_QUOTES) ?></h3>
              <p>Passionné par le design et le développement frontend, je donne vie à des interfaces élégantes et intuitives pour PME et sites e-commerce.</p>
              <a href="/project.php?slug=<?= htmlspecialchars($p['slug'], ENT_QUOTES) ?>" class="block">
                  Voir le projet
              </a>
            </li>
            <?php endforeach; ?>
          </ul>
        </div>
    </div>
</section>

<section class="bg-white text-black">
    <div class="container m-auto">
        <h2>Me contacter&nbsp;?</h2>
        <div>
            <a href="#">par LinkedIn</a>
            <a href="#">par Mail</a>
        </div>
        <p>ou téléchargez mon <a href="#">curriculum vitae</a></p>
    </div>
</section>

<?php
include __DIR__ . '/../templates/footer.php';
?>