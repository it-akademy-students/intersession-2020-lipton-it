<template>
    <div class="header">
        <div class="header__list">
            <button v-on:click="(event) => this.$emit('childToParent', event)" value='check' type="button" class="header__item">check</button>
            <button v-on:click="(event) => this.$emit('childToParent', event)" value='donation' type="button" class="header__item">donation</button>
            <button type="button" class="header__item">source code</button>
            <button v-on:click="(event) => this.$emit('childToParent', event)" value='explication' type="button" class="header__item">explication</button>
        </div>
    </div>
</template>

<script>
    export default {
        methods: {
            emitToParent (value) {
                this.$emit('childToParent', value)
            }
        }
    }
</script>
