<?= $exhibition->start_date()->toDate('m/d/Y'); ?>–<?= $exhibition->end_date()->isNotEmpty() ? $exhibition->start_date()->toDate('m/d/Y') : '' ?>
