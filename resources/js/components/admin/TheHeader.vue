<template>
    <div class="row p-3 d-flex align-items-center " style="background-color: aquamarine;">
        <div class="col-4 d-md-none d-flex justify-content-start" @click="showDrawer()">
            <i class="fa-solid fa-bars"></i>
        </div>
        <div class="col-4 col-md-12 d-flex justify-content-center justify-content-sm-start ">
            <a-avatar class="me-2">
                <template #icon>
                    <UserOutlined />
                </template>
            </a-avatar>
            <span class="p-1">Admin</span>
        </div>
        <div class="col-4 d-md-none d-flex justify-content-end">
            <i class="fa-solid fa-gear"></i>
        </div>
    </div>
    <a-drawer v-model:visible="visible" class="custom-class" style="color: black" title="Menu" placement="left">
            <TheMenu /> 
    </a-drawer>
</template>

<script>
import { defineComponent, ref } from 'vue';
import { UserOutlined } from '@ant-design/icons-vue';
import TheMenu from './TheMenu.vue';
export default defineComponent({
    setup() {
        const visible = ref(false);
        const showDrawer = () => {
            visible.value = true;
        };
        return {
            visible,
            showDrawer,
        };
    },
    components: {
        UserOutlined,
        TheMenu
    },
});
</script>
 