<template>
  <div class="card">
    <DataTable paginator :rows="5" :value="mutations" tableStyle="min-width: 50rem" dataKey="id">
      <template #header>
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
      </template>
      <Column field="id" header="ID"></Column>
      <Column field="user.name" header="Nama Pemilik"></Column>
      <Column field="item.name" header="Nama Barang"></Column>
      <Column field="mutation_type" header="Tipe"></Column>
      <Column field="amount" header="Banyaknya"></Column>
      <Column field="created_at" header="Tanggal">
        <template #body="slotProps">
            {{ format(new Date(slotProps.data.created_at), 'dd/MM/yyyy HH:mm') }}
        </template>
      </Column>
    </DataTable>
  </div>
</template>
<script setup lang="ts">
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import Button from 'primevue/button';
import { format } from 'date-fns';
import { onBeforeMount, onMounted, ref } from 'vue';
import Api from '../helpers/api';
import Select from 'primevue/select';
import FloatLabel from 'primevue/floatlabel';
import InputText from 'primevue/inputtext';
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
const mutations = ref([])

function addMutation() {
  Api.post('/mutations', {
    user_id: selectedUser.value.value,
    item_id: selectedItem.value.value,
    amount: Number(amount.value),
    mutation_type: selectedType.value.value
  })
  .then((response) => {
    toast.success(`Mutasi berhasil ditambahkan`)
    Api.get('/mutations/withRelations')
    .then(res => {
      mutations.value = res
    })
  })
}
onMounted(() => {
  Api.get('/mutations/withRelations')
  .then(res => {
    mutations.value = res
  })
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