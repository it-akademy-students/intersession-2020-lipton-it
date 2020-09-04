<template>
  <div>
    <h1 class="layout__title">Explication</h1>
    <p class="layout__description">
      Lipton IT est un projet Open Source.
      Très sensible à la sécurité, notre but est d’offrir un outil supplémentaire pour rendre votre code plus sûr.
      Vous nous transmettez le lien du répertoire Github de votre projet PHP, notre programme passe alors en revue votre code.
      Quelques minutes plus tard vous recevrez par mail, en pièce jointe, un compte rendu détaillant les failles trouvées, vous indiquant à quel point votre projet est sûr.
      En attendant servez vous un soda.
    </p>
  </div>
</template>

<script>
export default {
    mounted() {
        localStorage.page = 'explication'
    },
};
</script>

