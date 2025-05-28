
  <div class="container mt-5 shadow p-3 mb-5 bg-body rounded">

    <h2>Liste des comptes</h2>

    <div class="d-flex justify-content-between mb-3">
      <form action="index.php" class="col-6 gap-2 d-flex">
        <div class="w-50">
            <input type="hidden" name="controller"  value="compte">
            <input type="hidden" name="action" value="list">
            <input type="text" name="titulaire" class="form-control" placeholder="Rechercher par titulaire..." />
        </div>
         <div>
           <button type="submit" class="btn btn-primary">Search</button>
         </div>
         
      </form>
        <a href="index.php?controller=compte&action=form" class="btn btn-primary"> <i class="bi bi-plus-square" ></i> Nouveau compte</a>

    </div>

    <table class="table table-bordered">

      <thead class="table-light">

        <tr>

          <th>N° Compte</th>

          <th>Titulaire</th>

          <th>Type</th>

          <th>Solde</th>

          <th>Date de création</th>

          <th>Statut</th>

          <th>Actions</th>

        </tr>

      </thead>

      <tbody>
    <?php foreach ($comptes as  $compte): ?>
        <tr>
          <td><?php echo $compte->getNumero()?> </td>
          <td><?php echo $compte->getTitulaire()?> </td>
          <td><span class="badge bg-info">Epargne</span></td>
          <td><?php echo $compte->getSolde()?></td>
          <td><?php echo $compte->getDateCreation()->format("d/m/Y");?></td>
          <td><span class="badge bg-warning text-dark">Bloqué (DK)</span></td>
          <td>
            <a href="index.php?controller=transaction&action=list" class="btn btn-sm btn-primary">Voir</a>
            <button class="btn btn-sm btn-warning">Editer</button>
            <button class="btn btn-sm btn-danger">Supprimer</button>
          </td>
        </tr>
        <?php endforeach?>

      </tbody>

    </table>

      <nav aria-label="Page navigation">
        <ul
          class="pagination d-flex justify-content-center   "
        >
          <li class="page-item disabled">
            <a class="page-link" href="#" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
            </a>
          </li>
        <?php for ($page=1; $page <=$nbrePage ; $page++):?>
         <li class="page-item " aria-current="page">
            <a class="page-link  <?php echo $currentPage==$page ?'active':''?> " href="index.php?controller=compte&action=list&page=<?php echo $page?>"><?php echo $page?></a>
          </li>
        <?php endfor ?>    
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
            </a>
          </li>
        </ul>
      </nav>
      

  </div>

