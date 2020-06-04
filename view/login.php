<?php
    if(App\Session::getUser()){
        echo "<h2>Vous êtes déjà connecté sous le nom ".App\Session::getUser()."</h2>";
    }
?>
<h1>CONNECTEZ-VOUS !</h1>

<form action="?ctrl=security&method=login" method="post">
    <p><input placeholder="Votre pseudo..." type="text" name="username"></p>
    <p><input placeholder="Votre mot de passe..." type="password" name="password"></p>
    <p><input type="hidden" name="csrf_token" value="<?=$csrf_token?>"  ></p>
    <p><input type="submit" class="btn btn-primary" value="Connexion"></p>
</form>