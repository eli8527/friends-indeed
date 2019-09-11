<?= $exhibition->start_date()->toDate('F d, Y'); ?><?= $exhibition->end_date()->isNotEmpty() ? '–' . $exhibition->start_date()->toDate('F d, Y') : '' ?>
