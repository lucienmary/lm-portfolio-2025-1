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
        'desc'        => $meta['desc']         ?? '',
        'content'     => $contentRaw,
    ];
}

include __DIR__ . '/../templates/header.php';
?>

<section class="flex relative">
    <div class="container m-auto my-36 flex flex-col gap-36">
    <?php foreach ($projects as $i => $p): ?>
      <?php 
        $reverse = ($i % 2) === 1 ? 'md:flex-row-reverse' : '';
      ?>
      <div class="flex flex-col md:flex-row <?= $reverse ?> gap-12 items-center justify-center">
        <div class="col-span-3 flex flex-col justify-center">
          <h3 class="text-2xl/12 font-sans-serif font-bold mb-2">
            <?= htmlspecialchars($p['title'], ENT_QUOTES) ?>
          </h3>
          <?php if (!empty($p['desc'])): ?>
            <p class="mb-4"><?= htmlspecialchars($p['desc'], ENT_QUOTES) ?></p>
          <?php endif; ?>
          <a href="/project.php?slug=<?= htmlspecialchars($p['slug'], ENT_QUOTES) ?>"
             class="relative pointer-events-auto py-1 px-6 mt-6 me-auto inline border border-green-500 text-white text-center rounded-md hover:border-green-400 duration-100 font-sans-serif btn-magic">
            Voir le projet
            <svg class="w-[16px] inline fill-white ms-[2px] mt-[-2px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>arrow-right</title><path d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" /></svg>
          </a>
        </div>

        <div class="grid grid-cols-1 gap-24">
          <?php if (!empty($p['image'])): ?>
            <div class="p-[1px] col-span-2 bg-[linear-gradient(to_bottom_left,rgba(255,255,255,1)_1%,rgba(46,151,255,1)_18%,rgba(46,151,255,1)_32%,rgba(255,255,255,1)_50%,rgba(250,0,217,0.88)_68%,rgba(250,0,217,0.88)_82%,rgba(255,255,255,0.75)_100%)] rounded-4xl-1 rounded-[calc(theme('borderRadius.4xl')_+_1px)]">
              <div class="rounded-4xl w-full h-auto object-cover p-3 bg-main">
                <a href="/project.php?slug=<?= htmlspecialchars($p['slug'], ENT_QUOTES) ?>">
                    <img src="<?= htmlspecialchars($p['image'], ENT_QUOTES) ?>"
                        alt="<?= htmlspecialchars($p['title'], ENT_QUOTES) ?>"
                        class="shadow-md shadow-gray-600 rounded-3xl">
                </a>
              </div>
            </div>
          <?php endif; ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
    <div class="absolute top-0 right-0 bottom-0 left-0 -z-10 opacity-3">
        <div class="vertical-line flex justify-around h-full w-full absolute">
            <div class="border-e"></div>
            <div class="border-e"></div>
            <div class="border-e"></div>
            <div class="border-e"></div>
            <div class="border-e"></div>
            <div class="border-e"></div>
        </div>
        <div class="horizontal-line flex flex-col justify-around h-full w-full absolute">
            <div class="border-t"></div>
            <div class="border-t"></div>
            <div class="border-t"></div>
            <div class="border-t"></div>
        </div>
    </div>
</section>

<section id="contact" class="bg-white text-black text-center pt-24 pb-32">
    <div class="container m-auto">
        <h2 class="font-sans-serif font-medium text-6xl/20">Me contacter&nbsp;?</h2>
        <div class="font-sans-serif text-2xl flex gap-6 justify-center mt-18">
            <a href="#" class="border px-4 py-1 rounded-lg border-blue-500 hover:border-blue-400 duration-100 btn-magic">
                <svg class="w-[24px] inline fill-black mt-[-4px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <title>linkedin</title>
                    <path d="M19 3A2 2 0 0 1 21 5V19A2 2 0 0 1 19 21H5A2 2 0 0 1 3 19V5A2 2 0 0 1 5 3H19M18.5 18.5V13.2A3.26 3.26 0 0 0 15.24 9.94C14.39 9.94 13.4 10.46 12.92 11.24V10.13H10.13V18.5H12.92V13.57C12.92 12.8 13.54 12.17 14.31 12.17A1.4 1.4 0 0 1 15.71 13.57V18.5H18.5M6.88 8.56A1.68 1.68 0 0 0 8.56 6.88C8.56 5.95 7.81 5.19 6.88 5.19A1.69 1.69 0 0 0 5.19 6.88C5.19 7.81 5.95 8.56 6.88 8.56M8.27 18.5V10.13H5.5V18.5H8.27Z" />
                </svg>
                par LinkedIn
            </a>
            <a href="#" class="border px-4 py-1 rounded-lg border-red-400 hover:border-red-300 duration-100 btn-magic">
                <svg class="w-[24px] inline fill-black mt-[-4px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <title>email-outline</title>
                    <path d="M22 6C22 4.9 21.1 4 20 4H4C2.9 4 2 4.9 2 6V18C2 19.1 2.9 20 4 20H20C21.1 20 22 19.1 22 18V6M20 6L12 11L4 6H20M20 18H4V8L12 13L20 8V18Z" />
                </svg>
                par Mail
            </a>
        </div>
        <p class="mt-8">ou téléchargez mon <a href="#" class="border px-2 py-0 ms-1 rounded-md inline-flex border-green-500 hover:border-green-400 duration-100 btn-magic">curriculum vitae</a></p>
    </div>
</section>

<?php
include __DIR__ . '/../templates/footer.php';
?>