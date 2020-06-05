<?php
    if(App\Session::getUser()){
        echo "<h2>Vous êtes déjà connecté sous le nom ".App\Session::getUser()."</h2>";
    }
?>
<h1>CONNECTEZ-VOUS !</h1>

<form action="?ctrl=security&method=login" method="post">
    <div class="form-group">
        <p><input class="form-control col-3"  placeholder="Votre pseudo..." type="text" name="username"></p>
    </div>
    <div class="form-group">
    <p><input class="form-control col-3" placeholder="Votre mot de passe..." type="password" name="password"></p>
    </div>
    <input type="hidden" name="csrf_token" value="<?=$csrf_token?>"  >
    <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="defaultCheck1" name="remember">
    <label class="form-check-label" for="defaultCheck1">se souvenire de moi</label>
    </div>
    <p><input type="submit" class="btn btn-primary" value="Connexion"></p>
</form>