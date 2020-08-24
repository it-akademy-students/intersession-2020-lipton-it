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

        <header-component v-on:childToParent="onChildClick" ></header-component>
        <div class="layout__content">
            <explication-component v-if="page === 'explication'"> </explication-component>
            <donation-component v-on:childToParent="onChildClick" v-if="page === 'donation'"> </donation-component>
            <check-component  v-on:childToParent="onChildClick" v-if="page === 'check'"> </check-component>
        </div>

        <div class="footer"></div>
    </div>
</template>

<script>
    import ExplicationComponent from "./ExplicationComponent";
    import DonationComponent from "./DonationComponent";
    import CheckComponent from "./CheckComponent";

    export default {
        components: {
            ExplicationComponent,
        },
        mounted() {
            console.log("Component mounted.");
        },
        props: {
            myData: {
                type: String,
                défault : 'défault value'
            }
        },
        data () {
            return {
                fromChild: '', // This value is set to the value emitted by the child
                page: 'explication',
                mail: '',
                repo: ''
            }
        },
        methods: {
            // Triggered when `childToParent` event is emitted by the child.
            onChildClick (event) {
                if( event === 'nav') {
                    const { value } = event.target;
                    this.page = value;
                    console.log(this.page);
                } else if ( event === 'mail') {
                    this.repo = event[0];
                    this.mail = event[1];
                }

                
            }
        }




    };
</script>
