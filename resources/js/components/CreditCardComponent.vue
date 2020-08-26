<template>
  <div>
    <form @submit="donate" method="post" id="payment-form">
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
          <label for="card-element">Carte de crédit</label>
          <div id="card-element">
            <!-- A Stripe Element will be inserted here. -->
          </div>
        </div>

        <!-- Used to display form errors. -->
        <div id="card-errors" role="alert"></div>
      </div>

      <button class="btn btn-success">Donner</button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      amount: 10,
      publishableKey: process.env.MIX_STRIPE_KEY,
    };
  },
  methods: {
    stripeInstance: () => {
      const publishableKey = process.env.MIX_STRIPE_KEY;
      console.log("hello world");
      console.log(publishableKey);
      // Create a Stripe client.
      var stripe = Stripe(publishableKey);

      // Create an instance of Elements.
      var elements = stripe.elements();

      // Custom styling can be passed to options when creating an Element.
      // (Note that this demo uses a wider set of styles than the guide below.)
      var style = {
        base: {
          color: "#32325d",
          fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
          fontSmoothing: "antialiased",
          fontSize: "16px",
          "::placeholder": {
            color: "#aab7c4",
          },
        },
        invalid: {
          color: "#fa755a",
          iconColor: "#fa755a",
        },
      };

      // Create an instance of the card Element.
      var card = elements.create("card", { style: style });

      // Add an instance of the card Element into the `card-element` <div>.
      card.mount("#card-element");

      // Handle real-time validation errors from the card Element.
      card.on("change", function (event) {
        var displayError = document.getElementById("card-errors");
        if (event.error) {
          displayError.textContent = event.error.message;
        } else {
          displayError.textContent = "";
        }
      });

      // Handle form submission.
      var form = document.getElementById("payment-form");
      form.addEventListener("submit", function (event) {
        event.preventDefault();

        stripe.createToken(card).then(function (result) {
          if (result.error) {
            // Inform the user if there was an error.
            var errorElement = document.getElementById("card-errors");
            errorElement.textContent = result.error.message;
          } else {
            // Send the token to your server.
            stripeTokenHandler(result.token);
          }
        });
      });

      // Submit the form with the token ID.
      function stripeTokenHandler(token) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById("payment-form");
        var hiddenInput = document.createElement("input");
        hiddenInput.setAttribute("type", "hidden");
        hiddenInput.setAttribute("name", "stripeToken");
        hiddenInput.setAttribute("value", token.id);
        form.appendChild(hiddenInput);

        // Submit the form
        form.submit();
      }
    },
    donate() {
// Set your secret key. Remember to switch to your live secret key in production!
// See your keys here: https://dashboard.stripe.com/account/apikeys
const stripe = require('stripe')(this.publishableKey);

const paymentIntent = await stripe.paymentIntents.create({
  amount: this.amount,
  currency: 'auto',
  // Verify your integration in this guide by including this parameter
  metadata: {integration_check: 'accept_a_payment'},
});

    }
  },
  mounted() {
    this.stripeInstance();
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