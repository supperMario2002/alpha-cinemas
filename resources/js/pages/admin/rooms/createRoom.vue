<template>
  <form @submit.prevent="" :form="admin">
    <a-card title="Thêm phòng mới" style="width: 100%;">
      <div class="row">
        <div class="col-12 col-sm-8">
          <div class="row mb-3">
            <div class="col-12 col-sm-3 text-start text-sm-end mb-1">
              <label>
                <span class="text-danger me-1">*</span>
                <span>Tên Phòng: </span>
              </label>
            </div>
            <div class="col-12 col-sm-5">
              <a-input placeholder="Tên Phòng"  allow-clear />
              <!-- <span v-if="errors.fullname" class="text-danger">{{ errors.fullname[0] }}</span> -->
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-12 col-sm-3 text-start text-sm-end mb-1">
              <label>
                <span class="text-danger me-1">*</span>
                <span>Địa Chỉ: </span>
              </label>
            </div>
            <div class="col-12 col-sm-5">
              <a-input placeholder="Địa chỉ"  allow-clear />
              <!-- <span v-if="errors.email" class="text-danger">{{ errors.email[0] }}</span> -->
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12 d-grid d-sm-flex justify-content-sm-end mx-auto">
          <a-button type="primary" html-type="submit" class="me-0 me-sm-3 mb-3 mb-sm-0">
            <span>Lưu</span>
          </a-button>
          <a-button type="primary">
            <router-link :to="{ name: 'admin-login' }">
              <span>Nhập lại</span>
            </router-link>
          </a-button>
        </div>
      </div>
    </a-card>
  </form>
</template>

<script>
import { useMenu } from '../../../stores/use-menu';
import { defineComponent, reactive, ref, toRef } from 'vue';
import axios from 'axios';
export default {
    setup(){
      const store = useMenu();
      store.onSelectKeys(['admin-rooms']);
    }

}
</script>

<style>

</style>