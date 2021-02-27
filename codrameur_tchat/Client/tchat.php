<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <title>Codrameurs tchat</title>
            <button
                type="button"
                onclick= "window.location = '/codrameur_tchat/Client/login.php'">
                changer pseudo
            </button>
        </head>
        <body>
            <h1>codrameurs tchat</h1>
            <h5>code tchat share</h5>
            <p>Bonjour <?php echo $_COOKIE['pseudo']; ?> !!!</p>
            <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
            <script src="code-message.js"></script>
            <form name="form1" method="post" action="/codrameur_tchat/intercepteur.php">
                <input type="text" name="mess">
                <input type="submit" value="Envoyé" />
            </form>
            <div id="field">
                <label name="label" id="label">
                    <?php
                    include("fonctions.php");
                    afficher_data();
                    ?>
                </label>
            </div>

        </body>

    </html>