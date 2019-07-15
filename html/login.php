<?php include('header.html');

?>
<div class="container mb-4">
	<div class="row">
    	<div class="container col-4" id="formContainer">

          <form class="form-signin mb-2" id="login" role="form" action="index.php?controller=client&action=show" method="POST">
              <!-- APRES LE TEST DE LA CONNEXION, SI L'USER EST ADMIN, REDIRIGER VERS "index.php?controller=admin&action=show" -->
            <h3 class="form-signin-heading mb-4 text-center">Merci de vous connecter</h3>
            <a href="#" id="flipToRecover" class="flipLink">
              <div id="triangle-topright"></div>
            </a>
            <input type="email" class="form-control" name="loginEmail" id="loginEmail" placeholder="Email address" required autofocus>
            <input type="password" class="form-control" name="loginPass" id="loginPass" placeholder="Password" required>
            <button class="btn btn-lg btn-primary btn-block mb-3" type="submit">Se connecter</button>
            
          </form>
          <a href="#" class="mb-1">Pas de compte ? Cliquez pour vous inscrire</a>

        </div> <!-- /container -->
	</div>
</div>

<?php include('footer.html');
?>