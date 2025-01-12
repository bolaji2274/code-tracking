<template>
  <div :class="['fixed top-0 bottom-0 z-20 flex flex-col justify-between bg-white px-8 pb-6 pt-16 text-black md:hidden rounded-r-xl shadow-md', { 'left-0': showMenu, '-left-[100%]': !showMenu }]">
    <div>
      <div class="flex items-center justify-start gap-3">
        <img
          src="@/assets/images/nasfarm-logo.ico"
          alt="logo"
          class="w-10 inline-block rounded-full"
        />
        <div>
          <h1 class="text-green-300">Welcome To <span class="text-2xl text-black">Nas<span class="text-3xl text-green-400">Farm</span></span></h1>
        </div>
      </div>
      <nav class="mt-12">
        <ul class="flex flex-col space-y-4 text-xl">
          <router-link to="/" @click="toggleMenu"><li>Home</li></router-link>
          <router-link to="#about" @click="toggleMenu"><li>About</li></router-link>
          <router-link to="#contact" @click="toggleMenu"><li>Contact</li></router-link>
          <router-link to="#services" @click="toggleMenu"><li>Services</li></router-link>
          <router-link to="#product" @click="toggleMenu"><li>Products</li></router-link>

          <template v-if="token">
            <router-link :to="isAdmin ? '/admin/dashboard' : '/customer/dashboard'">
              <button class="bg-green-500 text-white px-4 py-1 rounded-md">Dashboard</button>
            </router-link>
            <button @click="userLogout" class="ms-2 m-btn">Logout</button>
          </template>
          <template v-else>
            <router-link to="/login" @click="toggleMenu">
              <button class="ms-2 m-btn">Login</button>
            </router-link>
            <router-link to="/register" @click="toggleMenu">
              <button class="ms-2 m-btn">Register</button>
            </router-link>
          </template>
        </ul>
      </nav>
    </div>
    <div>
      <h5>Made with ❤️ by Bolaji</h5>
    </div>
  </div>
</template>

<script>
import { computed } from "vue";
import { useRouter } from "vue-router";
import { useAuthContext } from "@/components/context/AuthContext";

const jwtDecode = (await import("jwt-decode")).default;

export default {
  props: {
    showMenu: {
      type: Boolean,
      required: true,
    },
  },
  setup(props, { emit }) {
    const { user, logoutUser } = useAuthContext();
    const token = localStorage.getItem("authTokens");
    const router = useRouter();

    const isAdmin = computed(() => {
      if (token) {
        const decodedToken = jwtDecode(token);
        return decodedToken.is_admin;
      }
      return false;
    });

    const userLogout = () => {
      logoutUser();
      router.push("/logout");
    };

    const toggleMenu = () => {
      emit("toggleMenu");
    };

    return {
      token,
      isAdmin,
      userLogout,
      toggleMenu,
    };
  },
};
</script>

<style scoped>
/* Add any custom styles here */
</style>
