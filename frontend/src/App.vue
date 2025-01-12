<script setup>
import { ref, onMounted } from "vue";
import Spinner from "@/components/Home/Spinner.vue"; // Import your Spinner component
import { RouterView } from "vue-router";
// import { provideAuthContext } from "@/components/context/AuthContext";
import { provideAuthContext } from "@/components/context/AuthContext"

provideAuthContext();
// State for loading spinner
const isLoading = ref(true);

// Simulate loading time or perform initial data loading
onMounted(() => {
  setTimeout(() => {
    isLoading.value = false;
  }, 2000); // Adjust timeout as needed
});
</script>

<template>
  <div>
    <!-- Spinner -->
    <Spinner :show="isLoading" />

    <!-- Main content -->
    <header v-if="!isLoading">
      <div class="wrapper">
        <nav>
          <!-- Navigation links -->
          <!-- <RouterLink to="/">Home</RouterLink>
          <RouterLink to="/about">About</RouterLink> -->
        </nav>
      </div>
    </header>

    <!-- Router view (renders routed components) -->
    <RouterView v-if="!isLoading" />
  </div>
</template>

<style scoped>
/* Add or modify your styles here */
/* .wrapper {
  text-align: center;
  margin: 20px 0;
}

nav a {
  margin: 0 10px;
  text-decoration: none;
  color: #3498db;
  font-weight: bold;
}

nav a:hover {
  text-decoration: underline;
} */
</style>
