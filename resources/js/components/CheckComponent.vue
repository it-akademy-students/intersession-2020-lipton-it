<template>
    <div>
        <h1  class="layout__title">Check repo</h1>
        <p   class="layout__description">Vous pouvez soutenir le projet et l’équipe de développeur en faisant un don via paypal</p>

        <form action="javascript: void(0)" class="column" method="POST">
            <div class="column form__input">
                <label for="repo" class="form__label">Link repository :</label>
                <input name="repo" type="url" placeholder="repo link" class="form__input-text" v-model="repositoryInput">
            </div>

            <div class="column form__input">
                <label for="repo" class="form__label">Mail :</label>
                <input name="repo" type="email" placeholder="repo link" class="form__input-text" v-model="mailInput">
            </div>
            <div class="form__validation">
                <div class="form__message-validation">
                    <p> si vous valider ce message, vous accepter que votre mail sois sauvegarder dans nos cookies, envoyer quand même ?</p>
                </div>
                <input class="form__submit" type="submit" name="button" value="Send" v-on:click="emitToParent">
            </div>
        </form>

    </div>
</template>

<script>
    export default {
         data() {
            return {
                repositoryInput: localStorage.repo,
                mailInput: localStorage.mail,
                // repositoryInput : 'https://github.com/methbkts/cheesy-dex',
                // mailInput : 'a@a.com',
                publishableKey: process.env.MIX_STRIPE_KEY,
            }
        },
        mounted() {
            localStorage.page = 'check'
        },
        computed: {
            stripe: function () {
            const stripe = Stripe(this.publishableKey);
            return stripe;
            }
        },
        methods: {
            // Define the method that emits data to the parent as the first parameter to $emit().
            // This is referenced in the <template> call in the parent. The second parameter is the payload.

            emitToParent (event) {
                localStorage.repo = this.repositoryInput;
                localStorage.mail = this.mailInput;

                var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                var pattern = new RegExp(   '^(https?:\\/\\/)?'+ // protocol
                                            '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|'+ // domain name
                                            '((\\d{1,3}\\.){3}\\d{1,3}))'+ // OR ip (v4) address
                                            '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // port and path
                                            '(\\?[;&a-z\\d%_.~+=-]*)?'+ // query string
                                            '(\\#[-a-z\\d_]*)?$','i'); // fragment locator

                if(re.test(this.mailInput) && pattern.test(this.repositoryInput)){
                    // this.$emit('childToParent', [this.repositoryInput, this.mailInput]);
                    this.syncrepo()
                    this.validation();
                } else {
                    this.validation();
                    // this.$parent.notification(false, "error")
                }
            },

            validation() {
                if (document.querySelector('.form__message-validation').classList.contains('scale-in-hor-left')) {
                    this.$emit('childToParent', [this.repositoryInput, this.mailInput]);
                    document.querySelector('.form__message-validation').classList.remove('scale-in-hor-left')
                    this.$parent.notification(true, "message")
                } else {
                    this.$parent.notification(false, "message 2")
                    document.querySelector('.form__message-validation').classList.add('scale-in-hor-left')
                }
            },
            async syncrepo() {
            let cardHolderName = this.cardHolderName;
            // let stripe = this.stripe;

            // const { syncRepoMethod, error } = await stripe.createSyncRepoMethod({
            //     repo: event[0]
            // });

            // if (error) {
            //     alert("Désolé, le lien de votre repository n'est pas valide: " + error.message);
            //     return;
            // }
            // let token = stripe.createToken(cardElement);
            axios
                .post("/api/syncRepo", {
                    repo: this.repositoryInput,
                    mail: this.mailInput
                    // syncRepoMethod: syncRepoMethod.id
                })
                .then((response) => {
                    // alert("Votre lien a bien été récupéré");
                    // window.location.reload();
                    console.log(response);
                })
                .catch((error) => {
                    // alert("Une erreur est survenue :" + error);
                });
            }
        }
    };
</script>
