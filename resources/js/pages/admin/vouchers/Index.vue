<template>
    <a-table :columns="columns" :data-source="voucher" :scroll="{ x: 576 }">
      <template #bodyCell="{ column, index, record }">
        <template v-if="column.key === 'index'">
          <span>{{ index + 1 }}</span>
        </template>
        <template v-if="column.key === 'action'">
          <router-link :to="{ name: 'admin-vouchers-edit', params: { id: record.id } }">
            <a-button type="primary" class="mx-2">
              <i class="fa-solid fa-pen-to-square"></i>
            </a-button> 
          </router-link>
          <a-button type="primary" @click="deleteVoucher(record.id)">
            <i class="fa-solid fa-trash"></i>
          </a-button>
        </template>
      </template>
    </a-table>
  </template>
  
  <script> 
  import { ref } from 'vue';
  import { useMenu } from '../../../stores/use-menu';
  export default {
    setup() {
      const store = useMenu();
  
      store.onSelectKeys(['admin-vouchers']);
  
  
      const voucher = ref([]);
  
  
      const columns = [
        {
          title: '#',
          key: 'index',
          width: 100,
          sorter: (a, b) => a.index - b.index,
        },
        {
          title: 'Tên mã ',
          dataIndex: 'name',
          key: 'name'
        },
        {
          title: 'Số lượng',
          dataIndex: 'quatity',
          key: 'quatity'
        },
        {
          title: 'Phần trăm giảm',
          dataIndex: 'discount',
          key: 'discount'
        },
        {
          title: 'Ngày có hiệu lực',
          dataIndex: 'date_start',
          key: 'date_start'
        },
        {
          title: 'Ngày hết hạn',
          dataIndex: 'date_end',
          key: 'date_end'
        },
        {
          title: 'Công cụ',
          key: 'action'
        }
      ]
  
      const getVoucher = () => axios.get('/api/voucher/index')
        .then((reponse) => {
            voucher.value = reponse.data.data;
        })
        getVoucher();
  
      const deleteVoucher = (id) => axios.delete(`/api/voucher/${id}`)
        .then((response) => {
          if(response.status == 200){
            if(response.data.code == 1){
              notification['success']({ message: response.data.mess});
            }
          }else{
            notification['error']({ message: response.data.mess});
          }
          getVoucher()
        })
        .catch((error) => {
          notification['error']({ message: error.message});
        });
      
      return {
        voucher,
        columns,
        deleteVoucher
      }
    }
  
  }
  </script>
  
  <style></style>
  