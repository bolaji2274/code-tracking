<template>
  <div>
    <h1>Low Stock Livestock</h1>
    <ul>
      <li v-for="item in livestock" :key="item.id">
        <span>{{ item.type }}: {{ item.quantity }}</span>
      </li>
    </ul>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      livestock: [],
    };
  },
  async created() {
    const response = await axios.get("/low-stock", {
      headers: { Authorization: `Bearer ${localStorage.getItem("token")}` },
    });
    this.livestock = response.data;
  },
};
</script>
