<template>
    <div>
        <h1  class="layout__title">Scan repo</h1>
        <p   class="layout__description">Veuillez renseigner l'url de votre repo <span>public</span> ainsi que votre adresse mail. Vous recevrez un mail d'ici quelques minutes avec l'analyse complète de vos fichiers <span>PHP</span>.</p>

        <form action="javascript: void(0)" class="column" method="POST">
            <div class="column form__input">
                <label for="repo" class="form__label">Lien de votre repo :</label>
                <input name="repo" type="url" placeholder="https://github.com/nom/projet" class="form__input-text" v-model="repositoryInput">
            </div>

            <div class="column form__input">
                <label for="repo" class="form__label">Mail :</label>
                <input name="repo" type="email" placeholder="bobby@shinoni.com" class="form__input-text" v-model="mailInput">
            </div>
            <div class="form__validation">
                <div class="form__message-validation">
                    <p>En validant ce formulaire vous acceptez recevoir des mails de notre part et vous nous autorisez à accéder à votre repo</p>
                </div>
                <input class="form__submit" type="submit" name="button" value="Scanner" v-on:click="emitToParent">
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
                repositoryInput : 'https://github.com/methbkts/cheesy-dex',
                mailInput : 'a@a.com',
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
            emitToParent (event) {
                localStorage.repo = this.repositoryInput;
                localStorage.mail = this.mailInput;

                var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

                if(re.test(this.mailInput)){
                    this.validation();
                }
            },

            validation() {
                if (document.querySelector('.form__message-validation').classList.contains('scale-in-hor-left')) {

                    if (this.repositoryInput.startsWith('https://github.com/') || this.repositoryInput.startsWith('https://gitlab.com/')) {
                        const words = this.repositoryInput.split('/');
                        this.repositoryInput = words.slice(0, 5).join('/')
                        this.$emit('childToParent', [this.repositoryInput, this.mailInput]);

                        document.querySelector('.form__message-validation').classList.remove('scale-in-hor-left')

                        this.syncrepo()
                        this.$parent.notification(true, "En cours de traitement")

                    } else {
                        this.$parent.notification(false, "mauvais lien")
                    }

                } else {
                    document.querySelector('.form__message-validation').classList.add('scale-in-hor-left')
                }
            },
            async syncrepo() {
            let cardHolderName = this.cardHolderName;
            axios
                .post("/api/syncRepo", {
                    repo: this.repositoryInput,
                    mail: this.mailInput
                })
                .then((response) => {
                    console.log(response);
                })
                .catch((error) => {
                });
            }
        }
    };
</script>
