<?php
/**
 * Snippets are a great way to store code snippets for reuse or to keep your templates clean.
 * in loops or simply to keep your templates clean.
 * This footer snippet is reused in all templates. In fetches information from the `site.txt` content file
 * and from the `about` page.
 * More about snippets: https://getkirby.com/docs/guide/templates/snippets
 */
?>

  <footer class="footer layout-wrapper">
    <ul>
      <li class="nav__item">&copy; <?= date('Y') ?> <?= $site->title() ?></li>
      <?php if ($about = page('about')): ?>
        <?php foreach ($about->social()->toStructure() as $social): ?>
          <li class="nav__item"><a class="nav__item__link" href="<?= $social->url() ?>"><?= $social->platform() ?></a></li>
        <?php endforeach ?>
      <?php endif; ?>
    </ul>

    <div class="current-time">
      The current time is <span id="current-time"></span>
    </div>

  </footer>

</body>
</html>
