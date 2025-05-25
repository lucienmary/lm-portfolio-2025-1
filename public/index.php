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

<section class="min-h-screen flex relative">
    <div class="container m-auto">
        <div class="px-24 relative">
            <div class="relative z-1">
                <h1 class="font-sans-serif">
                    <span class="text-3xl font-extralight text-gray-400">Hello, je suis</span>
                    <span class="font-bold block text-9xl ">Lucien Mary</span>
                    <span class="text-5xl/24 font-normal">Développeur Front end</span>
                    <span class="text-sm border border-gray-400 text-gray-300 pe-3 py-[2px] mt-9 ms-3 inline-block rounded-lg align-top"><span class="wing"></span> Disponible</span>
                </h1>
                <div class="font-sans-serif font-light text-2xl pt-18 flex gap-6">
                    <a href="https://www.linkedin.com/in/lucien-mary-437598177/" target="_blank" class="border px-4 py-1 rounded-lg border-blue-500 hover:border-blue-400 duration-100 btn-magic">
                        <svg class="w-[24px] inline fill-white mt-[-4px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <title>linkedin</title>
                            <path d="M19 3A2 2 0 0 1 21 5V19A2 2 0 0 1 19 21H5A2 2 0 0 1 3 19V5A2 2 0 0 1 5 3H19M18.5 18.5V13.2A3.26 3.26 0 0 0 15.24 9.94C14.39 9.94 13.4 10.46 12.92 11.24V10.13H10.13V18.5H12.92V13.57C12.92 12.8 13.54 12.17 14.31 12.17A1.4 1.4 0 0 1 15.71 13.57V18.5H18.5M6.88 8.56A1.68 1.68 0 0 0 8.56 6.88C8.56 5.95 7.81 5.19 6.88 5.19A1.69 1.69 0 0 0 5.19 6.88C5.19 7.81 5.95 8.56 6.88 8.56M8.27 18.5V10.13H5.5V18.5H8.27Z" />
                        </svg>
                        LinkedIn
                    </a>
                    <a href="mailto:hello@lucienmary.be" target="_blank" class="border px-4 py-1 rounded-lg border-red-400 hover:border-red-300 duration-100 btn-magic">
                        <svg class="w-[24px] inline fill-white mt-[-4px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <title>email-outline</title>
                            <path d="M22 6C22 4.9 21.1 4 20 4H4C2.9 4 2 4.9 2 6V18C2 19.1 2.9 20 4 20H20C21.1 20 22 19.1 22 18V6M20 6L12 11L4 6H20M20 18H4V8L12 13L20 8V18Z" />
                        </svg>
                        Mail
                    </a>
                    <a href="../content/CV-lucien-mary-032025.pdf" target="_blank" class="border px-4 py-1 rounded-lg border-green-500 hover:border-green-400 duration-100 btn-magic">
                        <svg class="w-[24px] inline fill-white mt-[-4px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <title>list-box-outline</title>
                            <path d="M11 15H17V17H11V15M9 7H7V9H9V7M11 13H17V11H11V13M11 9H17V7H11V9M9 11H7V13H9V11M21 5V19C21 20.1 20.1 21 19 21H5C3.9 21 3 20.1 3 19V5C3 3.9 3.9 3 5 3H19C20.1 3 21 3.9 21 5M19 5H5V19H19V5M9 15H7V17H9V15Z" />
                        </svg>
                        Curriculum vitae
                    </a>
                </div>
            </div>
            <div class="absolute top-1/2 left-1/2 -translate-y-1/2 ps-10 z-0">
                <!-- <img src="../content/img/bg-lm-hero.svg" alt="Photo de Lucien Mary"> -->
                 <img width="600" class="opacity-95" src="../content/img/lucien-mary-developpeur-frontend-designer.png" alt="Lucien Mary, développeur front end">
                <!-- <svg width="33.33vw" viewBox="0 0 469 521" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g>
                        <path d="M8.69819 242.046C-20.8321 420.587 114.691 495.536 186.144 510.693C245.1 523.354 398.53 519.191 446.439 383.282C494.348 247.374 439.133 86.5092 360.524 26.8938C281.915 -32.7216 45.6111 18.8704 8.69819 242.046Z" class="fill-main-path opacity-70" />
                    </g>
                </svg> -->
            </div>
        </div>
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

    <div class="shape-pink-1 bg-fuchsia-800 w-60 h-100 rounded-full blur-[120px] absolute top-5 -right-60 -z-10"></div>
    <div class="shape-blue-1 bg-sky-800 w-100 h-70 rounded-full blur-[120px] absolute -top-50 -right-15 rotate-30 -z-10"></div>
    <div class="shape-white-1 bg-white w-20 h-20 rounded-full blur-[120px] absolute top-10 -right-10 -z-10"></div>

    <div class="shape-pink-2 bg-fuchsia-800 w-100 h-70 rounded-full blur-[120px] absolute -bottom-50 -left-45 rotate-60 -z-10"></div>
    <div class="shape-blue-2 bg-sky-800 w-60 h-100 rounded-full blur-[120px] absolute bottom-5 -left-60 rotate-30 -z-10"></div>
    <div class="shape-white-2 bg-white w-20 h-20 rounded-full blur-[120px] absolute bottom-10 -left-10 -z-10"></div>
</section>

<section id="about" class="relative">
    <div class="container m-auto px-24 py-48 font-light grid grid-cols-3 gap-24">
        <div class="col-span-2 text-lg">
            <h2 class="font-sans-serif font-medium text-3xl/20">Qui suis-je&nbsp;?</h2>
            <p class="pb-2">Passionné par le design et le développement frontend, je donne vie à des interfaces élégantes et intuitives pour PME et sites e-commerce.</p>
            <p class="pb-2">Mon objectif&nbsp;?Offrir des expériences utilisateur qui séduisent, tout en garantissant des performances au top sur tous les supports.</p>
            <p>À 27 ans, je jongle avec le code le jour et troque mon clavier contre un sécateur ou un marteau le soir. Parce que créer, c’est dans mon ADN, en ligne comme dans la vraie vie.</p>
        </div>
        <div class="col-span-1">
            <h2 class="font-sans-serif font-medium text-3xl/20">Stack</h2>
            <ul class="list-disc">
                <li class="pb-2"><b>Langages&nbsp;:</b> HTML5, CSS3 (SCSS), JavaScript (ES6+, TypeScript), Smarty</li>
                <li class="pb-2"><b>Frameworks & librairies&nbsp;:</b> Angular, Bootstrap, Tailwind CSS, REST, PWA, Vite</li>
                <li class="pb-2"><b>Outils de développement & analyse&nbsp;:</b> VS Code, Git, GitLab, Google Analytics 4, Lighthouse</li>
                <li class="pb-2"><b>CMS & e-commerce&nbsp;:</b> WordPress, PrestaShop (intégration front-end, développement de modules)</li>
                <li><b>Design & prototypage&nbsp;:</b> Photoshop, Illustrator, Adobe XD, Figma</li>
                <!-- <li>Collaboration : Asana, Monday</li> -->
                <!-- <li>Marketing automation : Sarbacane, Brevo (gestion de campagnes, création de workflows automatisés)</li> -->
            </ul>
        </div>
    </div>

    <div class="absolute top-5 right-0 left-0 h-5 -z-10 opacity-5">
        <div class="vertical-line flex justify-around h-full w-full absolute">
            <div class="border-e"></div>
            <div class="border-e"></div>
            <div class="border-e"></div>
            <div class="border-e"></div>
            <div class="border-e"></div>
            <div class="border-e"></div>
        </div>
    </div>
</section>

<section class="h-[90vh] bg-white text-black py-24 relative">
    <div class="container m-auto">
        <h2 class="font-sans-serif font-medium text-3xl/20 mb-6">Portfolio</h2>

        <div class="follow-cursor-wrapper relative">
            <div class="swiper h-full relative">
                <div class="swiper-wrapper h-full z-1">
                    <?php foreach ($projects as $p): ?>
                        <div class="swiper-slide flex items-center justify-center h-full">
                            <div class="grid grid-cols-3 gap-24 w-full">
                                <?php if (!empty($p['image'])): ?>
                                    <div class="p-[1px] col-span-2 bg-[linear-gradient(to_bottom_left,rgba(17,17,18,1)_1%,rgba(46,151,255,1)_18%,rgba(46,151,255,1)_32%,rgba(17,17,18,1)_50%,rgba(250,0,217,0.88)_68%,rgba(250,0,217,0.88)_82%,rgba(17,17,18,0.75)_100%)] rounded-4xl-1 rounded-[calc(theme('borderRadius.4xl')_+_1px)]">
                                        <div class="rounded-4xl w-full h-auto object-cover p-4 bg-white">
                                            <img src="<?= htmlspecialchars($p['image'], ENT_QUOTES) ?>"
                                                alt="<?= htmlspecialchars($p['title'], ENT_QUOTES) ?>"
                                                class="shadow-md rounded-3xl">
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="col-span-1 flex flex-col justify-center">
                                    <h3 class="text-2xl/12 font-sans-serif font-bold mb-2">
                                        <?= htmlspecialchars($p['title'], ENT_QUOTES) ?>
                                    </h3>
                                    <?php if (!empty($p['desc'])): ?>
                                        <p class="mb-4"><?= htmlspecialchars($p['desc'], ENT_QUOTES) ?></p>
                                    <?php endif; ?>
                                    <a href="/project.php?slug=<?= htmlspecialchars($p['slug'], ENT_QUOTES) ?>"
                                        class="relative z-50 pointer-events-auto p-2 mt-6 inline-block bg-green-500 text-white text-center rounded-md">
                                        Voir le projet
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="swiper-button-prev-nostyle absolute top-0 left-0 bottom-0 w-1/2 z-10 cursor-pointer flex items-center justify-start"></div>
                <div class="swiper-button-next-nostyle absolute top-0 right-0 bottom-0 w-1/2 z-10 cursor-pointer flex items-center justify-end"></div>
            </div>
            <div
                class="follow-cursor absolute top-0 left-0 pointer-events-none
         z-10 opacity-0
         w-[36px] h-[36px] bg-gray-950 text-white rounded-full
         flex items-center justify-center text-center
        transition-opacity duration-200 will-change-transform
         translate-x-[var(--fc-x)] translate-y-[var(--fc-y)]
         rotate-[var(--fc-r)]"
                style="--fc-x:0px; --fc-y:0px; --fc-r:0deg;">
                <svg class="fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <title>chevron-right</title>
                    <path d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z" />
                </svg>
            </div>
        </div>
    </div>
</section>

<section id="contact" class="bg-white text-black text-center pt-12 pb-48">
    <div class="container m-auto">
        <h2 class="font-sans-serif font-medium text-6xl/20">Me contacter&nbsp;?</h2>
        <div class="font-sans-serif text-2xl flex gap-6 justify-center mt-18">
            <a href="https://www.linkedin.com/in/lucien-mary-437598177/" target="_blank" class="border px-4 py-1 rounded-lg border-blue-500 hover:border-blue-400 duration-100 btn-magic">
                <svg class="w-[24px] inline fill-black mt-[-4px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <title>linkedin</title>
                    <path d="M19 3A2 2 0 0 1 21 5V19A2 2 0 0 1 19 21H5A2 2 0 0 1 3 19V5A2 2 0 0 1 5 3H19M18.5 18.5V13.2A3.26 3.26 0 0 0 15.24 9.94C14.39 9.94 13.4 10.46 12.92 11.24V10.13H10.13V18.5H12.92V13.57C12.92 12.8 13.54 12.17 14.31 12.17A1.4 1.4 0 0 1 15.71 13.57V18.5H18.5M6.88 8.56A1.68 1.68 0 0 0 8.56 6.88C8.56 5.95 7.81 5.19 6.88 5.19A1.69 1.69 0 0 0 5.19 6.88C5.19 7.81 5.95 8.56 6.88 8.56M8.27 18.5V10.13H5.5V18.5H8.27Z" />
                </svg>
                par LinkedIn
            </a>
            <a href="mailto:hello@lucienmary.be" target="_blank" class="border px-4 py-1 rounded-lg border-red-400 hover:border-red-300 duration-100 btn-magic">
                <svg class="w-[24px] inline fill-black mt-[-4px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <title>email-outline</title>
                    <path d="M22 6C22 4.9 21.1 4 20 4H4C2.9 4 2 4.9 2 6V18C2 19.1 2.9 20 4 20H20C21.1 20 22 19.1 22 18V6M20 6L12 11L4 6H20M20 18H4V8L12 13L20 8V18Z" />
                </svg>
                par Mail
            </a>
        </div>
        <p class="mt-8">ou téléchargez mon <a href="../content/CV-lucien-mary-032025.pdf" target="_blank" class="border px-2 py-0 ms-1 rounded-md inline-flex border-green-500 hover:border-green-400 duration-100 btn-magic">curriculum vitae</a></p>
    </div>
</section>

<?php
include __DIR__ . '/../templates/footer.php';
?>