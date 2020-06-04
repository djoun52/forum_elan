
<h1>INSCRIVEZ-VOUS !</h1>
<p>le mots de passe doit avoir 1 majuscule, 1 minuscule, 1 chiffre, 1 caractère spécial et une longueur d'au moins 8  caractères</p>
<form action="?ctrl=security&method=register" method="post">
    <p><input placeholder="Votre pseudo..." type="text" name="pseudo"></p>
    <p><input placeholder="Votre email..." type="text" name="email"></p>
    <p><input placeholder="Votre mot de passe..." type="password" name="pass1"></p>
    <p><input placeholder="Répétez le mot de passe..." type="password" name="pass2"></p>
    <p><input type="hidden" name="csrf_token" value="<?=$csrf_token?>"  ></p>
    <p><input type="submit" class="btn btn-primary" value="Inscription"></p>
</form>