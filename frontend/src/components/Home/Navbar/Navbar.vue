<template>
  <div class="bg-white fixed w-full z-50 shadow-sm top-0 shadow-gray-400">
    <div class="max-w-7xl mx-auto py-2 px-5 flex justify-between items-center">
      <router-link to="/" class="text-2xl font-semibold flex items-center space-x-3">
        <img
          src="@/assets/images/nasfarm-logo.ico"
          alt="logo"
          class="w-10 inline-block rounded-full"
        />
        <h2 class="text-2xl text-black">Nas<span class="text-3xl text-green-500">Farm</span></h2>
      </router-link>

      <div class="flex items-center gap-5">
        <nav class="hidden md:block">
          <ul class="flex items-center font-semibold text-xl gap-7">
            <router-link to="/"><li>Home</li></router-link>
            <router-link to="#about"><li>About</li></router-link>
            <router-link to="#contact"><li>Contact</li></router-link>
            <router-link to="#services"><li>Services</li></router-link>
            <router-link to="#product"><li>Products</li></router-link>

            <div class="ml-24">
              <template v-if="token">
                <router-link :to="isAdmin ? '/admin/dashboard' : '/customer/dashboard'">
                  <button class="bg-green-500 text-white px-4 py-1 rounded-md">Dashboard</button>
                </router-link>
                <button @click="userLogout" class="ms-2 m-btn">Logout</button>
              </template>
              <template v-else>
                <router-link to="/login">
                  <button class="ms-2 m-btn">Login</button>
                </router-link>
                <router-link to="/register">
                  <button class="ms-2 m-btn">Register</button>
                </router-link>
              </template>
            </div>
          </ul>
        </nav>

        <!-- mobile hamburger icon -->
        <div @click="toggleMenu" class="cursor-pointer md:hidden">
          <span v-if="!showMenu">☰</span>
          <span v-else>✖</span>
        </div>
      </div>
    </div>
    <ResponsiveMenu :showMenu="showMenu" @toggleMenu="toggleMenu" />
  </div>
</template>

<script>
import { computed, ref } from "vue";
import ResponsiveMenu from "./ResponsiveMenu.vue";
import { useRouter } from "vue-router";
import { useAuthContext } from "@/components/context/AuthContext";

const jwtDecode = (await import("jwt-decode")).default;

export default {
  components: {
    ResponsiveMenu,
  },
  setup() {
    const router = useRouter();
    const { user, logoutUser } = useAuthContext();
    const showMenu = ref(false);
    const token = localStorage.getItem("authTokens");
    const isAdmin = computed(() => {
      if (token) {
        const decodedToken = jwtDecode(token);
        return decodedToken.is_admin;
      }
      return false;
    });

    const toggleMenu = () => {
      showMenu.value = !showMenu.value;
    };

    const userLogout = () => {
      logoutUser();
      router.push("/logout");
    };

    return {
      showMenu,
      token,
      isAdmin,
      toggleMenu,
      userLogout,
    };
  },
};
</script>

<style scoped>
/* Add any custom styles here */
</style>
