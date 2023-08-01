<template>
    <a-breadcrumb class="breadcrumb">
        <a-breadcrumb-item>Trang chủ</a-breadcrumb-item> 
        <a-breadcrumb-item> <span class="name-movie">Quái vật và người đẹp</span></a-breadcrumb-item>
    </a-breadcrumb>
</template>

<script>
import { defineComponent } from 'vue';

export default defineComponent({
    props: {
        items: {
            type: Array,
            required: true,
        },
    },
});
</script>

<style scoped>
.name-movie{
    color: #337ab7 !important;
}

.breadcrumb {
    margin: 20px 0;
    font-size: 30px;
    font-weight: normal;
}
</style>