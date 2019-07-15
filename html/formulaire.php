<?php include('header.html');

?>
<form action="" method="POST" class="contain m-auto col-8">

  <h1 class="text-center">Formulaire d'inscription</h1>
  <div class="form-group">
    <label for="nom">Nom</label>
    <input name="nom" type="text" class="form-control" id="nom" placeholder="Votre nom">
  </div>

  <div class="form-group">
    <label for="prenom">Prénom</label>
    <input name="prenom" type="text" class="form-control" id="prenom" placeholder="Votre prénom">
  </div>


  <div class="form-group">
    <label for="societe">Société</label>
    <input name="societe" type="text" class="form-control" id="societe" placeholder="Votre société">
  </div>

  <div class="form-group">
    <label for="mail">Adresse Mail</label>
    <input name="mail" type="email" class="form-control" id="mail" placeholder="Votre adresse électronique">
  </div>

  <div class="form-group">
    <label for="password">Mot de passe</label>
    <input name="password" type="password" class="form-control" id="password" placeholder="Entrez un mot de passe">
  </div>

  <button type="submit" class="btn btn-primary">Inscription</button>
  <h1>Déjà un compte ?</h1>
  <a href="index.php?page=list" class="btn btn-primary">Se connecter</a>
</form>

<?php include('footer.html');
?>