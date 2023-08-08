<template>
  <div id="book-ticket" class="container">
    <div class="container-fluid">
      <div class="seat">
        <TheBreadcrumb /> 
        <TheSeat />
      </div>
    </div>
  </div>
</template>

<script>
import TheBreadcrumb from '../../components/client/TheBreadcrumb.vue';
import TheSeat from '../../components/client/TheSeat.vue';
export default {
  components: { TheBreadcrumb, TheSeat},

}
</script>

<style>

</style>