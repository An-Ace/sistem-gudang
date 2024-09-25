<template>
  <div class="card">
    <DataTable paginator :rows="5" :value="users" v-model:expandedRows="expandedRows" tableStyle="min-width: 50rem" dataKey="id">
      <Column expander style="width: 5rem" />
      <Column field="id" header="ID"></Column>
      <Column field="name" header="Name"></Column>
      <Column field="email" header="Email"></Column>
      <Column header="Banyak Mutasi">
        <template #body="slotProps">
          {{ slotProps.data.mutations.length }}
        </template>
      </Column>
      <Column header="Aksi">
        <template #body="slotProps">
          <RouterLink :to="`/users/${slotProps.data.id}`" class="p-button-text">
            <Button size="small" label="Edit" icon="pi pi-refresh" class="p-button-text" severity="info"/>
          </RouterLink>
          <Button label="Delete" icon="pi pi-times" class="p-button-text" severity="danger"
            @click="$swal.fire({
              title: 'Apakah anda yakin?',
              text: 'User yang dihapus tidak dapat dikembalikan.',
              showCancelButton: true,
              confirmButtonColor: '#F64E60',
              confirmButtonText: 'Ya, Hapus',
              cancelButtonText: 'Batal',
              closeOnConfirm: false,
              closeOnCancel: false
            }).then((result) => {
              /* Read more about isConfirmed, isDenied below */
              Api.delete(`users/${slotProps.data.id}`).then((response) => {
                if (true) {
                  this.$swal.fire({
                    title: 'Berhasil',
                    text: 'User berhasil dihapus',
                    icon: 'success',
                    timer: 2000,
                    showConfirmButton: false
                  })
                  users = users.filter(user => user.id !== slotProps.data.id);
                }
              })
            });"
          />
        </template>
      </Column>
      <template #expansion="slotProps">
        <div class="p-4">
          <h5>Mutations for User: {{ slotProps.data.name }}</h5>
          <DataTable :value="slotProps.data.mutations">
            <Column field="item.name" header="Nama Barang"></Column>
            <Column field="mutation_type" header="Tipe Mutasi"></Column>
            <Column field="amount" header="Amount"></Column>
            <Column field="created_at" header="Date">
              <template #body="slotProps">
                  {{ format(new Date(slotProps.data.created_at), 'dd/MM/yyyy HH:mm') }}
              </template>
            </Column>
            <Column header="Action">
              <template #body="slotProps">
                <RouterLink :to="`/users/${slotProps.data.id}/edit`" class="p-button-text">
                  <Button size="small" label="Edit" severity="info"/>
                </RouterLink>
              </template>
            </Column>
          </DataTable>
        </div>
      </template>
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
import { useRouter } from 'vue-router';

const router = useRouter();
onBeforeMount(() => {
  !localStorage.getItem('token') && router.push('/signin');
})

const expandedRows = ref({}); 
const users = ref([])
onMounted(() => {
  Api.get('/users/withMutations')
  .then(res => {
    users.value = res
  })
})
</script>