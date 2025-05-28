
<div class="container my-4">
<style>
    .text-green {
      color: green;
    }
    .badge-orange {
      background-color: orange;
      color: white;
    }
    .note {
      font-size: 0.9rem;
      color: #6c757d;
    }
    .form-section {
      background-color: #fff;
      padding: 1.5rem;
      border-radius: 0.5rem;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
    }
  </style>

  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Nouvelle transaction</h2>
    <a href="#" class="btn btn-secondary">← Retour au compte</a>
  </div>

  <div class="row g-4">
    <!-- Informations du compte -->
    <div class="col-md-4">
      <div class="form-section mb-3">
        <h5>Informations du compte</h5>
        <p><strong>N° Compte:</strong> <a href="#">C00123456</a></p>
        <p><strong>Titulaire:</strong> Amadou Diallo</p>
        <p><strong>Type:</strong> <span class="badge bg-success">Épargne</span></p>
        <p><strong>Solde actuel:</strong> <span class="text-green">1 250 000 FCFA</span></p>
        <p><strong>Statut:</strong> <span class="badge badge-orange">Bloqué 🔒</span></p>
        <p><strong>Date de déblocage:</strong> 15/04/2023</p>
      </div>

      <!-- Règles de transaction -->
      <div class="form-section">
        <h5>Règles de transaction</h5>
        <div class="mb-2">
          <span class="badge bg-warning text-dark">Compte Épargne</span>
          <span class="note d-block mt-1">Les retraits sont bloqués jusqu’au 15/04/2023.</span>
        </div>
        <div class="mb-2">
          <span class="badge bg-info text-dark">Compte Chèque</span>
          <span class="note d-block mt-1">Frais de transaction de 0.8% sur chaque opération.</span>
        </div>
        <p class="note mt-3">Les comptes épargne ont une période de blocage durant laquelle les retraits ne sont pas autorisés.</p>
      </div>
    </div>

    <!-- Formulaire transaction -->
    <div class="col-md-8">
      <div class="form-section">
        <h5>Détails de la transaction</h5>

        <form>
          <div class="mb-3">
            <label for="typeTransaction" class="form-label">Type de transaction</label>
            <select class="form-select" id="typeTransaction" required>
              <option selected disabled>Sélectionner un type</option>
              <option value="depot">Dépôt</option>
              <option value="retrait">Retrait</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="montant" class="form-label">Montant (FCFA)</label>
            <input type="number" class="form-control" id="montant" placeholder="Entrez le montant" min="1000" required>
            <div class="form-text">Montant minimum : 1 000 FCFA</div>
          </div>

          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" rows="2" placeholder="Description de la transaction" required></textarea>
          </div>

          <div class="mb-3">
            <label for="dateTransaction" class="form-label">Date de la transaction</label>
            <input type="date" class="form-control" id="dateTransaction" required>
          </div>

          <div class="mb-4">
            <label for="agent" class="form-label">Agent / Vendeur</label>
            <select class="form-select" id="agent" required>
              <option selected disabled>Sélectionner un agent</option>
              <option>Agent 1</option>
              <option>Agent 2</option>
              <option>Agent 3</option>
            </select>
          </div>

          <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Effectuer la transaction</button>
            <button type="reset" class="btn btn-light">Annuler</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
