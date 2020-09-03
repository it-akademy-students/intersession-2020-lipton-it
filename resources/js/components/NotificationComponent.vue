<template>
    <div class="notification">
        <div class="notification__content">
            <img :src="!notifType ? '/images/error.png' : '/images/validate.png'" height="50" width="50">
            <p class="notification__message">{{ message }}</p>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            message: {
                type: String
            },
            notifType: {
                type: Boolean
            }
        },
        data: function () {
            return {
                value: 0
            };
        },
        methods: {

        },
        mounted() {

        }
    }
</script>
