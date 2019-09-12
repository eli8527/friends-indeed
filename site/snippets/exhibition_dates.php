<?= $exhibition->start_date()->toDate('F d, Y'); ?><?= $exhibition->end_date()->isNotEmpty() ? '–' . $exhibition->end_date()->toDate('F d, Y') : '' ?>
