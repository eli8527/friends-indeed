<?php
/**
 * Snippets are a great way to store code snippets for reuse or to keep your templates clean.
 * This header snippet is reused in all templates.
 * It fetches information from the `site.txt` content file and contains the site navigation.
 * More about snippets: https://getkirby.com/docs/guide/templates/snippets
 */
?>

<!doctype html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title><?= $page->title() ?> | <?= $site->title() ?></title>

  <?php if ($about = page('about')): ?>
    <link rel="shortcut icon" type="image/png" href="<?= $about->favicon()->toFile()->url(); ?>"/>
  <?php endif; ?>

  <?= css(['assets/css/type.css', 'assets/css/index.css', 'assets/css/grids.css', '@auto']) ?>
  <?= js(['assets/js/main.js', '@auto']) ?>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-147761494-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-147761494-1');
  </script>
</head>
<body>
  <header id="header" class="header">
    <ul id="navigation" class="nav">
      <li class="nav__item"><a class="nav__item__link" href="<?= $site->url() ?>"><?= $site->title() ?></a></li>
      <?php foreach ($site->children()->listed() as $item): ?>
        <li class="nav__item"><a class="nav__item__link" href="<?= $item->url() ?>"><?= $item->title() ?></a></li>
      <?php endforeach ?>
    </nav>
  </header>
