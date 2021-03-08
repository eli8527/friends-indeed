<?php
/**
 * Templates render the content of your pages.
 * They contain the markup together with some control structures like loops or if-statements.
 * The `$page` variable always refers to the currently active page.
 * To fetch the content from each field we call the field name as a method on the `$page` object, e.g. `$page->title()`.
 * This home template renders content from others pages, the children of the `photography` page to display a nice gallery grid.
 * Snippets like the header and footer contain markup used in multiple templates. They also help to keep templates clean.
 * More about templates: https://getkirby.com/docs/guide/templates/basics
 */
?>

<?php snippet('header') ?>

<main>
  <div class="layout-wrapper">
    <ul class="home__list">
      <?php foreach($page->content()->content()->toStructure() as $contentBlock): ?>
        <?php if ($contentBlock->type() == "message"): ?>
          <li class="center text max-width" style="text-align: center;">
            <?= $contentBlock->message()->kt(); ?>
          </li>
        <?php elseif ($contentBlock->type() == "email"): ?>
          <li class="center text max-width">
            <?= $contentBlock->email()->kt(); ?>
            <?php snippet('email-signup') ?>
          </li>
        <?php elseif($contentBlock->type() == "news_event"): ?>
          <?php snippet('news_event_brief', ['news_event' => $contentBlock->news_event()->toPage()]); ?>
        <?php elseif($contentBlock->type() == "exhibition"): ?>
          <?php snippet('exhibition_brief', ['exhibition' => $contentBlock->exhibition()->toPage()]); ?>
        <?php endif; ?>
      <?php endforeach; ?>
    </ul>
  </div>
</main>

<?php snippet('footer') ?>
