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
          <ul class="navbar-nav ">
            <li class="nav-item">
              <router-link :to="{ name: 'Login' }" class="nav-link">
                Đăng Nhập
              </router-link>
            </li>
            <li class="nav-item">
              <router-link :to="{ name: 'SignIn' }" class="nav-link">
                Đăng Ký
              </router-link>
            </li>
          </ul>
          <ul class="navbar-nav d-none">
            <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-user"></i> &nbsp;
                <span>Quang Vinh</span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><a class="dropdown-item" href="#">Log out</a></li>
              </ul>
            </div>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</template>

<script>
export default {
  setup() {

  }
};
</script>

<style></style>