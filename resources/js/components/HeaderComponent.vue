<template>
    <div class="header">
        <div class="header__list">
            <button v-on:click="(event) => this.$emit('childToParent', event)" value='check' type="button" class="header__item">check</button>
            <button v-on:click="(event) => this.$emit('childToParent', event)" value='donation' type="button" class="header__item">donation</button>
            <a :href="prop3"  class="header__item disabled" :class="{ 'bounce-top' : prop3}" :disabled="!prop3 || '' == prop3">source code</a>
            <button v-on:click="(event) => this.$emit('childToParent', event)" value='explication' type="button" class="header__item">explication</button>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            prop3: {
                type: String
            },
        },
          data: function () {
            return {
                value: 0
            };
        },
        methods: {
            emitToParent (value) {
                this.$emit('childToParent', value)
            }
        }
        // computed: {
        //     prop3: function() {
        //         if (this.prop3 === true) {
        //             console.log('camembers');
        //             return true
        //         }
        //     }
        // }
    }
</script>
