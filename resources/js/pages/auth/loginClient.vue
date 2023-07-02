<template>
  <div id="login-client">
    <the-header />
    <the-login />
    <the-footer />
  </div>
</template>

<script>
import TheFooter from '../../components/client/TheFooter.vue'
import TheHeader from '../../components/client/TheHeader.vue'
import TheLogin from '../../components/client/TheLogin.vue'
export default {
  components: { TheHeader, TheFooter, TheLogin },

}
</script>

<style>

</style>