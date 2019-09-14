<?php
/**
 * Snippets are a great way to store code snippets for reuse or to keep your templates clean.
 * in loops or simply to keep your templates clean.
 * This footer snippet is reused in all templates. In fetches information from the `site.txt` content file
 * and from the `about` page.
 * More about snippets: https://getkirby.com/docs/guide/templates/snippets
 */
?>

<ul class="three-up__images__grid">
  <?php foreach ($works as $work): ?>
    <?php $firstImage = $work->images()->sortBy(function ($image) { return $image->sort(); })->first(); ?>
    <li class="works__item">
      <a href="<?= $work->url(); ?>">
        <div class="works__item__image">
          <?= $firstImage->resize(1024); ?>
        </div>
        <?php if ($showArtistName): ?>
          <div class="works__item__artist">
            <?php
              $artistsStrs = $work->artists()->split();
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
                $artist_names []= $artist->title();
              }
              echo join(', ', $artist_names);
            ?>
          </div>
        <?php endif; ?>
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
