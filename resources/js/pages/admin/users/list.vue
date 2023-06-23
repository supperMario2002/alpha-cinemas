<template>
  <p>acv</p>
</template>

<script>
import { useMenu } from '../../../stores/use-menu';
export default {
  setup() {
    const store = useMenu();
    store.onSelectKeys(['admin-users']);
  },
}
</script>

<style></style>