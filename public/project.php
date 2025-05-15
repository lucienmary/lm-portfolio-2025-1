<?php
require __DIR__ . '/../vendor/autoload.php';
use Symfony\Component\Yaml\Yaml;
use League\CommonMark\CommonMarkConverter;

$slug = $_GET['slug'] ?? '';
$path = __DIR__ . "/../content/projects/{$slug}.md";
if (!file_exists($path)) { header("HTTP/1.0 404 Not Found"); exit; }

$raw = file_get_contents($path);
preg_match('/^---\s*(.*?)\s*---\s*(.*)$/s', $raw, $m);
$meta = Yaml::parse($m[1]);
$md   = $m[2];

$converter = new CommonMarkConverter(['html_input'=>'escape','allow_unsafe_links'=>false]);
$content   = $converter->convertToHtml($md);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
  <title><?= htmlspecialchars($meta['title']) ?></title>
  <!-- même inclusion Vite / dist que index.php -->
</head>
<body class="prose prose-lg mx-auto py-12">
  <h1 class="text-3xl font-bold mb-4"><?= htmlspecialchars($meta['title']) ?></h1>
  <?php if(!empty($meta['image'])): ?>
    <img src="<?= htmlspecialchars($meta['image']) ?>" class="rounded-lg mb-6" alt="">
  <?php endif; ?>
  <?= $content ?>
  <?php if(!empty($meta['url'])): ?>
    <p class="mt-6"><a href="<?= htmlspecialchars($meta['url']) ?>" class="btn" target="_blank">Voir le projet →</a></p>
  <?php endif; ?>
</body>
</html>
