<template>
  <form @submit.prevent="createAdmin" :form="admin">
    <a-card title="Tạo mới tài khoản" style="width: 100%;">
      <div class="row">
        <div class="col-12 col-sm-4">
          <div class="row">
            <div class="col-12 d-flex justify-content-center mb-3">
              <a-avatar shape="square" :size="200">
                <template #icon>
                  <UserOutlined />
                </template>
              </a-avatar>
            </div>
            <div class="col-12 d-flex justify-content-center">
              <label class="custom-file-upload primary-color bg-info">
                <input type="file" @change="handleFileUpload"/>
                <i class="fa fa-cloud-upload"></i> Thêm Ảnh
              </label>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-8">
          <div class="row mb-3">
            <div class="col-12 col-sm-3 text-start text-sm-end mb-1">
              <label>
                <span class="text-danger me-1">*</span>
                <span>Họ và tên: </span>
              </label>
            </div>
            <div class="col-12 col-sm-5">
              <a-input placeholder="Họ và tên" v-model:value="admin.fullname" allow-clear />
              <span v-if="errors.fullname" class="text-danger">{{ errors.fullname[0] }}</span>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-12 col-sm-3 text-start text-sm-end mb-1">
              <label>
                <span class="text-danger me-1">*</span>
                <span>Email: </span>
              </label>
            </div>
            <div class="col-12 col-sm-5">
              <a-input placeholder="Email" v-model:value="admin.email" allow-clear />
              <span v-if="errors.email" class="text-danger">{{ errors.email[0] }}</span>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-12 col-sm-3 text-start text-sm-end mb-1">
              <label>
                <span class="text-danger me-1">*</span>
                <span>Mật khẩu: </span>
              </label>
            </div>
            <div class="col-12 col-sm-5">
              <a-input-password placeholder="Mật khẩu" v-model:value="admin.password" />
              <span v-if="errors.password" class="text-danger">{{ errors.password[0] }}</span>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-12 col-sm-3 text-start text-sm-end mb-1">
              <label>
                <span class="text-danger me-1">*</span>
                <span>Xác nhận mật khẩu: </span>
              </label>
            </div>
            <div class="col-12 col-sm-5">
              <a-input-password placeholder="Xác nhận mật khẩu" v-model:value="admin.password_confinmation" />
              <span v-if="errors.password_confinmation" class="text-danger">{{ errors.password_confinmation[0] }}</span>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-12 col-sm-3 text-start text-sm-end mb-1">
              <label>
                <span class="text-danger me-1">*</span>
                <span>Số điện thoại: </span>
              </label>
            </div>
            <div class="col-12 col-sm-5">
              <a-input placeholder="Nhập số điện thoại" v-model:value="admin.phone" />
              <span v-if="errors.phone" class="text-danger">{{ errors.phone[0] }}</span>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-12 col-sm-3 text-start text-sm-end mb-1">
              <label>
                <span class="text-danger me-1">*</span>
                <span>Giới tính: </span>
              </label>
            </div>
            <div class="col-12 col-sm-5">
              <a-radio-group v-model:value="admin.gender">
                <a-radio :value="0">Nam</a-radio>
                <a-radio :value="1">Nữ</a-radio>
              </a-radio-group>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-12 col-sm-3 text-start text-sm-end mb-1">
              <label>
                <span class="text-danger me-1">*</span>
                <span>Ngày sinh: </span>
              </label>
            </div>
            <div class="col-12 col-sm-5">
              <a-space direction="vertical" :size="12">
                <a-date-picker v-model:value="admin.birthday" :format="dateFormatList" />
                <span v-if="errors.dateFormatList" class="text-danger">{{ errors.dateFormatList[0] }}</span>
              </a-space>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12 d-grid d-sm-flex justify-content-sm-end mx-auto">
          <a-button type="primary" html-type="submit" class="me-0 me-sm-3 mb-3 mb-sm-0">
            <span>Đăng ký</span>
          </a-button>
          <a-button type="primary">
            <router-link :to="{ name: 'admin-login' }">
              <span>Đăng nhập</span>
            </router-link>
          </a-button>
        </div>
      </div>
    </a-card>
  </form>
</template>
  
<script>
import dayjs from 'dayjs';
import { useMenu } from '../../../stores/use-menu';
import { defineComponent, reactive, ref, toRef, computed  } from 'vue';
import axios from 'axios';
export default defineComponent({

  setup() {
    const store = useMenu();
    store.onSelectKeys(['admin-create']);

    const dateFormatList = 'DD/MM/YYYY';

    const file =  ref(null);

    const errors = ref({});

    const admin = reactive({
      fullname: '',
      email: '',
      password: '',
      password_confinmation: '',
      phone: '',
      gender: 1,
      birthday: '',
    });

    const createAdmin = async () => {
      const formData = new FormData();
      formData.append('fullname', admin.fullname);
      formData.append('avatar', file.value);
      formData.append('email', admin.email);
      formData.append('password', admin.password);
      formData.append('password_confinmation', admin.password_confinmation);
      formData.append('phone', admin.phone);
      formData.append('gender', admin.gender);
      formData.append('birthday', admin.birthday);

      axios.post('/api/admin/create', formData)
        .then((response) => {
          if (response.status == 200) {
            Object.assign(admin, {
              fullname: '',
              email: '',
              password: '',
              password_confinmation: '',
              phone: '',
              gender: 1,
              birthday: '',
            })
            errors.value = ''
          }
          console.log(response);
        })
        .catch((error) => {
          if (error.response.status === 422) {
            errors.value = error.response.data.errors;
          }
          console.log(errors.value);
        })
    }

    const handleFileUpload = (event) => {
      file.value = event.target.files[0];
    };

    return {
      birthday: ref(dayjs('01/01/2015', dateFormatList)),
      dateFormatList,
      errors,
      admin,
      createAdmin,
      handleFileUpload,
    };
  }
})
</script>

<style>
input[type="file"] {
    display: none;
}
.custom-file-upload {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
}
</style>