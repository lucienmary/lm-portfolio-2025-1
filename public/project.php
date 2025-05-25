<?php
require __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Yaml\Yaml;
use League\CommonMark\CommonMarkConverter;

// Récupération du slug et du fichier Markdown
$slug = $_GET['slug'] ?? '';
$path = __DIR__ . "/../content/projects/{$slug}.md";

if (!file_exists($path)) {
  header("HTTP/1.0 404 Not Found");
  exit;
}

// Lecture du fichier et découpage front-matter / contenu
$raw = file_get_contents($path);
preg_match('/^---\s*(.*?)\s*---\s*(.*)$/s', $raw, $m);
$meta = Yaml::parse($m[1]);
$md   = $m[2];

// 1. On sépare en deux au niveau de la ligne <!--STACK-->
[$caseMd, $stackMd] = preg_split('/^<!--STACK-->$/m', $md, 2);

// 2. On instancie le converter
$converter = new CommonMarkConverter([
  'html_input'         => 'escape',
  'allow_unsafe_links' => false,
]);

// 3. On convertit chaque partie en HTML
$caseHtml  = $converter->convert($caseMd);
$stackHtml = $converter->convert($stackMd);

// Affichage
include __DIR__ . '/../templates/header.php';
?>
<section class="min-h-screen flex relative">
  <div class="container m-auto w-full">
    <div class="px-24 relative grid grid-cols-2 gap-24">
      <div class="col-span-1 z-1 flex flex-col justify-center">
        <span class="font-sans-serif text-lg font-extralight text-gray-400 mb-4"><?= $meta['class'] ?></span>
        <h1 class="font-sans-serif text-6xl font-bold mb-10"><?= $meta['title'] ?></h1>
        <p><?= $meta['desc'] ?></p>
      </div>
      <div class="col-span-1">
        <div class="p-[1px] bg-[linear-gradient(to_bottom_left,rgba(255,255,255,1)_1%,rgba(46,151,255,1)_18%,rgba(46,151,255,1)_32%,rgba(255,255,255,1)_50%,rgba(250,0,217,0.88)_68%,rgba(250,0,217,0.88)_82%,rgba(255,255,255,0.75)_100%)] rounded-4xl-1 rounded-[calc(theme('borderRadius.4xl')_+_1px)]">
          <div class="rounded-4xl w-full h-auto object-cover p-3 bg-main">
            <img src="<?= $meta['image'] ?>" alt="<?= $meta['title'] ?>" class="shadow-md shadow-gray-600 rounded-3xl">
          </div>
        </div>
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

<section id="project-desc" class="relative">
  <div class="container m-auto px-24 py-48 font-light grid grid-cols-3 gap-24">
    <div class="col-span-2 text-lg">
      <h2 class="font-sans-serif font-medium text-3xl/20">Étude de cas</h2>
      <div class="markdown-import">
        <?= $caseHtml ?>
      </div>
      <?php if (isset($meta['isOnline']) && $meta['isOnline']): ?>
        <a href="#" target="_blank"
          class="inline-flex font-sans-serif border px-4 py-1 mt-12 rounded-lg border-green-500 hover:border-green-400 duration-100 btn-magic">
          Visiter le projet
          <svg class="w-[18px] inline fill-white ms-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>arrow-right</title><path d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" /></svg>
        </a>
      <?php endif; ?>
    </div>
    <div class="col-span-1 text-lg">
      <h2 class="font-sans-serif font-medium text-3xl/20">Stack</h2>
      <div class="markdown-import">
        <?= $stackHtml ?>
      </div>
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

<section id="contact" class="bg-white text-black text-center pt-24 pb-32">
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