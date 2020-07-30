<template>
    <div class="layout">
        <header-component></header-component>

        <div class="layout__content">
            <explication-component v-if="page === 'explication'"> </explication-component>
            <donate-component></donate-component>
            <!-- {{ page }} -->
        </div>

        <footer-component></footer-component>
    </div>
</template>

<script>
    import ExplicationComponent from "./ExplicationComponent";
    import DonateComponent from "./DonateComponent";
    import HeaderComponent from "./HeaderComponent";
    import FooterComponent from "./FooterComponent";

    export default {
        components: {
            HeaderComponent,
            FooterComponent,
            ExplicationComponent,
            DonateComponent,
        },
        mounted() {
            console.log("Component mounted.");
        },
        props: {
            page: {
                type: String,
                default: 'explication',
            },
        }
    };
</script>
