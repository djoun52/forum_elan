<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= CSS_PATH ?>style.css">
    <title>MON FRAMEWORK</title>
</head>
<body>
    
    <div id="wrapper">
        <nav>
            <img src="<?= IMG_PATH ?>monimage.png">
            <a href="?ctrl=home&method=index">Home</a>
            <?php
                if(App\Session::getUser()){
                    ?>
                    <a href="?ctrl=security&method=logout">Déconnexion</a>
                    <a href="?ctrl=home&method=listUsers">Liste des utilisateurs</a>
                    <?php
                }
                else{
                    ?>
                    <a href="?ctrl=security&method=login">Connexion</a>
                    <a href="?ctrl=security&method=register">Inscription</a>
                    <?php
                }
            ?>
        </nav>
        <main>
            <h1>TITRE</h1>
            <div id="page">
            
                <!-- THE HOLE !!! -->
                <?php
                    $data = $result['data'];
                    require $result['view'];
                ?>

            </div>
        </main>
        <footer>
            <p>
                &copy;2020 - WESH WESH !
            </p>
        </footer>
    </div>
</body>
</html>