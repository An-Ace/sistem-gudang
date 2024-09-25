<template>
  <AddItem/>
</template>
<script setup lang="ts">
import { onBeforeMount } from 'vue';
import AddItem from '../components/AddItem.vue';
import { useRouter } from 'vue-router';

const router = useRouter();
onBeforeMount(() => {
  !localStorage.getItem('token') && router.push('/signin');
})
</script>