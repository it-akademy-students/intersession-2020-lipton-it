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
            <check-component  v-if="page === 'check'"> </check-component>
        </div>

        <div class="footer"></div>
    </div>
</template>

<script>
import HeaderComponent from "./HeaderComponent";
import ExplicationComponent from "./ExplicationComponent";
import DonationComponent from "./DonationComponent";
import CheckComponent from "./CheckComponent";

export default {
    components: {
        HeaderComponent,
        ExplicationComponent,
        DonationComponent,
        CheckComponent
    },
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
            boolean: false
        }
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
        }
    }
};
</script>
