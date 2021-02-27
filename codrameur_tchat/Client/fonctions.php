<?php
$bdd = new PDO('mysql:host=localhost;dbname=info-user', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

function insert_pseudo($pseudo, $value)
{
    global $bdd;
    $insertion = $bdd->prepare('INSERT INTO pseudo(pseudo, Ip) VALUE(?,?)');
    $insertion->execute(array($pseudo, $value));
    $insertion->closeCursor();
}

function update($pseudo, $ip)
{
    global $bdd;
    $update = $bdd->prepare('UPDATE pseudo SET pseudo = ? WHERE Ip = ?');
    $update->execute(array($pseudo, $ip));
    $update->closeCursor();
}

function insert_data($pseudo, $data)
{
    global $bdd;
    $insert_data = $bdd->prepare('INSERT INTO content(pseudo, content) VALUE(?,?)');
    $insert_data-> execute(array($pseudo, $data));
    $insert_data-> closeCursor();
}


function get_pseudo_by_ip($ip)
{
    global $bdd;
    $pseudo =  $bdd->prepare('SELECT pseudo FROM pseudo WHERE Ip = ?');
    $pseudo->execute(array($ip));
    $data = $pseudo->fetch();
    return $data['pseudo'];
}

function get_data()
{
    global $bdd;
    $data =  $bdd->query('SELECT pseudo, content FROM content ORDER BY ID DESC  LIMIT 0, 10');
    return $data;
}

function afficher_data()
{
    $messages = get_data();
    while ($donnees = $messages->fetch())
    {
        echo '<p><strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> : ' . htmlspecialchars($donnees['content']) . '</p>';
    }
}

function check($pseudo, $IP)
{
    global $bdd;
    $request_pseudo = $bdd->prepare('SELECT pseudo FROM pseudo WHERE pseudo = ?');
    $request_pseudo->execute(array($pseudo));
    $data = $request_pseudo -> fetch();
    $request_Ip = $bdd->prepare('SELECT Ip FROM pseudo WHERE Ip = ?');
    $request_Ip->execute(array($IP));
    $ip = $request_Ip -> fetch();
    
    if(strlen($data[0]) == 0)
    {
        if(strlen($ip[0]) == 0)
        {
            insert_pseudo($pseudo, $IP); //ajoute un user
        }
        else
        {
            update($pseudo, $IP); // change le pseudo d'un user deja existant
        }
        return 'On';
    }
    else
    {
        return;
    }

}

?>