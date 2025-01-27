<template>
  <div>
    <h1>Apply for Livestock</h1>
    <form @submit.prevent="submitApplication">
      <select v-model="livestock_id" required>
        <option v-for="livestock in livestockList" :value="livestock.id" :key="livestock.id">
          {{ livestock.type }} ({{ livestock.quantity }} available)
        </option>
      </select>
      <input v-model="quantity_requested" type="number" min="1" required placeholder="Quantity" />
      <button type="submit">Submit</button>
    </form>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      livestockList: [],
      livestock_id: null,
      quantity_requested: 1,
    };
  },
  async created() {
    const response = await axios.get("/livestock");
    this.livestockList = response.data;
  },
  methods: {
    async submitApplication() {
      try {
        await axios.post("/applications", {
          livestock_id: this.livestock_id,
          quantity_requested: this.quantity_requested,
        });
        alert("Application submitted successfully!");
      } catch (error) {
        alert("Application failed!");
      }
    },
  },
};
</script>
