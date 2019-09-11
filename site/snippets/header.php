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

  <!-- The title tag we show the title of our site and the title of the current page -->
  <title><?= $page->title() ?> | <?= $site->title() ?></title>

  <!-- Stylesheets can be included using the `css()` helper. Kirby also provides the `js()` helper to include script file.
        More Kirby helpers: https://getkirby.com/docs/reference/templates/helpers -->
  <?= css(['assets/css/type.css', 'assets/css/index.css', 'assets/css/works_grid.css', '@auto']) ?>
  <?= js(['assets/js/main.js', '@auto']) ?>

</head>
<body>
  <header id="header" class="header">
    <ul id="navigation" class="nav">
      <li class="nav__item"><a class="nav__item__link" href="<?= $site->url() ?>"><?= $site->title() ?></a></li>
      <?php
      // In the menu, we only fetch listed pages, i.e. the pages that have a prepended number in their foldername
      // We do not want to display links to unlisted `error`, `home`, or `sandbox` pages
      // More about page status: https://getkirby.com/docs/reference/panel/blueprints/page#statuses
      foreach ($site->children()->listed() as $item): ?>
        <li class="nav__item"><a class="nav__item__link" href="<?= $item->url() ?>"><?= $item->title() ?></a></li>
      <?php endforeach ?>
    </nav>
  </header>
