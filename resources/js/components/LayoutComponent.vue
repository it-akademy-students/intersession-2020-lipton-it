<template>
    <div class="layout">
        <!-- <div class="header">
            <div class="header__list">
                <button class="header__item">check</button>
                <button class="header__item">donation</button>
                <button class="header__item">source code</button>
                <button class="header__item">explication</button>
            </div>
        </div> -->

        <header-component v-on:childToParent="navClick" ></header-component>
        <div class="layout__content">
            <explication-component v-if="page === 'explication'"> </explication-component>
            <donation-component  v-if="page === 'donation'"> </donation-component>
            <!-- <check-component v-on:childToParent="syncrepo" v-if="page === 'check'"> </check-component> -->
            <check-component v-if="page === 'check'"> </check-component>
        </div>

        <div class="footer"></div>
    </div>
</template>

<script>
import HeaderComponent from "./HeaderComponent";
import ExplicationComponent from "./ExplicationComponent";
import DonationComponent from "./DonationComponent";
import CheckComponent from "./CheckComponent";
import CreditCardComponent from "./CreditCardComponent";


export default {
    components: {
        HeaderComponent,
        ExplicationComponent,
        DonationComponent,
        CheckComponent
    },
    //   computed: {
    //     stripe: function () {
    //     const stripe = Stripe(this.publishableKey);
    //     return stripe;
    //     }//,
    //     // cardElement: function () {
    //     // const elements = this.stripe.elements();
    //     // let cardElement = elements.create("card", {
    //     //     hidePostalCode: true,
    //     // });
    //     // return cardElement;
    //     // },
    // },
    mounted() {
        if (localStorage.page) {
            this.page = localStorage.page;
        } else {
            this.page = "explication";
        }
        if (localStorage.mail) this.mail = localStorage.mail;
        if (localStorage.repo) this.repo = localStorage.repo;
    },
    data () {
        return {
            fromChild: '', // This value is set to the value emitted by the child
            page: localStorage.page,
            mail: '',
            repo: '',
            boolean: false,

        };
    },
    methods: {
        // Triggered when `childToParent` event is emitted by the child.
        navClick (event) {
            const { value } = event.target;
            this.page = value;
        },
        mailClick(event) {
            this.repo = event[0];
            this.mail = event[1];
            // this.syncrepo(this.repo);
        },
        // async syncrepo(event) {
        // // let cardHolderName = this.cardHolderName;
        // let stripe = this.stripe;

        // const { syncRepoMethod, error } = await stripe.createSyncRepoMethod({
        //     repo: event[0]
        // });

        // if (error) {
        //     alert("Désolé, le lien de votre repository n'est pas valide: " + error.message);
        //     return;
        // }
        // let token = stripe.createToken(cardElement);
        // axios
        //     .post("/api/syncRepo", {
        //         repo: event[0],
        //         syncRepoMethod: syncRepoMethod.id
        //     })
        //     .then((response) => {
        //         alert("Votre lien a bien été récupéré");
        //         window.location.reload();
        //     })
        //     .catch((error) => {
        //         alert("Une erreur est survenue :" + error); 
        //     });
        // }
    }
};
</script>
