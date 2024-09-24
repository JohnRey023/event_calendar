<?php
include_once "dbh.inc.php";

$update_event_date = $_POST['update_event_date'];
$update_event_title = $_POST['update_event_title'];
$update_event_theme = $_POST['update_event_theme'];
$update_new_title = $_POST['update_new_title'];


$stmt = $pdo->prepare('SELECT COUNT(*) FROM event_calendar WHERE event_title = :update_new_title AND event_theme = :update_event_theme AND event_date = :update_event_date');
$stmt->execute(['update_new_title' => $update_new_title, 'update_event_date' => $update_event_date, 'update_event_theme' => $update_event_theme]);
$count = $stmt->fetchColumn();


if ($count > 0) {

    echo 'Event already exists.';

} else {

    $stmt = $pdo->prepare('UPDATE event_calendar SET event_title=:update_new_title,  event_date=:update_event_date, event_theme=:update_event_theme WHERE 
    event_title =:update_event_title AND event_date=:update_event_date');

    if ($stmt->execute(['update_event_date' => $update_event_date, 'update_new_title' => $update_new_title, 'update_event_theme' => $update_event_theme
    , 'update_event_title' => $update_event_title])) {
        // echo 'Event successfully updated.';
    } else {
        echo 'Error updating event.';
    }

}