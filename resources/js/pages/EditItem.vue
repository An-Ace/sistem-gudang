<template>
  <EditItem/>
</template>
<script setup lang="ts">
import { onBeforeMount } from 'vue';
import EditItem from '../components/EditItem.vue';
import { useRouter } from 'vue-router';

const router = useRouter();
onBeforeMount(() => {
  !localStorage.getItem('token') && router.push('/signin');
})
</script>