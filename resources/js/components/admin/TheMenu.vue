<template>
    <a-menu v-model:openKeys="openKeys" v-model:selectedKeys="selectedKeys" mode="inline">
        <a-menu-item key="admin-home">
            <template #icon>
                <i class="fa-solid fa-house"></i>
            </template>
            <router-link :to="{ name: 'admin-home' }" class="text-decoration-none">
                <span>Trang chủ</span>
            </router-link>
        </a-menu-item>
        <a-sub-menu @titleClick="titleClick">
            <template #icon>
                <i class="fa-solid fa-user"></i>
            </template>
            <template #title>Quản lý tài khoản</template>
            <a-menu-item-group key="g1">
                <template #icon>
                    <QqOutlined />
                </template>
                <template #title>Khách hàng</template>
                <a-menu-item key="admin-users">
                    <router-link :to="{ name: 'admin-users' }" class="text-decoration-none">
                        <span>Danh sách tài khoản</span>
                    </router-link>
                </a-menu-item>
            </a-menu-item-group>
            <a-menu-item-group key="g2">
                <template #icon>
                    <QqOutlined />
                </template>
                <template #title>Quản trị viên</template>
                <a-menu-item key="admin">
                    <router-link :to="{ name: 'admin' }" class="text-decoration-none">
                        <span>Danh sách tài khoản</span>
                    </router-link>
                </a-menu-item>
                <a-menu-item key="admin-create">
                    <router-link :to="{ name: 'admin-create' }" class="text-decoration-none">
                        <span>Thêm tài khoản tài khoản</span>
                    </router-link>
                </a-menu-item>
            </a-menu-item-group>
        </a-sub-menu>
    </a-menu>
</template>

<script>
import { defineComponent } from 'vue';
import { useMenu } from '../../stores/use-menu.js';
import { storeToRefs } from 'pinia'

export default defineComponent({
    setup() {
        const store = useMenu();
        return {
            ...storeToRefs(store)
        };
    },
});
</script>

<style></style>