<template>
  <div class="bg-gray-100 py-12">
    <section class="container mx-auto px-6">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Image Section -->
        <div class="flex justify-center items-center">
          <img
            src="@/assets/nasImages/broilers_bg.jpg"
            class="rounded-lg shadow-md"
            alt="NasFarm Logo"
          />
        </div>

        <!-- Form Section -->
        <div class="bg-white p-6 shadow-lg rounded-lg">
          <div class="text-center mb-6">
            <h2 class="text-3xl font-bold text-blue-600">Get In Touch</h2>
          </div>
          <form @submit.prevent="handleSubmit" class="space-y-4">
            <!-- Name Input -->
            <div>
              <input
                type="text"
                v-model="formData.name"
                class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                placeholder="Your Name"
                required
              />
            </div>

            <!-- Phone & Service Inputs -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <input
                type="text"
                v-model="formData.phone"
                class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                placeholder="Phone Number"
                required
              />
              <select
                v-model="formData.service"
                class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                required
              >
                <option value="">Select Service</option>
                <option value="Partnership">Partnership</option>
                <option value="Customer Application">Customer Application</option>
                <option value="Rendering Support">Rendering Support</option>
              </select>
            </div>

            <!-- Email Input -->
            <div>
              <input
                type="email"
                v-model="formData.email"
                class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                placeholder="Email"
                required
              />
            </div>

            <!-- Message Input -->
            <div>
              <textarea
                v-model="formData.message"
                class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                placeholder="Message"
                rows="4"
                required
              />
            </div>

            <!-- Submit Button -->
            <button
              type="submit"
              class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400"
            >
              SEND
            </button>
          </form>

          <!-- Success/Error Messages -->
          <div v-if="statusMessage" :class="statusClass" class="mt-4 text-center">
            {{ statusMessage }}
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
export default {
  data() {
    return {
      formData: {
        name: '',
        phone: '',
        service: '',
        email: '',
        message: '',
      },
      statusMessage: '',
      statusClass: '',
    };
  },
  methods: {
    async handleSubmit() {
      try {
        const response = await fetch('https://api-bkrt.onrender.com/api/contact/', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify(this.formData),
        });

        if (response.ok) {
          this.statusMessage = 'Your message has been sent successfully. You will soon get a feedback from us.';
          this.statusClass = 'text-green-500'; // Success class
          this.resetForm();
        } else {
          this.statusMessage = 'Failed to send message. Please try again.';
          this.statusClass = 'text-red-500'; // Error class
        }
      } catch (error) {
        console.error('Error:', error);
        this.statusMessage = 'An error occurred. Please try again.';
        this.statusClass = 'text-red-500'; // Error class
      }
    },
    resetForm() {
      this.formData = {
        name: '',
        phone: '',
        service: '',
        email: '',
        message: '',
      };
    },
  },
};
</script>

<style scoped>
/* Add any styles if needed */
</style>
