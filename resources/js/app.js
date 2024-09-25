import { createApp } from "vue";
import App from "./App.vue";
import { createWebHistory, createRouter } from 'vue-router'
import Vue3Toastify from 'vue3-toastify'
import VueSweetalert2 from 'vue-sweetalert2';
import PrimeVue from 'primevue/config';
import Aura from '@primevue/themes/aura';
import 'sweetalert2/dist/sweetalert2.min.css';

import HomeView from './pages/Home.vue'
import SignInView from './pages/SignIn.vue'
import SignUpView from './pages/SignUp.vue'
import UsersView from './pages/Users.vue'
import EditUser from "./pages/EditUser.vue";
import EditItem from "./pages/EditItem.vue";
import AddItem from "./pages/AddItem.vue";
import Item from "./pages/Item.vue";
import Mutation from "./pages/Mutation.vue";


const routes = [
  { path: '/', component: HomeView },
  { path: '/signin', component: SignInView },
  { path: '/signup', component: SignUpView },
  { path: '/users', component: UsersView },
  { path: '/users/:id', component: EditUser },
  { path: '/items', component: Item },
  { path: '/items/:id', component: EditItem },
  { path: '/items/add', component: AddItem },
  { path: '/mutations', component: Mutation },
  // { path: '/categories', component: CategoryPanel },
]

const router = createRouter({
  history: createWebHistory(),
  routes,
})

createApp(App).use(router).use(Vue3Toastify).use(VueSweetalert2)
.use(PrimeVue, {
  theme: {
    preset: Aura,
    options: {
      darkModeSelector: 'class',
      cssLayer: {
        name: 'primevue',
        order: 'tailwind-base, primevue, tailwind-utilities'
      }
    }
}
})
.mount("#app");