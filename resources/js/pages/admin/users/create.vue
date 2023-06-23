<template>
    <p>thêm tài khoản</p>
  </template>
  
  <script>
  import { useMenu } from '../../../stores/use-menu';
  export default {
    setup() {
      const store = useMenu();
      store.onSelectKeys(['admin-users-create']);
    },
  }
  </script>
  
  <style></style>