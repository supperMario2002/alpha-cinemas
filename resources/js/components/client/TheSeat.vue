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

      <div class="row mt-5">
        <div class="w-100 title-info mb-4"><i class="fa-regular fa-circle-user mx-3"></i>THÔNG TIN THANH TOÁN</div>
        <div class="col-4">
          <span>Họ và Tên: </span>
          <p>{{ userInfo.fullname }}</p>
        </div>
        <div class="col-4">
          <span>Số điện thoại: </span>
          <p>{{ userInfo.phone }}</p>
        </div>
        <div class="col-4">
          <span>Email: </span>
          <p>{{ userInfo.email }}</p>
        </div>
      </div>

      <div class="row mt-2">
        <div class="col-12">
          <div class="row">
            <div class="col-6">
              <h4>Ghế Vip</h4>
            </div>
            <div class="col-3"><span>1 x 45.000 </span></div>
            <div class="col-3 text-end"><span>= 45.000 vnđ</span></div>
          </div>
        </div>
        <div class="col-12">
          <div class="row">
            <div class="col-6">
              <h4>Ghế thường</h4>
            </div>
            <div class="col-3"><span>1 x 40.000 </span></div>
            <div class="col-3 text-end"><span>= 40.000 vnđ</span></div>
          </div>
        </div>
      </div>

      <div class="row mt-2">
        <div class="w-100 title-info mb-4"><i class="fa-solid fa-ticket mx-3"></i>GIẢM GIÁ</div>
        <div class="col-12">
          <div class="row">
            <div class="col-6">
              <span>Nhập mã giảm:</span>
              <p>Đây là ô nhập mã giảm giá</p>
            </div>
            <div class="col-3">
              <p>Đề tạm</p>
            </div>
            <div class="col-3">
              <p class="text-end">- 13.000 vnđ</p>
            </div>
          </div>
        </div>
        <div class="col-12">
          <div class="row">
            <div class="col-6">
              <span>Điểm hiện có:</span>
              <p>100</p>
            </div>
            <div class="col-3">
              <span>Nhập điểm:</span>
              <p>Đây là ô nhập điểm</p>
            </div>
            <div class="col-3">
              <p class="text-end">- 13.000 vnđ</p>
            </div>
          </div>
        </div>
      </div>

      <div class="row mt-2">
        <div class="col-6"></div>
        <div class="col-6">
          <div class="row">
            <div class="col-6"><span>Tổng tiền:</span></div>
            <div class="col-6 text-end">20.000.000 vnđ</div>
          </div>
          <div class="row">
            <div class="col-6"><span>Số tiền được giảm:</span></div>
            <div class="col-6  text-end">-0 vnđ</div>
          </div>
          <div class="row">
            <div class="col-6"><span>Số tiền cần thanh toán:</span></div>
            <div class="col-6 text-end">20.000.000 vnđ</div>
          </div>
        </div>
      </div>

      <div class="row mt-2">
        <div class="w-100 title-info mb-4 col-12"><i class="fa-solid fa-credit-card mx-3"></i>CHỌN THẺ THANH TOÁN</div>
        <div class="col-12">
          <a-radio-group v-model:value="card" class="row ">
          <a-radio :value="1" class="col-md-2">Thẻ ngân hàng</a-radio>
          <a-radio :value="2" class="col-md-2">Mono</a-radio>
          <a-radio :value="3" class="col-md-2">..</a-radio>
          <a-radio :value="4" class="col-md-2">...</a-radio>
        </a-radio-group>
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
      <div class="col-6" id="seatClick"><template v-for="(value, index) in listSeat" :key="index"><template
            v-if="index > 0">,</template>{{ " " + value.value }}</template></div>
    </div>
    <div class="mt-3 text-center">
      <a href="#" class="btn btn-2 text-white fs-5 w-50" @click="ContinuetoPaymentinfo(listSeat, card)"> Tiếp tục</a>
    </div>
  </div>
</template>

<script>
import { reactive, ref } from 'vue';
import axios from 'axios';
import { useRoute } from 'vue-router';
import { SaveInfoLogin } from '../../stores/helper';
import { storeToRefs } from 'pinia';
export default {
  props: {
    movieBooking: Object
  },
  setup(props) {
    const route = useRoute()
    const timeId = route.params.timeId
    const seats = ref([])
    const listSeat = ref([]);
    const info = SaveInfoLogin();
    const card = ref(1);


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

    const ContinuetoPaymentinfo = (data, card) => {
      if (data.length > 0 ) {
        console.log(data.length);
        console.log(card);
      }
    }

    return {
      seats,
      timeId,
      listSeat,
      info,
      card,
      handleSeat,
      ContinuetoPaymentinfo,
      ...storeToRefs(info)
    }
  }
}
</script>

<style>
.title-info {
  font-size: 25px;
}
</style>