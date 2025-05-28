<script>
  // Afficher/cacher date de déblocage selon le statut
  const statutSelect = document.getElementById('statutCompte');
  const dateDeblocageInput = document.getElementById('dateDeblocage');

  statutSelect.addEventListener('change', () => {
    if (statutSelect.value === 'bloque') {
      dateDeblocageInput.removeAttribute('disabled');
    } else {
      dateDeblocageInput.setAttribute('disabled', 'true');
      dateDeblocageInput.value = '';
    }
  });
</script>

</body>
</html>