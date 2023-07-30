<template>
  <div id="header" class="bg-body-tertiary">
    <nav class="navbar navbar-expand-lg container">
      <div class="container-fluid">
        <router-link :to="{ name: 'home' }" class="nav-link">
          <img src="https://www.betacinemas.vn/Assets/Common/logo/logo.png" alt="" />
        </router-link>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <router-link :to="{ name: 'home' }" class="nav-link">
                Trang chủ
              </router-link>
            </li>
            <li class="nav-item">
              <router-link :to="{ name: 'schedule' }" class="nav-link">
                Lịch chiếu
              </router-link>
            </li>
            <li class="nav-item">
              <router-link :to="{ name: 'movies' }" class="nav-link">
                Phim
              </router-link>
            </li>
            <li class="nav-item">
              <router-link :to="{ name: 'home' }" class="nav-link">
                Rạp
              </router-link>
            </li>
            <li class="nav-item">
              <router-link :to="{ name: 'home' }" class="nav-link">
                Giá vé
              </router-link>
            </li>
            <li class="nav-item">
              <router-link :to="{ name: 'home' }" class="nav-link">
                Ưu đãi
              </router-link>
            </li>
          </ul>
          <ul v-if="userInfo.length == 0"  class="navbar-nav ">
            <li class="nav-item">
              <router-link :to="{ name: 'login' }" class="nav-link">
                Đăng Nhập
              </router-link>
            </li>
            <li class="nav-item">
              <router-link :to="{ name: 'register' }" class="nav-link">
                Đăng Ký
              </router-link>
            </li>
          </ul>
          <ul v-else class="navbar-nav ">
            <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-user"></i> &nbsp;
                <span>{{ userInfo.fullname }}</span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="#">Thông tin cá nhân</a></li>
                <li><button @click="logout">Đăng xuất</button></li>
              </ul>
            </div>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</template>

<script>
import axios from "axios";
import { storeToRefs } from "pinia";
import { defineComponent, ref } from "vue"; 
import { useRouter } from 'vue-router';
import { SaveInfoLogin } from '../../stores/helper.js'
export default defineComponent({
  setup() {
    const router = useRouter();
    const info =  SaveInfoLogin();

    const getUserInfo = () => {
      axios.get('api/user/info')
        .then((response) => { 
          if (response.status == 200 && response.data.status_code == 200) {
            // user.value = response.data.user;
            info.onLoginUser(response.data.user);
          }
          return response.data.message;
        })
    }
    if (localStorage.getItem("user_token") != null) {
      getUserInfo();
    }


    const logout = () => {
      axios.get('api/user/logout')
        .then((response) => {
          console.log(response);
          if (response.status == 200 && response.data.status_code == 200) {
            localStorage.removeItem('user_token');
            info.onLoginUser([]);
            router.push({ name: 'login' });
            
          } 
        })
    }
    return {
      logout,
      ...storeToRefs(info)
    }
  }
});
</script>

<style></style>