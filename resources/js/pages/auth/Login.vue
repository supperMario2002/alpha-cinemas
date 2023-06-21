<template>
    <form @submit.prevent="">
        <a-card title="Đăng nhập" style="width: 100%;">
            <div class="row">
                
                <div class="col-12 col-sm-8">
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
            </div>

            <div class="row">
                <div class="col-12 d-grid d-sm-flex justify-content-sm-end mx-auto">
                    <a-button type="primary" html-type="submit" class="me-0 me-sm-3 mb-3 mb-sm-0">
                        <span>Đăng nhập</span>
                    </a-button>
                    <a-button type="primary"  >
                        <router-link :to="{ name: 'admin-register' }">
                            <span>Đăng ký</span>
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

