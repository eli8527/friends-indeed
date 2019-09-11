<?php
/**
 * Snippets are a great way to store code snippets for reuse or to keep your templates clean.
 * in loops or simply to keep your templates clean.
 * This footer snippet is reused in all templates. In fetches information from the `site.txt` content file
 * and from the `about` page.
 * More about snippets: https://getkirby.com/docs/guide/templates/snippets
 */
?>

<ul class="works__grid">
  <?php foreach ($works as $work): ?>
    <?php $firstImage = $work->images()->sortBy(function ($image) { return $image->sort(); })->first(); ?>
    <li class="works__item">
      <a href="<?= $firstImage->resize(2000)->url() ?>">
        <div class="works__item__image">
          <?= $firstImage->resize(1024); ?>
        </div>
        <div class="works__item__title">
          <?= $work->display()->kirbytextinline(); ?><?php if ($work->year()->isNotEmpty()): ?>, <?= $work->year() ?><?php endif; ?>
        </div>
        <div class="works__item__meta secondary">
          <?= $work->meta()->kirbytextinline(); ?>
        </div>
      </a>
    </li>
  <?php endforeach; ?>
</ul>
