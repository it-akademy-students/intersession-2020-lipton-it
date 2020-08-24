<template>
    <div>
        <h1  class="layout__title">Check repo</h1>
        <p   class="layout__description">Vous pouvez soutenir le projet et l’équipe de développeur en faisant un don via paypal</p>

        <div class="column">
            <div class="column form__input">
                <label for="repo" class="form__label">Link repository :</label>
                <input name="repo" type="text" placeholder="repo link" class="form__input-text" v-model="repositoryInput">
            </div>

            <div class="column form__input">
                <label for="repo" class="form__label">Mail :</label>
                <input name="repo" type="email" placeholder="repo link" class="form__input-text" v-model="mailInput">
            </div>

            <button type="button" name="button" v-on:click="emitToParent">Click!</button>

            <!-- <label for="child-input">Child input: </label>
            <input id="child-input" type="text" name="msg"  v-model="childMessage"> -->
        </div>

    </div>
</template>

<script>
    export default {
         data() {
            return {
                repositoryInput: '',
                mailInput: ''
            }
        },
        methods: {
            // Define the method that emits data to the parent as the first parameter to $emit().
            // This is referenced in the <template> call in the parent. The second parameter is the payload.
            emitToParent (event) {
            this.$emit('childToParent', [this.repositoryInput, this.mailInput])
            }
        }
    };
</script>
