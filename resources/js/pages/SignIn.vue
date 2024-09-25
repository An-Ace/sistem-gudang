<template>
  <SignIn/>
</template>
<script setup lang="ts">
import { useRouter } from 'vue-router';
import SignIn from '../components/SignIn.vue';
import { onBeforeMount } from 'vue';
const router = useRouter();
onBeforeMount(() => {
  localStorage.getItem('token') && router.push('/');
})
  
</script>