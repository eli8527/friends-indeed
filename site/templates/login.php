<?php snippet('header') ?>

<main>
  <div class="layout-wrapper max-width">
    <div class="text">
      <p><b><?= $page->title()->html() ?></b></p>

      <?php if($error): ?>
      <p class="alert"><?= $page->alert()->html() ?></p>
      <?php endif ?>

      <form method="post" action="<?= $page->url() ?>">
        <!-- <div class="form__item">
          <label class="form__item__label" for="email"><?= $page->username()->html() ?></label>
          <input class="form__item__content" type="email" id="email" name="email" value="<?= esc(get('email')) ?>">
        </div> -->
        <div class="form__item">
          <label class="form__item__label" for="password"><?= $page->password()->html() ?></label>
          <input class="form__item__content" type="password" id="password" name="password" value="<?= esc(get('password')) ?>">
        </div>
        <div class="form__submit">
          <input class="form__submit__button" type="submit" name="login" value="<?= $page->button()->html() ?>">
        </div>
      </form>
    </div>
  </div>
</main>

<?php snippet('footer') ?>
