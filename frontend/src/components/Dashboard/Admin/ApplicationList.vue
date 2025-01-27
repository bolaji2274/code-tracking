<template>
  <div>
    <h1>Applications</h1>
    <table>
      <thead>
        <tr>
          <th>Customer</th>
          <th>Livestock</th>
          <th>Quantity</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="app in applications" :key="app.id">
          <td>{{ app.user.name }}</td>
          <td>{{ app.livestock.type }}</td>
          <td>{{ app.quantity_requested }}</td>
          <td>{{ app.status }}</td>
          <td>
            <button @click="updateStatus(app.id, 'Approved')">Approve</button>
            <button @click="updateStatus(app.id, 'Declined')">Decline</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      applications: [],
    };
  },
  async created() {
    const response = await axios.get("/applications", {
      headers: { Authorization: `Bearer ${localStorage.getItem("token")}` },
    });
    this.applications = response.data;
  },
  methods: {
    async updateStatus(applicationId, status) {
      try {
        await axios.put(
          `/applications/${applicationId}`,
          { status },
          { headers: { Authorization: `Bearer ${localStorage.getItem("token")}` } }
        );
        alert("Status updated!");
        this.applications = this.applications.map((app) =>
          app.id === applicationId ? { ...app, status } : app
        );
      } catch (error) {
        alert("Failed to update status");
      }
    },
  },
};
</script>
