<?php

require '../classes/TeamRepository.php';

header('Content-type: application/json');
echo ")]}'\n";
$users = TeamRepository::getUsers();

echo json_encode($users);
//var_dump($teams);
?>