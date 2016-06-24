<?php

require '../classes/TeamRepository.php';

header('Content-type: application/json');
echo ")]}'\n";
$teams = TeamRepository::getTeams();

echo json_encode($teams);

?>
