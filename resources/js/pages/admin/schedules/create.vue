<template>
    <form @submit.prevent="creatSchedule" :form="schedule">
        <a-card title="Thêm lịch chiếu phim mới" style="width: 100%;">
            <div class="row">
                <div class="col-12 col-sm-10" id="schedule">
                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end mb-1">
                            <label>
                                <span class="text-danger me-1">*</span>
                                <span>Chọn phim: </span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-5">
                            <a-select v-model:value="schedule.movie" show-search placeholder="Chọn phim" style="width: 100%"
                                :options="options" :filter-option="false"
                                :field-names="{ label: 'name', value: 'id' }"></a-select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end mb-1">
                            <label>
                                <span class="text-danger me-1">*</span>
                                <span>Chọn phòng: </span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-5">
                            <a-select v-model:value="schedule.room" show-search placeholder="Chọn phòng" style="width: 100%"
                                :options="optionsRoom" :filter-option="false"
                                :field-names="{ label: 'name', value: 'id' }"></a-select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end mb-1">
                            <label>
                                <span class="text-danger me-1">*</span>
                                <span>Thời gian chiếu: </span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-5">
                            <a-date-picker v-model:value="schedule.showtime" format="YYYY-MM-DD HH:mm:ss"
                                placeholder="Chọn thời gian" style="width: 100%" :disabled-date="disabledDate"
                                :show-time="{ defaultValue: dayjs('00:00:00', 'HH:mm:ss') }" />
                        </div>
                    </div>
                    <div class="row mb-3" id="btn">
                        <div class="col-12 col-sm-3 text-start text-sm-end mb-1">
                            
                        </div>
                        <div class="col-12 col-sm-5">
                            <button class="bg-primary float-end text-light" @click="addDatetimePicker">Thêm</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-grid d-sm-flex justify-content-sm-end mx-auto">
                            <a-button type="primary" html-type="submit" class="me-0 me-sm-3 mb-3 mb-sm-0">
                                <span>Lưu</span>
                            </a-button>
                            <a-button type="primary">
                                <!-- <router-link :to="{ name: 'admin-schedules-create' }">
                                    <span>Nhập lại</span>
                                </router-link> -->
                            </a-button>
                        </div>
                    </div>
                </div>
            </div>
        </a-card>
    </form>
</template>
  
<script>
import dayjs from 'dayjs';
import { useMenu } from '../../../stores/use-menu';
import { reactive, ref } from 'vue';
import axios from 'axios';
export default {
    setup() {
        const store = useMenu();
        store.onSelectKeys(['admin-schedules-create']);


        const errors = ref({});

        const options = ref([{}]);
        const optionsRoom = ref([{}]);
        const schedule = reactive({
            movie: undefined,
            room: undefined,
            showtime: ''
        });

        const filterOption = (input) => {
            console.log(input.toLowerCase());
            // return options.value.filter(option => option.name.toLowerCase().indexOf(input.toLowerCase()));
        };

        const disabledDate = current => {
            // Can not select days before today and today
            return current && current < dayjs().endOf('day');
        };

        const addDatetimePicker = () => {
            const form = document.querySelector('#schedule');
            const date = `
                        <div class="col-12 col-sm-3 text-start text-sm-end mb-1">
                            <label>
                                <span class="text-danger me-1">*</span>
                                <span>Thời gian chiếu: </span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-5"><div class="ant-picker" style="width: 100%;"><div class="ant-picker-input"><input readonly="" placeholder="Chọn thời gian" title="" size="21" autocomplete="off"><span class="ant-picker-suffix"><span role="img" aria-label="calendar" class="anticon anticon-calendar"><svg focusable="false" class="" data-icon="calendar" width="1em" height="1em" fill="currentColor" aria-hidden="true" viewBox="64 64 896 896"><path d="M880 184H712v-64c0-4.4-3.6-8-8-8h-56c-4.4 0-8 3.6-8 8v64H384v-64c0-4.4-3.6-8-8-8h-56c-4.4 0-8 3.6-8 8v64H144c-17.7 0-32 14.3-32 32v664c0 17.7 14.3 32 32 32h736c17.7 0 32-14.3 32-32V216c0-17.7-14.3-32-32-32zm-40 656H184V460h656v380zM184 392V256h128v48c0 4.4 3.6 8 8 8h56c4.4 0 8-3.6 8-8v-48h256v48c0 4.4 3.6 8 8 8h56c4.4 0 8-3.6 8-8v-48h128v136H184z"></path></svg></span></span><!----></div><!----></div></div>
                    `
            const datime = document.createElement('div');
            datime.className = 'row mb-3'
            datime.innerHTML = date
            form.insertBefore(datime, btn)
        } 


        const getData = () => {
            axios.get('/api/schedule/create')
                .then((response) => {
                    options.value = response.data.listMovie;
                    optionsRoom.value = response.data.listRoom;
                })
        }
        getData();

        const creatSchedule = async () => {
            console.log(schedule);
            axios.post('/api/schedule', schedule)
                .then((response) => {
                    if (response.status == 200) {
                        Object.assign(schedule, {
                            name: '',
                            address: '',
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
                });
        }

        return {
            dayjs,
            schedule,
            errors,
            options,
            optionsRoom,
            disabledDate,
            creatSchedule,
            filterOption,
            addDatetimePicker,
        }

    }

}
</script>
  
<style></style>