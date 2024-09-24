<?php

include_once "dbh.inc.php";

$update_event_title = $_POST['update_event_title'];
$update_event_date = $_POST['update_event_date'];

$sql = "DELETE FROM event_calendar WHERE event_title = :update_event_title AND event_date = :update_event_date";
$stmt = $pdo->prepare($sql);

$stmt->bindParam(':update_event_title', $update_event_title);
$stmt->bindParam(':update_event_date', $update_event_date);
$stmt->execute();
