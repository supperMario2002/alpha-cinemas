<template>
    <p>Danh sách tài khoản admin</p>
  </template>
  
  <script>
  import { useMenu } from '../../../stores/use-menu';
  export default {
    setup() {
      const store = useMenu();
      store.onSelectKeys(['admin']);
    },
  }
  </script>
  
  <style></style>