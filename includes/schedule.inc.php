<?php
include_once "dbh.inc.php";

$event_date = $_POST['event_date'];
$event_title = $_POST['event_title'];
$event_theme = $_POST['event_theme'];

$stmt = $pdo->prepare('SELECT COUNT(*) FROM event_calendar WHERE event_title = :event_title AND event_date = :event_date');
$stmt->execute(['event_title' => $event_title, 'event_date' => $event_date]);
$count = $stmt->fetchColumn();

if ($count > 0) {
    echo 'Event already exists.';
} else {
    $stmt = $pdo->prepare('INSERT INTO event_calendar (event_date, event_title, event_theme) VALUES (:event_date, :event_title, :event_theme)');
    if ($stmt->execute(['event_date' => $event_date, 'event_title' => $event_title, 'event_theme' => $event_theme])) {
        // echo 'Event successfully added.';
    } else {
        echo 'Error adding event.';
    }
}