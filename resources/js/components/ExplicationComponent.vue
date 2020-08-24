<template>
  <div>
    <h1 class="layout__title">Explication</h1>
    <!-- <p   class="layout__description">{{ description }}</p> -->

    <p>
      Lipton IT est un projet Open Source.
      Très sensible à la sécurité, notre but est d’offrir un outil supplémentaire pour rendre votre code plus sur.
      Vous nous transmettez le lien du répertoir github de votre projet en PHP, notre programme passe alors en revue votre code.
      Quelques minutes plus tard vous recevrez par mail un compte rendu détaillant les failles trouvés et une note sur 100, vous indiquant à quel point votre projet est sur.
      En attendant prenez un café.
    </p>

    <button @click="donate()" class="btn btn-danger">
      "Donnez-moi"
      <br />Enrico Macias, 2013
    </button>
  </div>
</template>

<script>
export default {
  methods: {
    donate() {
      console.log("a donné");
    },
  },
};
</script>

<style scoped>
div {
  display: flex;
  flex-direction: column;
}

div * {
  margin: 25px 0;
}

button {
  width: 75%;
  align-self: center;
  font-size: 1em;
  padding: 10px 0;
}
</style>
