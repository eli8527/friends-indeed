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
      <?php if ($page->works()->length() > 0 || $page->installation_images()->length() > 0): ?>
        <div class="flex__main">
          <?php if ($page->works()->length() > 0): ?>
            <p>Works</p>
            <?php snippet('works_grid', ['works' => $page->works()->sortBy('sort', 'asc')->toPages(), 'showArtistName' => true]); ?>
            <br/><br/>
          <?php endif; ?>
          <?php if ($page->installation_images()->length() > 0): ?>
            <p>Installation Images</p>
            <?php snippet('installation_images_grid', ['iimages' => $page->installation_images()->sortBy('sort', 'asc')->toFiles()]); ?>
          <?php endif; ?>
        </div>
      <?php endif; ?>

      <div class="flex__sidebar">

          <div><?=$page->title() ?></div>
          <div class="secondary">
            <?php snippet('exhibition_dates', ['exhibition' => $page]); ?>
          </div>
        <p></p>
        <div class="text">
          <?= $page->text()->kt() ?>
        </div>
        <?php if($page->links()->length() > 0 || $page->files()->count() > 0): ?>
          <ul>
            <?php foreach ($page->links()->toStructure() as $link): ?>
              <li><a href="<?=$link->url()?>"><?= $link->title() ?></a></li>
            <?php endforeach ?>
            <?php foreach($page->files()->sortBy('sort', 'asc') as $file): ?>
              <li><a href="<?=$file->url()?>"><?= $file->title() ?></a></li>
            <?php endforeach; ?>
          </ul>
          <p></p>
        <?php endif;?>
        <?php if($page->events()->length() > 0): ?>
            <ul>
              <li>Events</li>
              <?php
                $eventsStrs = $page->events()->split();
                $events = new Pages();
                foreach($eventsStrs as $eventsStr) {
                  $events->add($site->find($eventsStr));
                }
                $events = $events->sortBy('start_datetime', 'asc');
              ?>
              <?php foreach($events as $event): ?>
                <li><a href="<?= $event->url() ?>"><div><?= $event->title() ?></div><div class="secondary"><?php snippet('news_event_datetime', ['news_event' => $event]); ?></div></a></li>
              <?php endforeach; ?>
            </ul>
            <p></p>
        <?php endif;?>
        <?php if($page->artists()->length() > 0): ?>
            <ul>
              <li>Artists</li>
              <?php
                $artistsStr = $page->artists()->split();
                $artists = new Pages();
                foreach($artistsStr as $artistStr) {
                  $artists->add($site->find($artistStr));
                }
                $artists = $artists->sortBy(function ($artist) {
                  $artistExp = explode(" ", $artist->title());
                  return end($artistExp);
                });
              ?>
              <?php foreach($artists as $artist): ?>
                <li><a href="<?= $artist->url() ?>"><?= $artist->title() ?></a></li>
              <?php endforeach; ?>
            </ul>
            <p></p>
        <?php endif;?>

      </div>
    </div>
  </div>
</main>

<?php snippet('footer') ?>
