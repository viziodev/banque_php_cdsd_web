

  <div class="container my-4">
    <h2 class="mb-4">Tableau de bord</h2>

    <!-- Statistiques -->
    <div class="row mb-4">
      <div class="col-md-4">
        <div class="card shadow-sm p-3">
          <h6>Total des comptes</h6>
          <h4>24</h4>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card shadow-sm p-3">
          <h6>Solde total</h6>
          <h4 class="text-success">15 750 000 FCFA</h4>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card shadow-sm p-3">
          <h6>Transactions (aujourd hui)</h6>
          <h4>12</h4>
        </div>
      </div>
    </div>




    <!-- Transactions et Comptes récents -->
    <div class="row">
      <!-- Transactions -->
      <div class="col-md-8 mb-4">
        <div class="d-flex justify-content-between align-items-center">
          <h5>Transactions récentes</h5>
          <a href="#">Voir tout</a>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <thead class="table-light">
              <tr>
                <th>ID</th>
                <th>Compte</th>
                <th>Type</th>
                <th>Montant</th>
                <th>Date</th>
                <th>Statut</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>T001</td><td>C00123</td><td>Dépôt</td><td class="text-success">+250 000 FCFA</td><td>15/06/2023</td><td><span class="badge bg-success">Complété</span></td>
              </tr>
              <tr>
                <td>T002</td><td>C00456</td><td>Retrait</td><td class="text-danger">-75 000 FCFA</td><td>15/06/2023</td><td><span class="badge bg-success">Complété</span></td>
              </tr>
              <tr>
                <td>T003</td><td>C00789</td><td>Dépôt</td><td class="text-success">+500 000 FCFA</td><td>14/06/2023</td><td><span class="badge bg-success">Complété</span></td>
              </tr>
              <tr>
                <td>T004</td><td>C00123</td><td>Retrait</td><td class="text-danger">-100 000 FCFA</td><td>13/06/2023</td><td><span class="badge bg-success">Complété</span></td>
              </tr>
              <tr>
                <td>T005</td><td>C00456</td><td>Dépôt</td><td class="text-success">+150 000 FCFA</td><td>13/06/2023</td><td><span class="badge bg-success">Complété</span></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Comptes récents -->
      <div class="col-md-4">
        <div class="d-flex justify-content-between align-items-center">
          <h5>Comptes récents</h5>
          <a href="#">Voir tout</a>
        </div>
        <ul class="list-group">
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <div>
              <strong>Amadou Diallo</strong><br>
              <small>Compte Épargne - C00123</small>
            </div>
            <span class="badge bg-primary">1 250 000 FCFA</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <div>
              <strong>Fatou Ndiaye</strong><br>
              <small>Compte Chèque - C00456</small>
            </div>
            <span class="badge bg-primary">750 000 FCFA</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <div>
              <strong>Moussa Sow</strong><br>
              <small>Compte Épargne - C00789</small>
            </div>
            <span class="badge bg-primary">2 500 000 FCFA</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <div>
              <strong>Aida Mbaye</strong><br>
              <small>Compte Chèque - C00100</small>
            </div>
            <span class="badge bg-primary">350 000 FCFA</span>
          </li>
        </ul>
      </div>
    </div>
  </div>


