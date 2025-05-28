
   <style>
    .card-title small {
      font-size: 0.8rem;
    }
    .btn-supprimer {
      background-color: #dc3545;
      color: white;
    }
    .btn-modifier {
      background-color: #ffc107;
      color: black;
    }
    .text-green {
      color: green;
    }
    .text-red {
      color: red;
    }
    .badge-orange {
      background-color: orange;
      color: white;
    }
  </style>

<div class="container my-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Détails du compte</h2>
    <div>
      <a href="index.php?controller=transaction&action=create" class="btn btn-primary">+ Nouvelle transaction</a>
    </div>
  </div>

  <div class="row g-3">
    <!-- Informations du compte -->
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Informations du compte</h5>
          <p><strong>N° Compte:</strong> <a href="#">C00123456</a></p>
          <p><strong>Titulaire:</strong> Amadou Diallo</p>
          <p><strong>Type:</strong> <span class="badge bg-success">Épargne</span></p>
          <p><strong>Solde actuel:</strong> <span class="text-green">1 250 000 FCFA</span></p>
          <p><strong>Date de création:</strong> 15/03/2023</p>
          <p><strong>Statut:</strong> <span class="badge badge-orange">Bloqué 🔒</span></p>
          <p><strong>Date de déblocage:</strong> 15/04/2023</p>
          <div class="d-flex gap-2 mt-3">
            <button class="btn btn-modifier btn-sm">Modifier</button>
            <button class="btn btn-supprimer btn-sm">Supprimer</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Historique des transactions -->
    <div class="col-md-8">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Historique des transactions</h5>
          <table class="table table-bordered table-hover">
            <thead class="table-light">
              <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Type</th>
                <th>Montant</th>
                <th>Solde après</th>
                <th>Description</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>T00123</td>
                <td>10/04/2023</td>
                <td><span class="badge bg-success">Dépôt</span></td>
                <td class="text-green">+250 000 FCFA</td>
                <td>1 250 000 FCFA</td>
                <td>Dépôt mensuel</td>
              </tr>
              <tr>
                <td>T00122</td>
                <td>05/04/2023</td>
                <td><span class="badge bg-success">Dépôt</span></td>
                <td class="text-green">+500 000 FCFA</td>
                <td>1 000 000 FCFA</td>
                <td>Virement salaire</td>
              </tr>
              <tr>
                <td>T00121</td>
                <td>28/03/2023</td>
                <td><span class="badge bg-danger">Retrait</span></td>
                <td class="text-red">-100 000 FCFA</td>
                <td>500 000 FCFA</td>
                <td>Retrait guichet</td>
              </tr>
              <tr>
                <td>T00120</td>
                <td>20/03/2023</td>
                <td><span class="badge bg-danger">Retrait</span></td>
                <td class="text-red">-150 000 FCFA</td>
                <td>600 000 FCFA</td>
                <td>Paiement loyer</td>
              </tr>
              <tr>
                <td>T00119</td>
                <td>15/03/2023</td>
                <td><span class="badge bg-success">Dépôt</span></td>
                <td class="text-green">+750 000 FCFA</td>
                <td>750 000 FCFA</td>
                <td>Dépôt initial</td>
              </tr>
            </tbody>
          </table>
          <nav >
            <ul class="pagination d-flex justify-content-center">
              <li class="page-item disabled"><a class="page-link" href="#">Précédent</a></li>
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">Suivant</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>

    <!-- Statistiques -->
    <div class="col-md-4">
      <div class="card mt-3">
        <div class="card-body">
          <h5 class="card-title">Statistiques</h5>
          <p><strong>Total des dépôts:</strong> <span class="text-green">1 500 000 FCFA</span></p>
          <p><strong>Total des retraits:</strong> <span class="text-red">250 000 FCFA</span></p>
          <p><strong>Nombre de transactions:</strong> 8</p>
          <p><strong>Dernière transaction:</strong> 10/04/2023</p>
        </div>
      </div>
    </div>
  </div>
</div>
