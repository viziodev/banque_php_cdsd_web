
<?php 
$errors=[];
$post=[];
if (isset($_SESSION['errors'])) {
  $errors=$_SESSION['errors'];
  $post=$_SESSION['data'];
  unset($_SESSION['errors']);
}
?>
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
         
        <form action="index.php" method="POST">
          <input type="hidden" name="controller"  value="compte">
          <input type="hidden" name="action" value="create">
          <div class="mb-2">
            <label for="titulaire" class="form-label">Titulaire</label>
            <select class="form-select"  name="titulaire" id="titulaire" >
              <option  value="" >Choisir un client</option>
              <?php foreach ($clients as  $client):?>
                  <option  <?php echo isset($post['titulaire']) && $post['titulaire']==$client->getId()?'selected':''?>  value="<?php echo $client->getId();?>"><?php echo $client->getNomComplet();?></option>
              <?php endforeach?>
            </select>
            <small id="emailHelpId" class="form-text text-danger"><?php echo $errors['titulaire']??''?></small>
          </div> 

          <!-- Solde initial -->
          <div class="mb-2">
            <label for="soldeInitial" class="form-label">Solde initial (FCFA)</label>
            <input type="number" value="<?php echo $post['solde']??''?>" name="solde" class="form-control" id="soldeInitial" placeholder="Montant de départ"  >
            <small id="emailHelpId" class="form-text text-danger"><?php echo $errors['solde']??''?></small>

          </div>
          <div class="d-flex justify-content-end gap-3">
            <button type="submit" class="btn btn-primary">Créer le compte</button>
            <button  type="reset" class="btn btn-light">Annuler</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


