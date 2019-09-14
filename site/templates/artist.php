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
    <div class="layout-flex">
      <?php if ($page->works()->length() > 0): ?>
        <div class="flex__main">
          <p>Works</p>
          <?php snippet('works_grid', ['works' => $page->works()->sortBy('sort', 'asc')->toPages()]); ?>
        </div>
      <?php endif; ?>

      <div class="flex__sidebar">
        <p><?=$page->title() ?></p>
        <div class="text">
          <?= $page->text()->kt() ?>
        </div>
        <?php if($page->links()->length() > 0 || $page->files()->length() > 0): ?>
          <ul>
            <?php foreach ($page->links()->toStructure() as $link): ?>
              <li><a href="<?=$link->url()?>"><?= $link->title() ?></a></li>
            <?php endforeach; ?>
            <?php foreach($page->files()->sortBy('sort', 'asc') as $file): ?>
              <li><a href="<?=$file->url()?>"><?= $file->title() ?></a></li>
            <?php endforeach; ?>
          </ul>
          <p></p>
        <?php endif;?>
      </div>
    </div>
  </div>
</main>

<?php snippet('footer') ?>
