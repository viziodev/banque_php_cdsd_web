
<p><strong>N° Compte:</strong> <a href="#"><?php echo $compte->getNumero()?></a></p>
<p><strong>Titulaire:</strong><?php echo $compte->getTitulaire()?></p>
<p><strong>Type:</strong> <span class="badge bg-success">Épargne</span></p>
<p><strong>Solde actuel:</strong> <span class="text-green"><?php echo $compte->getSolde()?> FCFA</span></p>
<p><strong>Date de création:</strong> <?php echo $compte->getDateCreation()->format("d/m/Y");?></p>
<p><strong>Statut:</strong> <span class="badge badge-orange">Bloqué 🔒</span></p>
<p><strong>Date de déblocage:</strong> 15/04/2023</p>