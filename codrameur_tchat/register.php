<?php
include('Client/fonctions.php');
$data = check($_POST['pseudo'], $_SERVER['REMOTE_ADDR']);
if ($data == 'On') {
    setcookie('pseudo', $_POST['pseudo'], time() + 365*24*3600, null, null, false, true);
    echo '<!DOCTYPE html>';
    echo '<html>';
    echo '<head>';
    echo '<meta charset="utf-8">';
    echo '<title>Enregistré !</title>';
    echo '</head>';
    echo '<body>';
    echo "<p>Vous etes enregistr&eacute; sur ce site sous le pseudo: ".  $_POST['pseudo'] . "</p>";
    echo '<p>Vous aller etre redirigé vers la zone de discussion dans 5 secondes </p>';
    echo '</body>';
    echo "<script> function change_location(){document.location = '/codrameur_tchat/Client/tchat.php'} ";
    echo "setTimeout(change_location, 5000); </script>";
    echo '';
    echo '</html>';
}
else
{
    echo "pseudo deja pris veuillez en choisir un autre ou attendre que l'autre utilisateur le change";
    echo '<p>Vous aller etre redirigé vers la page pseudo dans 5 secondes </p>';
    echo "<script> function change_location(){document.location = '/codrameur_tchat/Client/login.php'} ";
    echo "setTimeout(change_location, 5000); </script>";
    
}
?>
