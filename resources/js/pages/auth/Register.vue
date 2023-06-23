<template>
    <form @submit.prevent="">
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
                            <a-button type="primary">
                                <i class="fa-solid fa-plus me-2"></i>
                                <span>Thêm ảnh</span>
                            </a-button>
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
                            <a-input placeholder="Họ và tên" allow-clear />
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
                            <a-input placeholder="Email" allow-clear />
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
                            <a-input-password placeholder="Mật khẩu" v-model:value="password" />
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
                            <a-input-password placeholder="Xác nhận mật khẩu" v-model:value="password_confinmation" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 d-grid d-sm-flex justify-content-sm-end mx-auto">
                    <a-button type="primary" html-type="submit" class="me-0 me-sm-3 mb-3 mb-sm-0">
                        <span>Đăng ký</span>
                    </a-button>
                    <a-button type="primary"  >
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
import { defineComponent } from 'vue';
export default defineComponent({
    setup() {

    },
    components: {
    }

})
</script>

