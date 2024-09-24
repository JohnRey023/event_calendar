<?php
include_once "dbh.inc.php";

$stmt = $pdo->query('SELECT event_id, event_date, event_title, event_theme FROM event_calendar');
$events = $stmt->fetchAll(PDO::FETCH_ASSOC);

// return events as JSON
echo json_encode($events);