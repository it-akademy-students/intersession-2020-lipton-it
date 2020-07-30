<template>
    <div class="layout">
        <header-component></header-component>

        <div class="layout__content">
            <explication-component v-if="page === 'explication'"> </explication-component>
            <!-- {{ page }} -->
        </div>

        <footer-component></footer-component>
    </div>
</template>

<script>
    import ExplicationComponent from "./ExplicationComponent";
    import HeaderComponent from "./HeaderComponent";
    import FooterComponent from "./FooterComponent";

    export default {
        components: {
            HeaderComponent,
            FooterComponent,
            ExplicationComponent
        },
        mounted() {
            console.log("Component mounted.");
        },
        props: {
            page: {
                type: String,
                default: 'explication',
            },
        },
    };
</script>
