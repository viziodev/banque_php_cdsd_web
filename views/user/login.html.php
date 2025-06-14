<?php 
$errors=[];
if (isset($_SESSION['errors'])) {
  $errors=$_SESSION['errors'];
  unset($_SESSION['errors']);
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>BankManager - Connexion</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-light">
  <div class="card p-4 shadow-sm login-card">
    <div class="text-center mb-4">
      <div class="logo mb-2">
        <i class="bi bi-bank fs-1 text-primary"></i>
      </div>
      <h2 class="fw-bold">BankManager</h2>
      <p class="text-muted">Système de Gestion de Comptes</p>
    </div>
    <h4 class="text-center mb-3">Connexion</h4>
     <div class="my-1">
           <small id="emailHelpId" class="form-text text-danger"><?php echo $errors['connexion']??''?></small>
     </div>
    <form action="index.php" method="POST">
     <input type="hidden" name="controller"  value="user">
     <input type="hidden" name="action" value="login">
      <div class="mb-3">
        <label for="identifiant" class="form-label">Identifiant</label>
        <input type="text" name="login" class="form-control" id="identifiant" placeholder="Entrez votre identifiant">
        <small id="emailHelpId" class="form-text text-danger"><?php echo $errors['login']??''?></small>
      </div>
      <div class="mb-3">
        <label for="motdepasse" class="form-label">Mot de passe</label>
        <input type="password" name="password" class="form-control" id="motdepasse" placeholder="Entrez votre mot de passe">
        <small id="emailHelpId" class="form-text text-danger"><?php echo $errors['password']??''?></small>
      </div>
      <div class="mb-3 text-end">
        <a href="#" class="small text-primary">Mot de passe oublié ?</a>
      </div>
      <button type="submit" class="btn btn-primary w-100">Se connecter</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.js"></script>
</body>
</html>


