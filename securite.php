<?php

function securite($donnee){

$donnee=trim($donnee);
$donnee=htmlspecialchars($donnee);
$donnee=stripcslashes($donnee);
$donnee=strip_tags($donnee);

return $donnee;
}
