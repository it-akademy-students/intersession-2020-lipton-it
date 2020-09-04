<template>
  <div>
    <h1 class="layout__title">Explication</h1>
    <!-- <p   class="layout__description">{{ description }}</p> -->

    <p class="layout__description">
      Lipton IT est un projet Open Source.
      Très sensible à la sécurité, notre but est d’offrir un outil supplémentaire pour rendre votre code plus sur.
      Vous nous transmettez le lien du répertoir github de votre projet en PHP, notre programme passe alors en revue votre code.
      Quelques minutes plus tard vous recevrez par mail un compte rendu détaillant les failles trouvés et une note sur 100, vous indiquant à quel point votre projet est sur.
      En attendant prenez un café.
    </p>
  </div>
</template>

<script>
export default {
    //  data() {
    //     return {
    //     childMessage: ''
    //     }
    // },
    // methods: {
    //     // Define the method that emits data to the parent as the first parameter to `$emit()`.
    //     // This is referenced in the <template> call in the parent. The second parameter is the payload.
    //     emitToParent (event) {
    //     this.$emit('childToParent', this.childMessage)
    //     }
    // }
    mounted() {
        localStorage.page = 'explication'
    },
};
</script>

