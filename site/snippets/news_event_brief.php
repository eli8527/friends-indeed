<li class="news_event__brief center max-width">
    <a href="<?= $news_event->url(); ?>">
      <div><?= $news_event->title() ?></div>
      <div class="secondary"><?php snippet('news_event_datetime', ['news_event' => $news_event]); ?></div>
      <p></p>
    </a>
    <div class="text">
      <?= $news_event->intro()->kt() ?>
      <p></p>
    </div>
</li>
