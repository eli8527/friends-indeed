<li class="news_event__brief center max-width">
  <a href="<?= $news_event->url(); ?>">
    <div><?= $news_event->title() ?><br/><span class="secondary"><?php snippet('news_event_datetime', ['news_event' => $news_event]); ?></span></p>
    <div class="text">
      <?= $news_event->intro()->kt() ?>
      <p></p>
    </div>
  </a>
</li>
