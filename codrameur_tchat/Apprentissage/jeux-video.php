<?php
$bdd = new PDO('mysql:host=localhost;dbname=info-user', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$reponse = $bdd->query('SELECT nom FROM jeux_video WHERE nom="l"');
$données = $reponse->fetch();
echo $données[0];
echo strlen($données[0]);
//while ($données = $reponse->fetch())
//{
//    //$nom = strval($données[0]);
//    
//    echo '<p>' . $données[0] . '</p>';
//}
?>