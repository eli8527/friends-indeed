<?php
  echo $news_event->start_datetime()->toDate('F d, Y h:i A');
  if ($news_event->end_datetime()->isNotEmpty()) {
    echo ' - ';
    if ($news_event->start_datetime()->toDate('Ymd') == $news_event->end_datetime()->toDate('Ymd')) {
      echo $news_event->end_datetime()->toDate('h:i A');
    } else {
      echo $news_event->end_datetime()->toDate('F d, Y h:i A');
    }
  }
?>
