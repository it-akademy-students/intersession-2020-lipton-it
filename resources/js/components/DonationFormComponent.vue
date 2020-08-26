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
    <BankTransferComponent v-else />

     <!-- <BankTransferComponent v-if="paiementCreditCard" />
    <CreditCardComponent v-else /> -->
  </div>
</template>
 
<style scoped>
</style>

<script>
import CreditCardComponent from "./CreditCardComponent";
import BankTransferComponent from "./BankTransferComponent";

export default {
  components: {
    CreditCardComponent,
    BankTransferComponent,
  },
  data() {
    return {
      paiementCreditCard: true,
    };
  },
  methods: {},
};
</script> 

