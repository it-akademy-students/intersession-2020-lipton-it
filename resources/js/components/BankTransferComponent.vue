<template>
  <div>
    <form action="/charge" method="post" id="payment-form">
      <div class="form-row inline">
        <div class="col-2 d-flex flex-column">
          <label for="amount">Montant</label>
          <input
            id="amount" class="StripeElement"
            name="amount"
            placeholder="Combien souhaitez vous donner ?"
            required
            v-model="amount"
          />
        </div>
        <div class="col-5 d-flex flex-column">
          <label for="name">Votre nom</label>
          <input id="name" name="name" placeholder="John Doe" required />
        </div>
        <div class="col-5 d-flex flex-column">
          <label for="email">Adresse e-mail</label>
          <input id="email" name="email" type="email" placeholder="john.doe@exemple.com" required />
        </div>
      </div>

      <div class="form-row">
        <label for="iban-element">IBAN</label>
        <div id="iban-element">
          <!-- A Stripe Element will be inserted here. -->
        </div>
      </div>
      <div id="bank-name"></div>

      <button class="btn btn-success">Donner</button>
      <!-- Used to display form errors. -->
      <div id="error-message" role="alert"></div>

      <!-- Display mandate acceptance text. -->
      <div id="mandate-acceptance">
        By providing your IBAN and confirming this payment, you authorise
        (A) Rocketship Inc.
        and Stripe, our payment service provider, to send instructions to your bank to
        debit your account and (B) your bank to debit your account in accordance with
        those instructions. You are entitled to a refund from your bank under the terms
        and conditions of your agreement with your bank. A refund must be claimed
        within 8 weeks starting from the date on which your account was debited.
      </div>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      amount: 10,
    };
  },
  methods: {
    stripeInstance: () => {
      // Create a Stripe client.
      // Note: this merchant has been set up for demo purposes.
      var stripe = Stripe("pk_test_6pRNASCoBOKtIshFeQd4XMUh");

      // Create an instance of Elements.
      var elements = stripe.elements();

      // Custom styling can be passed to options when creating an Element.
      // (Note that this demo uses a wider set of styles than the guide below.)
      var style = {
        base: {
          color: "#32325d",
          fontFamily:
            '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif',
          fontSmoothing: "antialiased",
          fontSize: "16px",
          "::placeholder": {
            color: "#aab7c4",
          },
          ":-webkit-autofill": {
            color: "#32325d",
          },
        },
        invalid: {
          color: "#fa755a",
          iconColor: "#fa755a",
          ":-webkit-autofill": {
            color: "#fa755a",
          },
        },
      };
      // Create an instance of the iban Element.
      var iban = elements.create("iban", {
        style: style,
        supportedCountries: ["SEPA"],
      });

      // Add an instance of the iban Element into the `iban-element` <div>.
      iban.mount("#iban-element");

      var errorMessage = document.getElementById("error-message");
      var bankName = document.getElementById("bank-name");

      iban.on("change", function (event) {
        // Handle real-time validation errors from the iban Element.
        if (event.error) {
          errorMessage.textContent = event.error.message;
          errorMessage.classList.add("visible");
        } else {
          errorMessage.classList.remove("visible");
        }

        // Display bank name corresponding to IBAN, if available.
        if (event.bankName) {
          bankName.textContent = event.bankName;
          bankName.classList.add("visible");
        } else {
          bankName.classList.remove("visible");
        }
      });

      // Handle form submission.
      var form = document.getElementById("payment-form");
      form.addEventListener("submit", function (event) {
        event.preventDefault();
        showLoading();

        var sourceData = {
          type: "sepa_debit",
          currency: "eur",
          owner: {
            name: document.querySelector('input[name="name"]').value,
            email: document.querySelector('input[name="email"]').value,
          },
          mandate: {
            // Automatically send a mandate notification email to your customer
            // once the source is charged.
            notification_method: "email",
          },
        };

        // Call `stripe.createSource` with the iban Element and additional options.
        stripe.createSource(iban, sourceData).then(function (result) {
          if (result.error) {
            // Inform the customer that there was an error.
            errorMessage.textContent = result.error.message;
            errorMessage.classList.add("visible");
            stopLoading();
          } else {
            // Send the Source to your server to create a charge.
            errorMessage.classList.remove("visible");
            stripeSourceHandler(result.source);
          }
        });
      });
    },
  },
  mounted() {
    this.stripeInstance();
  },
};
</script>

<style scoped>
/**
* The CSS shown here will not be introduced in the Quickstart guide, but
* shows how you can use CSS to style your Element's container.
*/
input,
.StripeElement {
  height: 40px;

  color: #32325d;
  background-color: white;
  border: 1px solid transparent;
  border-radius: 4px;

  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}

input {
  padding: 10px 12px;
}

input:focus,
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