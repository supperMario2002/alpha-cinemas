<template>
  <div id="book-ticket" class="container">
    <div class="container-fluid">
      <TheBreadcrumb />
      <div class="row">
        <TheSeat :movieBooking="movie"/>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import { useRoute } from 'vue-router';
import TheBreadcrumb from '../../components/client/TheBreadcrumb.vue';
import TheSeat from '../../components/client/TheSeat.vue';
import { reactive } from 'vue';
export default {
  components: { TheBreadcrumb, TheSeat },
  setup() {
    const route = useRoute()
    const movie = reactive({})
    const getMovieBook = () => axios.get(`/api/client/movie/${route.params.id}/show`)
        .then((responsive) => {
          // console.log(responsive);
          movie.value = responsive.data
        })

    getMovieBook()

    return {
      movie
    }
  }
}
</script>

<style></style>