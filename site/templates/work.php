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
<?php $work_images = $page->images()->sortBy('sort', 'asc'); ?>
<main>
  <div class="layout-wrapper">
    <div class="layout-flex">
      <div class="flex__main">
        <ul class="two-up__images__grid">
          <?php foreach($work_images as $work_image): ?>
            <li>
              <a href="<?= $work_image->resize(2000)->url(); ?>">
                <?= $work_image->resize(768); ?>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
      <div class="flex__sidebar">
        <div class="works__item__artist">
          <?php
            $artistsStrs = $page->artists()->split();
            $artists = new Pages();
            foreach($artistsStrs as $artistStr) {
              $artists->add($site->find($artistStr));
            }
            $artists = $artists->sortBy(function ($artist) {
              $artistExp = explode(" ", $artist->title());
              return end($artistExp);
            });
            $artist_names = [];
            foreach($artists as $artist) {
              $artist_names []= '<a href="' . $artist->url() . '">' . $artist->title() . '</a>';
            }
            echo join(', ', $artist_names);
          ?>
        </div>
        <div class="works__item__title">
          <?= $page->display()->kirbytextinline(); ?><?php if ($page->year()->isNotEmpty()): ?>, <?= $page->year() ?><?php endif; ?>
        </div>
        <div class="works__item__meta secondary">
          <?= $page->meta()->kirbytextinline(); ?>
        </div>
    </div>
  </div>
</main>

<?php snippet('footer') ?>
