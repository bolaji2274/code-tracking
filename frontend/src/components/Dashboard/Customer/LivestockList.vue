<template>
  <div>
    <h1>Available Livestock</h1>
    <div v-for="livestock in livestockList" :key="livestock.id" class="livestock-item">
      <h3>{{ livestock.type }}</h3>
      <p>Quantity: {{ livestock.quantity }}</p>
      <p>Price: {{ livestock.price }}</p>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      livestockList: [],
    };
  },
  async created() {
    const response = await axios.get("/livestock");
    this.livestockList = response.data;
  },
};
</script>

<style>
.livestock-item {
  border: 1px solid #ddd;
  padding: 1rem;
  margin-bottom: 1rem;
  border-radius: 0.5rem;
}
</style>
