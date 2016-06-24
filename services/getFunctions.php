<?php
require '../classes/TeamRepository.php';

header('Content-type: application/json');
echo ")]}'\n";

switch($_GET['function']){
    case '1': getRandoms(); break;
    case '2': do_that(); break;
    case '3': do_the_other(); break;
    case '3': r(); break;

    default: break;
}

function do_this(){
    echo 'do this called';
}
function do_that(){
    echo 'do that called';
}
function do_the_other(){
    echo 'do the other called';
}
function getRandoms(){
	echo json_encode(TeamRepository::getRandom());
}
?>					
