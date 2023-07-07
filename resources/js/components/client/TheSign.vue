<template>
    <div id="sign-client">
        <div class="wrapper">
            <div class="logo">
                <img src="https://www.betacinemas.vn/Assets/Common/logo/logo.png" alt="">
            </div>
            <div class="text-center mt-4 name">
                BETA
            </div>
            <form class="p-3 mt-3" @submit.prevent="createUser" :form="user">
                <div class="form-field d-flex align-items-center">
                    <span class="far fa-user"></span>
                    <a-input placeholder="Họ và tên" v-model:value="user.fullname" allow-clear />
                    <span v-if="errors.fullname" class="text-danger">{{ errors.fullname[0] }}</span>
                </div>
                <div class="form-field d-flex align-items-center">
                    <span class="fas fa-envelope"></span>
                    <a-input placeholder="Email" v-model:value="user.email" allow-clear />
                    <span v-if="errors.email" class="text-danger">{{ errors.email[0] }}</span>
                </div>
                <div class="form-field d-flex align-items-center">
                    <span class="fas fa-key"></span>
                    <a-input-password placeholder="Mật khẩu" v-model:value="user.password" allow-clear />
                    <span v-if="errors.password" class="text-danger">{{ errors.password[0] }}</span>
                </div>
                <div class="form-field d-flex align-items-center">
                    <span class="fas fa-key"></span>
                    <a-input-password placeholder="Nhập lại mật khẩu" v-model:value="user.password_confinmation" allow-clear />
                    <span v-if="errors.password_confinmation" class="text-danger">{{ errors.password_confinmation[0] }}</span>
                </div>
                <div class="form-field d-flex align-items-center">
                    <span class="fas fa-phone"></span>
                    <a-input placeholder="Phone" v-model:value="user.phone" allow-clear />
                    <span v-if="errors.phone" class="text-danger">{{ errors.phone[0] }}</span>
                </div>
                <div class="form-field d-flex align-items-center">
                    <span class="fa-solid fa-venus-mars"></span> &ensp; &ensp;
                    <a-radio-group v-model:value="user.gender">
                        <a-radio :value="0">Nam</a-radio>
                        <a-radio :value="1">Nữ</a-radio>
                    </a-radio-group>
                </div>
                <div class="form-field d-flex align-items-center">
                    <span class="fa-solid fa-cake-candles"></span> &ensp; &ensp;
                    <a-date-picker :format="dateFormatList" v-model:value="user.birthday" placeholder="Ngày Sinh" style="width: 100%;" />
                </div>
                <button type="submit" class="btn mt-3">Register</button>
            </form>
            <div class="text-center fs-6">
                <a href="#">Forget password?</a> or <a href="#">Sign up</a>
            </div>
        </div>
    </div>
</template>

<script>
import dayjs from 'dayjs';
import { message } from 'ant-design-vue';
import { useRoute } from 'vue-router';
import { defineComponent, reactive, ref, toRef } from 'vue';
import axios from 'axios';
export default {
    setup() {

        const router = useRoute();
        const errors = ref({});
        const dateFormatList = 'DD/MM/YYYY';
        const user = reactive({
            fullname: '',
            email: '',
            password: '',
            password_confinmation: '',
            phone: '',
            gender: 1,
            birthday: '',
        });

        const createUser = async () => {
            axios.post('http://127.0.0.1:8000/api/user/create', user)
                .then((response) => {
                    if (response.status == 200) {
                        Object.assign(user, {
                            fullname: '',
                            email: '',
                            password: '',
                            password_confinmation: '',
                            phone: '',
                            gender: 1,
                            birthday: '',
                        })
                        errors.value = '';
                        message.success("Đăng ký thành công");
                        router.push({path: "/Login"});
                    }
                    console.log(response);
                })
                .catch((error) => {
                    if (error.response.status === 422) {
                        errors.value = error.response.data.errors;
                    }
                })
        }

        return {
          birthday: ref(dayjs('01/01/2015', dateFormatList)),
          dateFormatList,
          errors,
          user,
          createUser,
        };
    },

}
</script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

/* Reseting */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
    background: #ecf0f3;
}

.wrapper {
    max-width: 40%;
    min-height: 500px;
    margin: 80px auto;
    padding: 40px 30px 30px 30px;
    background-color: #ecf0f3;
    border-radius: 15px;
    box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #fff;
}

.logo {
    width: 150px;
    margin: auto;
}

.logo img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 50%;
    box-shadow: 0px 0px 3px #5f5f5f,
        0px 0px 0px 5px #ecf0f3,
        8px 8px 15px #a7aaa7,
        -8px -8px 15px #fff;
}

.wrapper .name {
    font-weight: 600;
    font-size: 1.4rem;
    letter-spacing: 1.3px;
    padding-left: 10px;
    color: #555;
}

.wrapper .form-field input {
    width: 100%;
    display: block;
    border: none;
    outline: none;
    background: none;
    font-size: 1.2rem;
    color: #666;
    padding: 10px 15px 10px 10px;
    /* border: 1px solid red; */
}

.wrapper .form-field {
    padding-left: 10px;
    margin-bottom: 20px;
    border-radius: 20px;
    box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff;
}

.wrapper .form-field .fas {
    color: #555;
}

.wrapper .btn {
    box-shadow: none;
    width: 100%;
    height: 40px;
    background-color: #03A9F4;
    color: #fff;
    border-radius: 25px;
    box-shadow: 3px 3px 3px #b1b1b1,
        -3px -3px 3px #fff;
    letter-spacing: 1.3px;
}

.wrapper .btn:hover {
    background-color: #039BE5;
}

.wrapper a {
    text-decoration: none;
    font-size: 0.8rem;
    color: #03A9F4;
}

.wrapper a:hover {
    color: #039BE5;
}

@media(max-width: 380px) {
    .wrapper {
        margin: 30px 20px;
        padding: 40px 15px 15px 15px;
    }
}
</style>