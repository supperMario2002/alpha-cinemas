<template>
  <a-table :columns="columns" :data-source="room" :scroll="{ x: 576 }">
    <template #bodyCell="{ column, index, record }">
      <template v-if="column.key === 'index'">
        <span>{{ index + 1 }}</span>
      </template>
      <template v-if="column.key === 'action'">
        <router-link :to="{ name: 'admin-users-edit', params: { id: record.id } }">
          <a-button type="primary">
            <i class="fa-solid fa-pen-to-square"></i>
          </a-button>
        </router-link>
      </template>
    </template>
  </a-table>
</template>

<script>
import { defineComponent, ref } from 'vue';
import axios from 'axios';
import { useMenu } from '../../../stores/use-menu';
export default {
  setup() {
    const store = useMenu();
    store.onSelectKeys(['admin-rooms']);

    const room = ref([]);


    const columns = [
      {
        title: '#',
        key: 'index',
        width: 100,
        sorter: (a, b) => a.index - b.index,
      },
      {
        title: 'Tên phòng ',
        dataIndex: 'name',
        key: 'name'
      },
      {
        title: 'Địa chỉ',
        dataIndex: 'address',
        key: 'address'
      },
    ]


    const getRoom = () => axios.get('/api/room/index')
      .then((reponse) => {
        room.value = reponse.data;
      })
      .catch((error) => {
        console.log(error);
      })
    getRoom();

    return {
      room,
      columns,
    }
  }

}
</script>

<style></style>