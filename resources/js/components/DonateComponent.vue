<template>
    <div>
        <h1  class="layout__title">Donate</h1>
        <!-- <p   class="layout__description">{{ description }}</p> -->
            
        <p>
            If you want to show us your support, you can give a tips there!
        </p>
        <button v-on:click="donateAction" class="btn btn-danger">Donate {{ fruit }}</button>
    </div>
</template>

<script>
    export default {
        methods: {
            donateAction: (event)=>{
                console.log('ITS OK');
            }
        },
        fruit: "banane"
    };
</script>