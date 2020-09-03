<template>
    <div class="layout">
        <header-component v-on:childToParent="navClick" :prop3="repo"></header-component>
        <div class="layout__content" :class="{ 'layout__notification--active' : notifMessage}">
            <notification-component :message="notifMessage" :notifType="notifType"></notification-component>
            <explication-component v-if="page === 'explication'"> </explication-component>
            <donation-component  v-if="page === 'donation'"> </donation-component>
            <check-component v-on:childToParent="mailClick" v-if="page === 'check'"> </check-component>
        </div>

        <div class="footer"></div>
    </div>
</template>

<script>
import NotificationComponent from "./NotificationComponent";
import HeaderComponent from "./HeaderComponent";
import ExplicationComponent from "./ExplicationComponent";
import DonationComponent from "./DonationComponent";
import CheckComponent from "./CheckComponent";
import CreditCardComponent from "./CreditCardComponent";

export default {
    components: {
        NotificationComponent,
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
        // if (localStorage.mail) this.mail = localStorage.mail;
        // if (localStorage.repo) this.repo = localStorage.repo;
    },

    data() {
        return {
            fromChild: "", // This value is set to the value emitted by the child
            page: localStorage.page,
            mail: "",
            repo: "",
            boolean: false,
            notifMessage: "",
            notifType: "",
        };
    },
    methods: {
        // Triggered when `childToParent` event is emitted by the child.
        navClick(event) {
            // this.notification(true, "message")
            var x = document.querySelectorAll('.header__item');
            x.forEach(element => {
                element.classList.remove('header__item--active')
            });
            event.target.classList.add('header__item--active');
            const { value } = event.target;
            this.page = value;
        },
        mailClick(event) {
            this.repo = event[0];
            this.mail = event[1];
        },
        notification(type, message) {
            document.querySelector('.layout__content').classList.remove('layout__notification--active')

            this.notifMessage = message;
            this.notifType = type;

            setTimeout(function(){
                document.querySelector('.layout__content').classList.add('layout__notification--active')
            }, 0);

        }
    }
};
</script>
