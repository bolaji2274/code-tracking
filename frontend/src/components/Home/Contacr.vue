<template>
  <div class="bg-gray-100 py-12">
    <section class="container mx-auto px-6">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div
          class="flex justify-center items-center"
          :style="{ opacity: imageOpacity, transform: imageTransform }"
        >
          <img src="@/assets/nasImages/broilers_bg.jpg" class="rounded-lg shadow-md" alt="NasFarm Logo" />
        </div>
        <div
          class="bg-white p-6 shadow-lg rounded-lg"
          :style="{ opacity: formOpacity, transform: formTransform }"
        >
          <div class="text-center mb-6">
            <h2 class="text-3xl font-bold text-blue-600">Get In Touch</h2>
          </div>
          <form @submit.prevent="handleSubmit" class="space-y-4">
            <div>
              <input
                type="text"
                class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                placeholder="Your Name"
                v-model="formData.name"
                required
              />
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <input
                type="text"
                class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                placeholder="Phone Number"
                v-model="formData.phone"
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
            <div>
              <input
                type="email"
                class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                placeholder="Email"
                v-model="formData.email"
                required
              />
            </div>
            <div>
              <textarea
                class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                placeholder="Message"
                v-model="formData.message"
                rows="4"
                required
              />
            </div>
            <button
              type="submit"
              class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400"
            >
              SEND
            </button>
          </form>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import axios from 'axios';

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
      imageOpacity: 0,
      imageTransform: 'translateX(-50px)',
      formOpacity: 0,
      formTransform: 'translateX(50px)',
    };
  },
  methods: {
    async handleSubmit() {
      try {
        const response = await axios.post('https://api-bkrt.onrender.com/api/contact/', this.formData);
        if (response.status === 200) {
          this.$swal({
            title: 'Your message has been sent successfully, You will soon get feedback from us.',
            icon: 'success',
            toast: true,
            timer: 6000,
            position: 'top-right',
            timerProgressBar: true,
            showConfirmButton: false,
          });
          this.resetForm();
        }
      } catch (error) {
        console.error('Error:', error);
        this.$swal({
          title: 'An error occurred. Please try again.',
          icon: 'error',
          toast: true,
          timer: 6000,
          position: 'top-right',
          timerProgressBar: true,
          showConfirmButton: false,
        });
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
  watch: {
    '$route'() {
      // You can use this watch function to handle page transitions or other reactive behavior.
      // It's for transitions (opacity and transform) for smoother page movement.
      this.imageOpacity = 1;
      this.imageTransform = 'translateX(0)';
      this.formOpacity = 1;
      this.formTransform = 'translateX(0)';
    },
  },
};
</script>

<style scoped>
/* Add custom styles as needed */
.contact_section .form_container {
    padding-left: 10px;
    padding-right: 10px;
  }
</style>
