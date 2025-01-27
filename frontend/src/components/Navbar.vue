<template>
  <nav>
    <div>
      <router-link to="/">Home</router-link>
      <router-link to="/profile">Profile</router-link>
      <router-link v-if="isAdmin" to="/admin-dashboard">Admin Dashboard</router-link>
      <button @click="logout">Logout</button>
    </div>
  </nav>
</template>

<script>
export default {
  computed: {
    isAdmin() {
      return localStorage.getItem("role") === "admin";
    },
  },
  methods: {
    logout() {
      localStorage.removeItem("token");
      localStorage.removeItem("role");
      this.$router.push("/login");
    },
  },
};
</script>
