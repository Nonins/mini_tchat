<?php
if (isset($_COOKIE['pseudo'])) {
    include("tchat.php");
}
else
{
    include("login.php");
}
?>
