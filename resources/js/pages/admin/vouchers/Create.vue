<template>
  <form @submit.prevent="createVoucher" :form="voucher">
    <a-card title="Thêm mã giảm giá mới" style="width: 100%;">
      <div class="row">
        <div class="col-12 col-sm-8">
          <div class="row mb-3">
            <div class="col-12 col-sm-4 text-start text-sm-end mb-1">
              <label>
                <span class="text-danger me-1">*</span>
                <span>Tên mã: </span>
              </label>
            </div>
            <div class="col-12 col-sm-8">
              <a-input placeholder="Tên mã" v-model:value="voucher.name" allow-clear />
              <span v-if="errors.name" class="text-danger">{{ errors.name[0] }}</span>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-12 col-sm-4 text-start text-sm-end mb-1">
              <label>
                <span class="text-danger me-1">*</span>
                <span>Số lượng: </span>
              </label>
            </div>
            <div class="col-12 col-sm-8">
              <a-input-number placeholder="Số lượng" v-model:value="voucher.quatity" allow-clear />
              <span v-if="errors.quatity" class="text-danger">{{ errors.quatity[0] }}</span>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-12 col-sm-4 text-start text-sm-end mb-1">
              <label>
                <span class="text-danger me-1">*</span>
                <span>Phần trăm giảm: </span>
              </label>
            </div>
            <div class="col-12 col-sm-8">
              <a-input-number placeholder="Phần trăm giảm" v-model:value="voucher.discount" allow-clear />
              <span v-if="errors.discount" class="text-danger">{{ errors.discount[0] }}</span>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-12 col-sm-4 text-start text-sm-end mb-1">
              <label>
                <span class="text-danger me-1">*</span>
                <span>Thời gian: </span>
              </label>
            </div>
            <div class="col-12 col-sm-8">
              <a-range-picker v-model:value="voucher.date" allow-clear :disabled-date="disabledDate"
                value-format="YYYY/MM/DD" />
              <span v-if="errors.date" class="text-danger">{{ errors.date[0] }}</span>
            </div>
          </div>
        </div>
        <div class="col-12 d-sm-flex justify-content-end ">
          <a-button type="primary" html-type="submit" class="me-0 me-sm-3 mb-3 mb-sm-0">
            <span>Lưu</span>
          </a-button>
        </div>
      </div>
    </a-card>
  </form>
</template>
  
<script>
import dayjs from 'dayjs';
import { useMenu } from '../../../stores/use-menu';
import { reactive, ref } from 'vue';

export default {
  setup() {
    const store = useMenu();
    store.onSelectKeys(['admin-rooms-create']);
    const errors = ref({});
    const voucher = reactive({
      name: '',
      quatity: 0,
      discount: 0,
      date: ''
    });

    const disabledDate = current => {
      return current && current < dayjs().endOf('day');
    };

    const createVoucher = async () => {
      axios.post('/api/voucher/create', voucher)
        .then((response) => {
          console.log(response);
          if (response.status == 200) {
            Object.assign(voucher, {
              name: '',
              quatity: 0,
              discount: 0,
              date: '',
            })
            if(response.data.code == 1){
              notification['success']({ message: response.data.mess});
            }else{
              notification['error']({ message: response.data.mess});
            }
          }
        })
        .catch((error) => {
          notification['error']({ message: error.message});
        });
    }

    return {
      voucher,
      errors,
      disabledDate,
      createVoucher,
    }

  }

}
</script>
  
<style></style>
  