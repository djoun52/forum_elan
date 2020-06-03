<?php

// var_dump($_SESSION)
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= CSS_PATH ?>style.css">
    <script src="https://cdn.tiny.cloud/1/7haq68lf1v8jyfog5oyt0ffcx7x3gx02pffvb043biwdna1m/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#mytextarea'
        });
    </script>
    <title>forum Elan</title>
</head>

<body>

    <div id="wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="?ctrl=home&method=listTopics">Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- <img src="<?= IMG_PATH ?>monimage.png"> -->
                <!-- <a href="?ctrl=home&method=index">Home</a> -->
                <ul class="navbar-nav mr-auto">
                    <?php
                    if (App\Session::getUser()) {
                    ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="?ctrl=security&method=logout">Déconnexion</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                liste
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="?ctrl=home&method=listUsers">Liste des utilisateurs</a>
                                <a class="dropdown-item" href="?ctrl=home&method=listTopics">Liste des topics</a>
                                <a class="dropdown-item" href="?ctrl=home&method=listCategorie">Liste des categories</a>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="?ctrl=home&method=create">créer un topic </a>
                        </li>

                    <?php
                    } else {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="?ctrl=security&method=login">Connexion</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?ctrl=security&method=register">Inscription</a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
                <form class="form-inline my-2 my-lg-0" action="?ctrl=reserche&method=reserche" method="post">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="rechercher topics" name="reserche" aria-label="Recipient's username with two button addons" aria-describedby="button-addon4">
                        <div class="input-group-append" id="button-addon4">
                            <button class="btn btn-outline-primary" type="type" name="type" value="categorie">categorie</button>
                            <button class="btn btn-outline-primary" type="type" name="type" value="mot">mots-clés</button>
                        </div>
                    </div>
                </form>
            </div>
        </nav>
        <main>
            <h1>Forum</h1>


            <div id="page">
                <?= $page ?>
            </div>
        </main>

        <footer>
            <p>
                &copy;2020 - WESH WESH !
            </p>
        </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>