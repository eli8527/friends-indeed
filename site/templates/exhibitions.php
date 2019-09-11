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
<?php
  $possibleYears = [];
  foreach($page->children()->listed() as $child) {
    $y = $child->start_date()->toDate("Y");
    if (!in_array($y, $possibleYears)) {
      $possibleYears []= $y;
    }
  }
  rsort($possibleYears);

  $yearExhibitions = $page->children()->listed()->filter(function($child) {
    $year = date("Y");
    if (isset($_GET['year'])) {
      $year = intval($_GET['year']);
    }

    $y = $child->start_date()->toDate("Y");
    return ($year == $y);
  });

  $currentExhibitions = $yearExhibitions->filter(function($child) {
    return ($child->start_date()->toDate() <= time() && time() <= $child->end_date()->toDate());
  })->sortBy('start_date', 'desc');

  $upcomingExhibitions = $yearExhibitions->filter(function($child) {
    return ($child->start_date()->toDate() > time());
  })->sortBy('start_date', 'desc');

  $pastExhibitions = $yearExhibitions->filter(function($child) {
    return (time() > $child->end_date()->toDate());
  })->sortBy('start_date', 'desc');

?>

<main>
  <div class="layout-wrapper">
    <ul class="exhibitions__date-range secondary">
      <?php foreach($possibleYears as $possibleYear): ?>
        <li class="exhibitions__date-range__option"><a href="?year=<?= $possibleYear; ?>"><?= $possibleYear; ?></a></li>
      <?php endforeach; ?>
    </ul>
    <br/>

    <?php if ($currentExhibitions->count() > 0): ?>
      <p>Current</p>
      <ul class="exhibitions__list">
        <?php foreach($currentExhibitions as $exhibition): ?>
          <?php snippet('exhibition_item', ['exhibition' => $exhibition]); ?>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
    <?php if ($upcomingExhibitions->count() > 0): ?>
      <p>Upcoming</p>
      <ul class="exhibitions__list">
        <?php foreach($upcomingExhibitions as $exhibition): ?>
          <?php snippet('exhibition_item', ['exhibition' => $exhibition]); ?>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
    <?php if ($pastExhibitions->count() > 0): ?>
      <p>Past</p>
      <ul class="exhibitions__list">
        <?php foreach($pastExhibitions as $exhibition): ?>
          <?php snippet('exhibition_item', ['exhibition' => $exhibition]); ?>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
  </div>
</main>

<?php snippet('footer') ?>
