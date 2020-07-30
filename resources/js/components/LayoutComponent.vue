<template>

    <div class="layout">
        <header-component></header-component>

        <div class="layout__content">
            <explication-component></explication-component>
        </div>
        
        <footer-component></footer-component>
    </div>
</template>

<script>
    import ExplicationComponent from './ExplicationComponent';
    import HeaderComponent from './HeaderComponent';
    import FooterComponent from './FooterComponent';

    export default {
        components: {
            HeaderComponent,
            FooterComponent,
            ExplicationComponent
            
        },
        props : {
            title : {
                type: String
            },
            description : {
                type: String
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
    }
</script>