<?php
/**
 * Snippets are a great way to store code snippets for reuse or to keep your templates clean.
 * in loops or simply to keep your templates clean.
 * This footer snippet is reused in all templates. In fetches information from the `site.txt` content file
 * and from the `about` page.
 * More about snippets: https://getkirby.com/docs/guide/templates/snippets
 */
?>

<ul class="installation_images__grid">
  <?php foreach ($iimages as $iimage): ?>
    <li class="">
      <a href="<?= $iimage->resize(2000)->url() ?>">
        <div>
          <?= $iimage->resize(1024); ?>
        </div>
        <div class="secondary">
          <?= $iimage->caption()->kirbytextinline(); ?>
        </div>
      </a>
    </li>
  <?php endforeach; ?>
</ul>
