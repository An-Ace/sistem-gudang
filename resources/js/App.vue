<template>
  <Suspense>
    <div class="relative px-6 md:px-12 py-3 bg-stone-100">
      <!-- Navbar -->
      <nav class="sticky top-0 border-gray-200 bg-stone-100 dark:bg-gray-900 dark:border-gray-700 w-full z-10">
        <div class="flex flex-wrap items-center justify-between mx-auto py-4 relative w-full">
          <RouterLink to="/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <!-- <img src="/public/energeek.png" class="h-8" alt="Energeek Logo" /> -->
          </RouterLink>
          <button @click="isNavOpen = !isNavOpen" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
            </svg>
          </button>
          <div class="w-full md:block md:w-auto absolute md:static top-10" :class="{ hidden: !isNavOpen }" id="navbar-dropdown">
            <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
              <li>
                <RouterLink to="/" exactActiveClass="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent" aria-current="page">Home</RouterLink>
              </li>
              <li>
                <RouterLink to="/users" activeClass="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent" aria-current="page">Panel User</RouterLink>
              </li>
              <li>
                <RouterLink to="/items" activeClass="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent" aria-current="page">Panel Item</RouterLink>
              </li>
              <li>
                <RouterLink to="/mutations" activeClass="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent" aria-current="page">Panel Mutasi</RouterLink>
              </li>
              <li v-if="isLogin">
                <button @click="logout" class="block py-2 px-3 text-red-600 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 hover:text-red-300 md:p-0 dark:text-white dark:hover:bg-gray-700" aria-current="page">Logout</button>
              </li>
              <li v-else>
                <RouterLink to="/signin" exactActiveClass="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent" aria-current="page">Login</RouterLink>
              </li>
              
            </ul>
          </div>
        </div>
      </nav>
      <!-- /.navbar -->
      <main class="grid place-content-center" style="min-height: calc(100vh - 6rem);">
        <RouterView />
      </main>
    </div>
  </Suspense>
</template>

<script setup>
import { onMounted, ref } from 'vue';
import '../sass/app.scss';
import 'vue3-toastify/dist/index.css';
import { RouterLink, useRouter } from 'vue-router';
import Api from './helpers/api';
// import LoginButton from './components/LoginButton.vue';

const isNavOpen = ref(false);
const isLogin = ref(false);
const router = useRouter();
router.afterEach((to, from, next) => {
  localStorage.getItem('token') ? isLogin.value = true : isLogin.value = false;
  next();
});
onMounted(() => {
  localStorage.getItem('token') ? isLogin.value = true : isLogin.value = false;
})

function logout () {
  Api.get('/signout')
  .then(() => {
    localStorage.removeItem('token');
    isLogin.value = false;
    router.push('/signin');
  })
}

</script>