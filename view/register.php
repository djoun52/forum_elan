
<h1>INSCRIVEZ-VOUS !</h1>
<p>le mots de passe doit avoir 1 majuscule, 1 minuscule, 1 chiffre, 1 caractère spécial et une longueur d'au moins 8  caractères</p>
<form action="?ctrl=security&method=register" method="post">
    <div class="form-group">
        <p><input class="form-control col-3" placeholder="Votre pseudo..." type="text" name="pseudo"></p>
    </div>
    <div class="form-group">
    <p><input class="form-control col-3" placeholder="Votre email..." type="text" name="email"></p>
    </div>
    <div class="form-group">
    <p><input class="form-control col-3" placeholder="Votre mot de passe..." type="password" name="pass1"></p>
    </div>
    <div class="form-group">
    <p><input class="form-control col-3" placeholder="Répétez le mot de passe..." type="password" name="pass2"></p>
    </div>

    <p><input type="hidden" name="csrf_token" value="<?=$csrf_token?>"  ></p>
    <p><input type="submit" class="btn btn-primary" value="Inscription"></p>
</form>