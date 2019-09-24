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
      <li class="nav__item">
        <form action="https://art.us4.list-manage.com/subscribe/post?u=3e0d4ce886f122a5bd36bb0cf&amp;id=186cccf9d9" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
            <div id="mc_embed_signup_scroll" style="display: flex;">

        <div class="mc-field-group">
        	<label for="mce-EMAIL"></label>
        	<input type="email" placeholder="Sign up for updates" value="" name="EMAIL" class="required email" id="mce-EMAIL">
        </div>
        	<div id="mce-responses" class="clear">
        		<div class="response" id="mce-error-response" style="display:none"></div>
        		<div class="response" id="mce-success-response" style="display:none"></div>
        	</div>
            <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_3e0d4ce886f122a5bd36bb0cf_186cccf9d9" tabindex="-1" value=""></div>
            <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button" style="visibility: hidden; width: 0; height: 0; overflow: hidden;"></div>
            </div>
        </form>
      </li>
    </ul>

    <div class="current-time">
      The current time is <span id="current-time"></span>
    </div>

  </footer>

</body>
</html>
