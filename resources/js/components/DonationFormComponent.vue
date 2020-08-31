<template>
  <div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-5 text-center">
          <button
            @click="paiementCreditCard=!paiementCreditCard"
            class="btn btn-secondary"
          >Payer {{paiementCreditCard?'par virement':'par carte'}}</button>
        </div>
      </div>
    </div>

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

