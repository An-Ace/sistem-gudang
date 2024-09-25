<template>
  <div class="bg-white py-6 sm:py-8 lg:py-12">
    <div class="grid grid-cols-3 gap-4 mx-3">
      <Select size="small" v-model="selectedUser" :options="users" filter optionLabel="label" placeholder="Pilih User" class="w-full">
          <template #value="slotProps">
              <div v-if="slotProps.value" class="flex items-center">
                  <div>{{ slotProps.value.label }}</div>
              </div>
              <span v-else>
                  {{ slotProps.placeholder }}
              </span>
          </template>
          <template #option="slotProps">
              <div class="flex items-center">
                  <div>{{ slotProps.option.label }}</div>
              </div>
          </template>
      </Select>
      <Select size="small" v-model="selectedItem" :options="items" filter optionLabel="label" placeholder="Pilih Barang" class="w-full">
          <template #value="slotProps">
              <div v-if="slotProps.value" class="flex items-center">
                  <div>{{ slotProps.value.label }}</div>
              </div>
              <span v-else>
                  {{ slotProps.placeholder }}
              </span>
          </template>
          <template #option="slotProps">
              <div class="flex items-center">
                  <div>{{ slotProps.option.label }}</div>
              </div>
          </template>
      </Select>
      <Select size="small" v-model="selectedType" :options="types" optionLabel="label" placeholder="Pilih Tipe" class="w-full">
          <template #value="slotProps">
              <div v-if="slotProps.value" class="flex items-center">
                  <div>{{ slotProps.value.label }}</div>
              </div>
              <span v-else>
                  {{ slotProps.placeholder }}
              </span>
          </template>
          <template #option="slotProps">
              <div class="flex items-center">
                  <div>{{ slotProps.option.label }}</div>
              </div>
          </template>
      </Select>
      <FloatLabel class="w-full">
        <InputText id="amount" v-model="amount" />
        <label for="amount">Banyaknya</label>
      </FloatLabel>
      <Button @click="addMutation">Tambahkan Mutasi</Button>
    </div>
    <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
      <div class="mb-4 flex flex-col items-center md:mb-8 lg:flex-row lg:justify-between">
        <h2 class="mb-2 text-center text-2xl font-bold text-gray-800 lg:mb-0 lg:text-3xl">Manage: </h2>
      </div>
      <div class="grid grid-cols-2 gap-4 rounded-lg md:grid-cols-3 lg:gap-6">
        <RouterLink to="/users" class="flex flex-col align-middle items-center justify-center rounded-lg bg-gray-100 p-4 text-gray-400">
          <svg xmlns="http://www.w3.org/2000/svg" width="120" viewBox="0 0 640 512">
            <path fill="currentColor" d="M610.5 341.3c2.6-14.1 2.6-28.5 0-42.6l25.8-14.9c3-1.7 4.3-5.2 3.3-8.5c-6.7-21.6-18.2-41.2-33.2-57.4c-2.3-2.5-6-3.1-9-1.4l-25.8 14.9c-10.9-9.3-23.4-16.5-36.9-21.3v-29.8c0-3.4-2.4-6.4-5.7-7.1c-22.3-5-45-4.8-66.2 0c-3.3.7-5.7 3.7-5.7 7.1v29.8c-13.5 4.8-26 12-36.9 21.3l-25.8-14.9c-2.9-1.7-6.7-1.1-9 1.4c-15 16.2-26.5 35.8-33.2 57.4c-1 3.3.4 6.8 3.3 8.5l25.8 14.9c-2.6 14.1-2.6 28.5 0 42.6l-25.8 14.9c-3 1.7-4.3 5.2-3.3 8.5c6.7 21.6 18.2 41.1 33.2 57.4c2.3 2.5 6 3.1 9 1.4l25.8-14.9c10.9 9.3 23.4 16.5 36.9 21.3v29.8c0 3.4 2.4 6.4 5.7 7.1c22.3 5 45 4.8 66.2 0c3.3-.7 5.7-3.7 5.7-7.1v-29.8c13.5-4.8 26-12 36.9-21.3l25.8 14.9c2.9 1.7 6.7 1.1 9-1.4c15-16.2 26.5-35.8 33.2-57.4c1-3.3-.4-6.8-3.3-8.5zM496 368.5c-26.8 0-48.5-21.8-48.5-48.5s21.8-48.5 48.5-48.5s48.5 21.8 48.5 48.5s-21.7 48.5-48.5 48.5M96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64s-64 28.7-64 64s28.7 64 64 64m224 32c1.9 0 3.7-.5 5.6-.6c8.3-21.7 20.5-42.1 36.3-59.2c7.4-8 17.9-12.6 28.9-12.6c6.9 0 13.7 1.8 19.6 5.3l7.9 4.6c.8-.5 1.6-.9 2.4-1.4c7-14.6 11.2-30.8 11.2-48c0-61.9-50.1-112-112-112S208 82.1 208 144s50.1 112 112 112m105.2 194.5c-2.3-1.2-4.6-2.6-6.8-3.9c-8.2 4.8-15.3 9.8-27.5 9.8c-10.9 0-21.4-4.6-28.9-12.6c-18.3-19.8-32.3-43.9-40.2-69.6c-10.7-34.5 24.9-49.7 25.8-50.3q-.15-3.9 0-7.8l-7.9-4.6c-3.8-2.2-7-5-9.8-8.1c-3.3.2-6.5.6-9.8.6c-24.6 0-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h255.4c-3.7-6-6.2-12.8-6.2-20.3zM173.1 274.6C161.5 263.1 145.6 256 128 256H64c-35.3 0-64 28.7-64 64v32c0 17.7 14.3 32 32 32h65.9c6.3-47.4 34.9-87.3 75.2-109.4" />
          </svg>
          <div>Menejemen User</div>
        </RouterLink>
        <RouterLink to="/items" class="flex flex-col align-middle items-center justify-center rounded-lg bg-gray-100 p-4 text-gray-400">
          <svg xmlns="http://www.w3.org/2000/svg" width="120" viewBox="0 0 24 24">
            <path fill="currentColor" d="m17.578 4.432l-2-1.05C13.822 2.461 12.944 2 12 2s-1.822.46-3.578 1.382l-.321.169l8.923 5.099l4.016-2.01c-.646-.732-1.688-1.279-3.462-2.21m4.17 3.534l-3.998 2V13a.75.75 0 0 1-1.5 0v-2.286l-3.5 1.75v9.44c.718-.179 1.535-.607 2.828-1.286l2-1.05c2.151-1.129 3.227-1.693 3.825-2.708c.597-1.014.597-2.277.597-4.8v-.117c0-1.893 0-3.076-.252-3.978M11.25 21.904v-9.44l-8.998-4.5C2 8.866 2 10.05 2 11.941v.117c0 2.525 0 3.788.597 4.802c.598 1.015 1.674 1.58 3.825 2.709l2 1.049c1.293.679 2.11 1.107 2.828 1.286M2.96 6.641l9.04 4.52l3.411-1.705l-8.886-5.078l-.103.054c-1.773.93-2.816 1.477-3.462 2.21" />
          </svg>
          <div>Menejemen Barang</div>
        </RouterLink>
        <RouterLink to="/mutations" class="flex flex-col align-middle items-center justify-center rounded-lg bg-gray-100 p-4 text-gray-400">
          <svg xmlns="http://www.w3.org/2000/svg" width="120" viewBox="0 0 24 24">
            <path fill="currentColor" fill-rule="evenodd" d="m13.015 14.554l-1.114 2.376a.4.4 0 0 0 .596.494l4.8-3.469a.5.5 0 0 0-.292-.905H13.72l-.002.004H7v1.5zM11.21 9.446l1.114-2.376a.4.4 0 0 0-.597-.494l-4.8 3.469a.5.5 0 0 0 .293.905h3.285l.001-.004h6.714v-1.5zM12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10s-4.477 10-10 10" />
          </svg>
          <div>Menajemen Mutasi</div>
        </RouterLink>
      </div>
    </div>
  </div>
</template>
<script setup lang="ts">
import { onBeforeMount, onMounted, ref } from 'vue';
import { RouterLink } from 'vue-router';
import Api from '../helpers/api';
import Select from 'primevue/select';
import Button from 'primevue/button';
import InputText from 'primevue/inputtext';
import FloatLabel from 'primevue/floatlabel';
import { toast } from 'vue3-toastify';
import { useRouter } from 'vue-router';

const router = useRouter();
onBeforeMount(() => {
  !localStorage.getItem('token') && router.push('/signin');
})
const selectedUser = ref(null)
const users = ref([])
const selectedItem = ref(null)
const items = ref([])
const types = ref([{ value: "IN", label: "IN" }, { value: "OUT", label: "OUT" }])
const selectedType = ref(null)
const amount = ref(1)


function addMutation() {
  Api.post('/mutations', {
    user_id: selectedUser.value.value,
    item_id: selectedItem.value.value,
    amount: Number(amount.value),
    mutation_type: selectedType.value.value
  })
  .then((response) => {
    toast.success(`Mutasi berhasil ditambahkan`)
  })
}

onMounted(() => {
  Api.get('/users')
  .then((response) => {
    users.value = response.map((user) => ({ value: user.id, label: user.name }))
  })
  Api.get('/items')
  .then((response) => {
    items.value = response.map((item) => ({ value: item.id, label: item.name }))
  })

})

</script>