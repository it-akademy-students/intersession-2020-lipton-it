<template>
  <div>
      <button
        @click="paiementCreditCard=!paiementCreditCard"
        class="form__submit"
      >Payer {{paiementCreditCard?'par virement':'par carte'}}</button>

    <CreditCardComponent v-if="paiementCreditCard" />
    <PaypalComponent v-else />
  </div>
</template>
 
<style scoped>
</style>

<script>
import CreditCardComponent from "./CreditCardComponent";
import PaypalComponent from "./PaypalComponent";

export default {
  components: {
    CreditCardComponent,
    PaypalComponent,
  },
  data() {
    return {
      paiementCreditCard: true,
    };
  },
  methods: {},
};
</script> 

