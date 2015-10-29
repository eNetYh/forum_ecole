<div style="margin-left:auto; margin-right: auto; width:300px; margin-top: 50px;" >
  <form class="form-signin" method="post">
    <h2 class="form-signin-heading">Connexion</h2>
    <input type="text" name="login" <?php if(isset($_COOKIE['login'])){echo 'value="'.$_COOKIE['gestarticle_login'].'"'; } ?>  class="form-control" placeholder="Login"  required autofocus><br>
    <input type="password" name="pass" class="form-control" placeholder="Mot de Passe"  required>
    <div class="checkbox">
      <label>
        <input type="checkbox" value="remember-me" name="cookie" id="cookie" <?php if(isset($_COOKIE['login'])){echo 'checked'; } ?> > Se souvenir de moi
      </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Connexion</button>
  </form>
</div>
