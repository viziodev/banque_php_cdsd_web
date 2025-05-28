<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BankManager - Tableau de bord</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary px-4">
    <a class="navbar-brand fw-bold text-white" href="#"><i class="bi bi-bank"></i> BankManager</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link active text-white" href="index.php?controller=dashboard&action=list">Tableau de bord</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="index.php?controller=compte&action=list">Comptes</a></li>
      </ul>
      <div class="dropdown">
        <button class="btn btn-outline-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
          Admin
        </button>
        <ul class="dropdown-menu dropdown-menu-end">
          <li><a class="dropdown-item" href="#">Profil</a></li>
          <li><a class="dropdown-item" href="#">Déconnexion</a></li>
        </ul>
      </div>
    </div>
  </nav>