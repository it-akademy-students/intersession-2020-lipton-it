<template>
  <div>
    <h1 class="layout__title">Explication</h1>
    <p class="layout__description">
      Lipton IT est un projet Open Source.
      Très sensible à la sécurité, notre but est d’offrir un outil supplémentaire pour rendre votre code plus sur.
      Vous nous transmettez le lien du répertoir github de votre projet en PHP, notre programme passe alors en revue votre code.
      Quelques minutes plus tard vous recevrez par mail en pièce jointe un compte rendu détaillant les failles trouvés, vous indiquant à quel point votre projet est sur.
      En attendant prenez un soda.
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

