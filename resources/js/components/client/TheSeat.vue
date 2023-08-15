<template>
  <div class="seat col-lg-8 col-12">
    <h4 class="color-changing-bg mb-5">Theo quy định của cục điện ảnh, phim này không dành cho khán giả dưới 13 tuổi.</h4>
    <div id="seat my-3">
      <div class="row">
        <div class="seat-def col-1 d-flex flex-column" v-for="seat in seats" :key="seat.id" v-bind:id="seat.id"
          @click="handleSeat(seat.id)">
          <i class="fa-solid fa-chair fs-4 " v-if="seat.type_seat == 'thuong'"></i>
          <i class="fa-solid fa-couch fs-5 " v-else></i>
          <span>{{ seat.name }}</span>
        </div>
      </div>
    </div>
  </div>
  <div class="movie-info col-lg-4 col-12 p-5">
    <div class="row">
      <div class="col-6"><img :src="movieBooking.img" alt="" style="width: 100%;">
      </div>
      <div class="col-6">
        <h2 class="color-default">{{ movieBooking.name }}</h2>
        <h5 class="mt-3">2D Phụ Đề</h5>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-6"><i class="fa-solid fa-tag"></i> Thể Loại</div>
      <div class="col-6"><span>B11</span></div>
    </div>
    <div class="row mt-3">
      <div class="col-6"><i class="fa-solid fa-clock"></i> Thời Lượng</div>
      <div class="col-6"><span>{{ movieBooking.running_time }} Phút</span></div>
    </div>
    <hr class="border-dashed border-top-2" style="margin-top: 5px; margin-bottom: 5px;">
    <div class="row mt-3">
      <div class="col-6"><i class="fa fa-institution"></i> Rạp Chiếu</div>
      <div class="col-6"><span>ALPHA</span></div>
    </div>
    <div class="row mt-3">
      <div class="col-6"><i class="fa-regular fa-calendar"></i> Ngày Chiếu</div>
      <div class="col-6">
        <template v-for="schedule in movieBooking.schedules" :key="schedule.id">
          <span v-if="schedule.id == timeId">{{ schedule.date }}</span>
        </template>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-6"><i class="fa-regular fa-clock"></i> Giờ Chiếu</div>
      <div class="col-6">
        <template v-for="schedule in movieBooking.schedules" :key="schedule.id">
          <span v-if="schedule.id == timeId">{{ schedule.time }}</span>
        </template>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-6"><i class="fa fa-desktop"></i> Phòng Chiếu</div>
      <div class="col-6">
        <template v-for="schedule in movieBooking.schedules" :key="schedule.id">
          <span v-if="schedule.id == timeId">{{ schedule.room.name }}</span>
        </template>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-6"><i class="fa fa-cubes"></i> Ghế Ngồi</div>
      <div class="col-6" id="seatClick"><template v-for="(value, index) in listSeat" :key="index"><template v-if="index > 0">,</template>{{ " " + value.value }}</template></div>
    </div>
    <div class="mt-3 text-center">
      <a href="#" class="btn btn-2 text-white fs-5 w-50"> Tiếp tục</a>
    </div>
  </div>
</template>

<script>
import { ref } from 'vue';
import axios from 'axios';
import { useRoute } from 'vue-router';
export default {
  props: {
    movieBooking: Object
  },
  setup(props) {
    const route = useRoute()
    const timeId = route.params.timeId
    const seats = ref([])
    const listSeat = ref([]);
    const getSeats = () => axios.get('/api/client/movie/seat')
      .then((reponse) => {
        seats.value = reponse.data.listSeat;
      })
      getSeats()
    const handleSeat = (id) => {
      const clickedSeat = document.getElementById(id);
      const index = listSeat.value.findIndex(item => item.key == id); 
      
      if (index != -1) {
        listSeat.value.splice(index, 1);
      } else {
        listSeat.value.push({ key: id, value: clickedSeat.textContent })
      } 
      clickedSeat.querySelector('i').classList.toggle('color-default')
      clickedSeat.querySelector('span').classList.toggle('color-default')
    } 


    return {
      seats,
      timeId,
      listSeat,
      handleSeat,
    }
  }
}
</script>

<style></style>