

  <style>
    .badge-orange {
      background-color: orange;
      color: white;
    }
    .form-section {
      background-color: #fff;
      padding: 1.5rem;
      border-radius: 0.5rem;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
    }
    .text-green {
      color: green;
    }
  </style>

<div class="container my-4">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Compte</h2>
    <a href="page_des_comptes.html" class="btn btn-secondary">← Retour à la liste</a>
  </div>

  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="form-section">
        <h5 class="mb-4">Formulaire d’ouverture de compte</h5>
            <!--index.php?controller=compte&action=form-->
        <form action="index.php" method="POST">
          <input type="hidden" name="controller"  value="compte">
          <input type="hidden" name="action" value="create">
          <!-- Titulaire -->
          <div class="mb-2">
            <label for="nomTitulaire" class="form-label">Nom du titulaire</label>
            <input type="text" name="titulaire" class="form-control" id="nomTitulaire" placeholder="Ex : Amadou Diallo" >
          </div>

          <!-- Type de compte
          <div class="mb-2">
            <label for="typeCompte" class="form-label">Type de compte</label>
            <select class="form-select" id="typeCompte" required>
              <option selected disabled>Choisir un type</option>
              <option value="epargne">Épargne</option>
              <option value="cheque">Chèque</option>
            </select>
          </div> -->

          <!-- Solde initial -->
          <div class="mb-2">
            <label for="soldeInitial" class="form-label">Solde initial (FCFA)</label>
            <input type="number" name="solde" class="form-control" id="soldeInitial" placeholder="Montant de départ"  >
            <div class="form-text">Montant minimum : 1 000 FCFA</div>
          </div>

          <!-- Statut 
          <div class="mb-2">
            <label for="statutCompte" class="form-label">Statut du compte</label>
            <select class="form-select" id="statutCompte" required>
              <option selected disabled>Choisir un statut</option>
              <option value="actif">Actif</option>
              <option value="bloque">Bloqué</option>
            </select>
          </div>
          -->

          <!-- Date de déblocage (visible si bloqué)
          <div class="mb-2">
            <label for="dateDeblocage" class="form-label">Date de déblocage</label>
            <input type="date" class="form-control" id="dateDeblocage">
            <div class="form-text">Requis uniquement si le compte est bloqué.</div>
          </div> -->

          <!-- Boutons -->
          <div class="d-flex justify-content-end gap-3">
            <button type="submit" class="btn btn-primary">Créer le compte</button>
            <button  type="reset" class="btn btn-light">Annuler</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


