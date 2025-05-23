<?php
require __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Yaml\Yaml;
use League\CommonMark\CommonMarkConverter;

$slug = $_GET['slug'] ?? '';
$path = __DIR__ . "/../content/projects/{$slug}.md";
if (!file_exists($path)) {
  header("HTTP/1.0 404 Not Found");
  exit;
}

$raw = file_get_contents($path);
preg_match('/^---\s*(.*?)\s*---\s*(.*)$/s', $raw, $m);
$meta = Yaml::parse($m[1]);
$md   = $m[2];

$converter = new CommonMarkConverter(['html_input' => 'escape', 'allow_unsafe_links' => false]);
$content   = $converter->convert($md);

include __DIR__ . '/../templates/header.php';
?>
<section class="min-h-screen flex relative">
  <div class="container m-auto w-full">
    <div class="px-24 relative grid grid-cols-2 gap-24">
      <div class="col-span-1 z-1 flex flex-col justify-center">
        <span class="font-sans-serif text-lg font-extralight text-gray-400"><?= $meta['class'] ?></span>
        <h1 class="font-sans-serif text-6xl leading-24 font-bold"><?= $meta['title'] ?></h1>
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
      <div>
        <?= $content ?>
      </div>
      <?php if (isset($meta['isOnline']) && $meta['isOnline']): ?>
        <a href="#" target="_blank"
          class="inline-flex font-sans-serif border px-4 py-1 mt-12 rounded-lg border-green-500 hover:border-green-400 duration-100 btn-magic">
          Visiter le projet
          <svg class="w-[18px] inline fill-white ms-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>arrow-right</title><path d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" /></svg>
        </a>
      <?php endif; ?>
    </div>
    <div class="col-span-1">
      <h2 class="font-sans-serif font-medium text-3xl/20">Stack</h2>
      <ul class="list-disc">
        <li class="pb-2"><b>Langages&nbsp;:</b> HTML5, CSS3 (SCSS), JavaScript (ES6+, TypeScript), Smarty</li>
        <li class="pb-2"><b>Frameworks & librairies&nbsp;:</b> Angular, Bootstrap, Tailwind CSS, REST, PWA, Vite</li>
        <li class="pb-2"><b>Outils de développement & analyse&nbsp;:</b> VS Code, Git, GitLab, Google Analytics 4, Lighthouse</li>
        <li class="pb-2"><b>CMS & e-commerce&nbsp;:</b> WordPress, PrestaShop (intégration front-end, développement de modules)</li>
        <li><b>Design & prototypage&nbsp;:</b> Photoshop, Illustrator, Adobe XD, Figma</li>
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

<?php
include __DIR__ . '/../templates/footer.php';
?>