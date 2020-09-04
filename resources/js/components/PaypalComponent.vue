<template>
  <div>
    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
      <input type="hidden" name="cmd" value="_s-xclick" />
      <input type="hidden" name="hosted_button_id" value="3HWVZBFT59TLN" />
      <input
        type="image"
        src="https://cdn.iconscout.com/icon/free/png-256/paypal-54-675727.png"
        border="0"
        name="submit"
        class="form__submit--paypal"
        title="PayPal - The safer, easier way to pay online!"
        alt="Bouton Faites un don avec PayPal"
        height="180"
      />
      <img alt border="0" src="https://www.paypal.com/fr_FR/i/scr/pixel.gif" width="1" height="1" />
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {};
  },
  methods: {},
};
</script>

<style scoped>
</style>