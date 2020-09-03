<template>
  <div>
    <h1 class="layout__title">Faites un don</h1>
    <p
      class="layout__description"
    >Vous pouvez soutenir le projet et l’équipe de développeurs en faisant un don (Visa, Mastercard and American Express ). *</p>
    <button @click="toggle=!toggle" value="donate" type="button" class="btn btn-danger">
      "Donnez-moi"
      <br />Enrico Macias, 2013
    </button>
    <DonationFormComponent v-if="toggle" />
    <!-- <button v-on:click="(event) => this.$emit('childToParent', event)" value='explication' type="button" class="header__item">explication</button> -->
    <p class="text-danger">* Seuls les dons en euros (€) sont acceptés.</p>
  </div>
</template>

<script>
import DonationFormComponent from "./DonationFormComponent";
export default {
  components: {
    DonationFormComponent,
  },
  data() {
    return {
      toggle: false,
    };
  },
  mounted() {
    localStorage.page = 'donation'
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

.text-danger {
  text-align: end;
}
</style>
