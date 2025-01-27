<template>
  <div>
    <h1>Admin Dashboard</h1>
    <div class="dashboard-stats">
      <div>Total Livestock: {{ stats.livestock }}</div>
      <div>Pending Applications: {{ stats.pending }}</div>
      <div>Approved Applications: {{ stats.approved }}</div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      stats: {
        livestock: 0,
        pending: 0,
        approved: 0,
      },
    };
  },
  async created() {
    const response = await axios.get("/dashboard/stats");
    this.stats = response.data;
  },
};
</script>

<style>
.dashboard-stats {
  display: flex;
  justify-content: space-around;
  /* Tailwind or custom styles */
}
</style>
