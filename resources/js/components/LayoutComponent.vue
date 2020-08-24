<template>
    <div class="layout">
        <header-component v-on:childToParent="onChildClick" ></header-component>

        <div class="layout__content">
            <explication-component v-if="page === 'explication'"> </explication-component>
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
            myData: {
                type: String,
                défault : 'défault value'
            }
        },
        data () {
            return {
                fromChild: '', // This value is set to the value emitted by the child
                page: 'explication'
            }
        },
        methods: {
            // Triggered when `childToParent` event is emitted by the child.
            onChildClick (event) {
                const { value } = event.target;
                this.page = value;
                console.log(this.page);
            }
        }




    };
</script>
