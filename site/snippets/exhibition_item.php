<li class="exhibition__item max-width">
  <a href="<?= $exhibition->url(); ?>">
    <div class="exhibition__image">
      <?= $exhibition->images()->sortBy('sort', 'asc')->first()->resize(1024); ?>
    </div>
    <div class="exhibition__title">
      <?= $exhibition->title(); ?>
    </div>
    <div class="exhibition__dates secondary">
      <?php snippet('exhibition_dates', ['exhibition' => $exhibition]); ?>
    </div>
  </a>
</div>
