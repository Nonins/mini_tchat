<?php
include("./Client/fonctions.php");
if(!isset($_POST['status']))
{
    $contentbrut = file_get_contents("php://input");
    $message = json_decode($contentbrut, true);
    $pseudo = get_pseudo_by_ip($_SERVER['REMOTE_ADDR']);
    insert_data($pseudo, $message['message']);
}
echo afficher_data();
?>