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
            type="number"
            @input="restrictDecimal"
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

      <button id="card-button" class="btn btn-success" @click.prevent="donate(cardElement)">Donner</button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      amount: 1010,
      cardHolderName: "",
      publishableKey: process.env.MIX_STRIPE_KEY,
      // publishableKey: process.env.MIX_STRIPE_PROD_KEY,
    };
  },
  computed: {
    stripe: function () {
      const stripe = Stripe(this.publishableKey);
      return stripe;
    },
    cardElement: function () {
      console.log("cardELement()");
      const elements = this.stripe.elements();
      let cardElement = elements.create("card", {
        hidePostalCode: true,
      });
      console.log("cardELement() end");
      return cardElement;
    },
  },
  methods: {
    restrictDecimal() {
      this.amount = this.amount.match(/^\d+\.?\d{0,2}/);
    },
    stripeInit() {
      console.log("stripe init");
      console.log(this.amount);
      console.log(this.cardElement);

      this.cardElement.mount("#card-element");
    },
    async donate(cardElement) {
      let cardHolderName = this.cardHolderName;
      let stripe = this.stripe;
      console.log(cardElement);

      const { paymentMethod, error } = await stripe.createPaymentMethod({
        type: "card",
        card: this.cardElement,
        billing_details: { name: cardHolderName },
      });

      if (error) {
        alert("Désolé, votre don n'a pas pu aboutir: " + error.message);
        return;
      }
      let token = stripe.createToken(cardElement);
      console.log(paymentMethod);
      console.log(this.amount * 100);
      console.log(token);
      axios
        .post("/api/donate", {
          amount: this.amount * 100,
          paymentMethod: paymentMethod.id,
        })
        .then((response) => {
          alert("Toute l'équipe Lipton-IT vous remercie pour votre don!");
          window.location.reload();
        })
        .catch((error) => {
          alert("Une erreur est survenue :" + error);
        });
    },
  },
  mounted() {
    console.log("computed");
    console.log(this.amount);
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