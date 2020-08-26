<template>
  <div>
    <form method="post" id="payment-form">
      <div class="form-row inline">
        <div class="col-4 d-flex flex-column">
          <label for="amount">Montant</label>
          <input
            id="amount"
            class="StripeElement"
            name="amount"
            placeholder="Combien souhaitez vous donner ?"
            required
            v-model="amount"
          />
        </div>
        <div class="col-8 d-flex flex-column">
          <label for="card-holder-name">Nom inscrit sur la carte</label>
          <input
            class="StripeElement"
            name="card-holder-name"
            id="card-holder-name"
            type="text"
            placeholder="John Doe"
            v-model="cardHolderName"
            required
          />
        </div>
      </div>
      <div class="form-row inline">
        <div class="col d-flex flex-column">
          <label for="card-element">Carte de crédit</label>
          <div id="card-element">
            <!-- A Stripe Element will be inserted here. -->
          </div>
        </div>

        <!-- Used to display form errors. -->
        <div id="card-errors" role="alert"></div>
      </div>

      <button id="card-button" class="btn btn-success" @click.prevent="donate()">Donner</button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      amount: 10,
      cardHolderName: 'Olivier CHARON',
      publishableKey: process.env.MIX_STRIPE_KEY,
    };
  },
  methods: {
    stripeInit() {
      const stripe = Stripe(process.env.MIX_STRIPE_KEY);

      const elements = stripe.elements();
      const cardElement = elements.create("card");

      cardElement.mount("#card-element");
    },
    async donate() {
      const stripe = Stripe(this.publishableKey);
      const elements = stripe.elements();
      var cardElement = elements.getElement("card");
      var cardHolderName = this.cardHolderName;

      const { paymentMethod, error } = await stripe.createPaymentMethod(
        "card",
        cardElement,
        {
          billing_details: { name: cardHolderName.value },
        }
      );

      if (error) {
        alert("Désolé, votre don n'a pas pu aboutir: " + error.message);
      } else {
        console.log(paymentMethod.id);
      }
    },
  },
  mounted() {
    this.stripeInit();
  },
};
</script>

<style scoped>
/**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
.StripeElement {
  box-sizing: border-box;

  height: 40px;

  padding: 10px 12px;

  border: 1px solid transparent;
  border-radius: 4px;
  background-color: white;

  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}

.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}
</style>