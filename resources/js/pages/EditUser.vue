<template>
  <EditUser/>
</template>
<script setup lang="ts">
import { onBeforeMount } from 'vue';
import EditUser from '../components/EditUser.vue';
import { useRouter } from 'vue-router';

const router = useRouter();
onBeforeMount(() => {
  !localStorage.getItem('token') && router.push('/signin');
})
</script>