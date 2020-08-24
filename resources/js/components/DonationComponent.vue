<template>
  <div>
    <h1 class="layout__title">Faites un don</h1>
    <p
      class="layout__description"
    >Vous pouvez soutenir le projet et l’équipe de développeur en faisant un don via paypal lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum solor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet</p>
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
