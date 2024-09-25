<template>
  <SignUp/>
</template>
<script setup lang="ts">
import { useRouter } from 'vue-router';
import SignUp from '../components/SignUp.vue';
import { onBeforeMount } from 'vue';
const router = useRouter();
onBeforeMount(() => {
  localStorage.getItem('token') && router.push('/');
})
  
</script>