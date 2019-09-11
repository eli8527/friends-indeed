<?php
/**
 * Templates render the content of your pages.
 * They contain the markup together with some control structures like loops or if-statements.
 * The `$page` variable always refers to the currently active page.
 * To fetch the content from each field we call the field name as a method on the `$page` object, e.g. `$page->title()`. *
 * This default template must not be removed. It is used whenever Kirby cannot find a template with the name of the content file.
 * Snippets like the header, footer and intro contain markup used in multiple templates. They also help to keep templates clean.
 * More about templates: https://getkirby.com/docs/guide/templates/basics
 */
?>
<?php snippet('header') ?>

<main>
  <div class="layout-wrapper">
    <ul>
      <?php
        $artists = $page->children()->listed()->sortBy(function ($artist) {
          $artistExp = explode(" ", $artist->title());
          return end($artistExp);
        });
      ?>
      <?php foreach ($artists as $artist): ?>
        <li>
          <a href="<?= $artist->url() ?>"><?= $artist->title() ?></a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</main>

<?php snippet('footer') ?>
