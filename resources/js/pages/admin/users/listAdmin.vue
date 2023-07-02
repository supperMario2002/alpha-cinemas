<template>
  <a-table :columns="columns" :data-source="admin" :scroll="{ x: 576 }">
    <template #bodyCell="{ column, index, record }">
      <template v-if="column.key === 'index'">
        <span>{{ index + 1 }}</span>
      </template> 
      <template v-if="column.key === 'gender'">
        <span v-if="record.gender == 0" class="text-primary">Nam</span>
        <span v-else-if="record.gender == 1" class="text-danger">Nữ</span>
      </template>
    </template>
  </a-table>
</template> 

<script>
import { defineComponent, ref } from 'vue';
import axios from 'axios';
import { useMenu } from '../../../stores/use-menu';
export default defineComponent({
  setup() {
    const store = useMenu();
    store.onSelectKeys(['admin']);

    const admin = ref([]);
    const columns = [
      {
        title: '#',
        key: 'index',
        width: 100,
        sorter: (a, b) => a.index - b.index,
      },
      {
        title: 'Ảnh ',
        dataIndex: 'avatar',
        key: 'avatar'
      },
      {
        title: 'Họ và tên',
        dataIndex: 'fullname',
        key: 'fullname'
      },
      {
        title: 'Email',
        dataIndex: 'email',
        key: 'email'
      },
      {
        title: 'Điện thoại',
        dataIndex: 'phone',
        key: 'phone'
      },
      {
        title: 'Giới tính',
        dataIndex: 'gender',
        key: 'gender'
      },
      {
        title: 'Ngày tạo',
        dataIndex: 'created_at',
        key: 'created_at'
      },
      {
        title: 'Công cụ',
        key: 'action',
        fixed: 'right',
        width: 200
      }
    ];

    const getAdmin = () => axios.get('http://127.0.0.1:8000/api/admin/index')
      .then((reponse) => {
        admin.value = reponse.data;
      })
      .catch((error) => {
        console.log(error);
      })
    getAdmin();
    return {
      admin,
      columns
    }


  },
});
</script> 