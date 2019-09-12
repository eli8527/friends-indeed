<li class="exhibition__brief max-width">
  <a href="<?= $exhibition->url(); ?>">
    <div class="exhibition__brief__image">
      <?= $exhibition->hero_image()->toFile()->resize(1024); ?>
    </div>
    <div class="exhibition__brief__title">
      <?= $exhibition->title(); ?>
    </div>
    <div class="exhibition__brief__dates secondary">
      <?php snippet('exhibition_dates', ['exhibition' => $exhibition]); ?>
    </div>
  </a>
</li>
