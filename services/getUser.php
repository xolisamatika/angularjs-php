<?php

require '../classes/TeamRepository.php';

header('Content-type: application/json');
echo ")]}'\n";

if (isset($_GET['username']) && is_string($_GET['username'])) {
	# code...
}
$user = TeamRepository::getUser($_GET['username']);

echo json_encode($user);
?>