<template>
  <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
            Edit Barang: {{ id }}
        </h1>
        <form class="space-y-4 md:space-y-6" action="#" @submit.prevent="editItem">
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Barang</label>
                <input v-model="name" type="name" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name" required="">
            </div>
            <div>
                <label for="code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode </label>
                <input v-model="code" type="code" name="code" id="code" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="kode" required="">
            </div>
            <div>
                <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori </label>
                <input v-model="category" type="category" name="category" id="category" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="kategori" required="">
            </div>
            <div>
                <label for="location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lokasi </label>
                <input v-model="location" type="location" name="location" id="location" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="lokasi" required="">
            </div>
            <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Update Barang</button>
        </form>
    </div>
</div>
</template>

<script setup>
import { onMounted, ref } from 'vue';
import { useRoute, useRouter } from 'vue-router';
import Api from '../helpers/api';

const id = ref('');
const name = ref('');
const code = ref('');
const category = ref('');
const location = ref('');
const route = useRoute();
const router = useRouter();

const editItem = async () => {
  try {
    const response = await Api.put(`/items/${route.params.id}`, {
      name: name.value,
      code: code.value,
      category: category.value,
      location: location.value,
    });
    router.push('/items');
  } catch (error) {
    console.error(error);
    alert('Login failed.');
  }
};

onMounted(() => {
  Api.get(`/items/${route.params.id}`)
    .then((response) => {
      id.value = response.id;
      name.value = response.name;
      code.value = response.code;
      category.value = response.category;
      location.value = response.location;
    })
    .catch((error) => {
      console.error(error);
    });
})
</script>

<style scoped>
/* Tambahkan style jika diperlukan */
</style>
