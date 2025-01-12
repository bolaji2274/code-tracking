<template>
  <div>
    <!-- Services Section -->
    <section class="bg-gray-100 py-16">
      <div class="max-w-6xl mx-auto text-center">
        <h2
          class="text-4xl font-semibold text-gray-800 mb-6"
          v-motion:in-view="{ opacity: 1 }"
          :style="{ opacity: 0 }"
        >
          Our Services
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <!-- Livestock Supply -->
          <div
            class="bg-white p-6 rounded-lg shadow-lg"
            :whileHover="{ scale: 1.05 }"
          >
            <img
              :src="servicesImage3"
              alt="Livestock"
              class="rounded-md h-48 w-full object-cover mb-4"
            />
            <h3 class="text-xl font-bold text-gray-700">High-Quality Livestock</h3>
            <p class="text-gray-600 mt-2">
              Broilers, layers, and fish, raised under optimal conditions for farmers’ success.
            </p>
          </div>
          <!-- Consultation -->
          <div
            class="bg-white p-6 rounded-lg shadow-lg"
            :whileHover="{ scale: 1.05 }"
          >
            <img
              :src="servicesImage"
              alt="Consultation"
              class="rounded-md h-48 w-full object-cover mb-4"
            />
            <h3 class="text-xl font-bold text-gray-700">Farming Consultation</h3>
            <p class="text-gray-600 mt-2">
              Expert agricultural advice for better livestock management and productivity.
            </p>
          </div>
          <!-- Profit-Sharing -->
          <div
            class="bg-white p-6 rounded-lg shadow-lg"
            :whileHover="{ scale: 1.05 }"
          >
            <img
              :src="servicesImage2"
              alt="Profit Sharing"
              class="rounded-md h-48 w-full object-cover mb-4"
            />
            <h3 class="text-xl font-bold text-gray-700">Profit-Sharing Programs</h3>
            <p class="text-gray-600 mt-2">
              Join our profit-sharing model and grow without upfront capital investment.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- What We Offer Section -->
    <section class="services_section py-16 bg-gray-50 text-center">
      <h2 class="text-4xl font-semibold text-gray-800 mb-6">What We Offer</h2>
      <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="service-box bg-white p-6 rounded-lg shadow-md">
          <h3 class="text-2xl font-semibold mb-4 text-gray-800">Livestock Supply</h3>
          <p class="text-gray-600">
            We provide a wide range of high-quality livestock, including poultry, cattle, and fish, all raised with care and adhering to the highest standards of health and welfare.
          </p>
        </div>
        <div class="service-box bg-white p-6 rounded-lg shadow-md">
          <h3 class="text-2xl font-semibold mb-4 text-gray-800">Farming Consultation</h3>
          <p class="text-gray-600">
            Our experts offer personalized consultation services, helping farmers optimize their operations, adopt sustainable practices, and maximize profitability.
          </p>
        </div>
        <div class="service-box bg-white p-6 rounded-lg shadow-md">
          <h3 class="text-2xl font-semibold mb-4 text-gray-800">Profit-Sharing Programs</h3>
          <p class="text-gray-600">
            We engage in partnerships with farmers through innovative profit-sharing arrangements, ensuring that their hard work translates into sustainable financial growth.
          </p>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
// import { motion } from "framer-motion";
import servicesImage from "@/assets/images/chicken-3.jpg";
import servicesImage2 from "@/assets/nasImages/broilers_bg.jpg";
import servicesImage3 from "@/assets/nasImages/broilers.jpg";

export default {
  name: "Services",
  components: {
    // motion,
  },
  data() {
    return {
      servicesImage,
      servicesImage2,
      servicesImage3,
    };
  },
};
</script>

<style scoped>
.bg-gray-100 {
  background-color: #f7fafc;
}

.bg-gray-50 {
  background-color: #f9fafb;
}

.container {
  width: 100%;
  max-width: 1200px;
  margin: 0 auto;
  padding-left: 20px;
  padding-right: 20px;
}

.service-box {
  background-color: #ffffff;
  padding: 24px;
  border-radius: 8px;
  box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
}

.service-box h3 {
  font-size: 1.5rem;
  margin-bottom: 1rem;
  color: #1f2937;
}

.service-box p {
  color: #4b5563;
}

h2 {
  font-size: 2rem;
}

.grid {
  display: grid;
  grid-template-columns: repeat(1, 1fr);
  gap: 2rem;
}

@media (min-width: 768px) {
  .grid {
    grid-template-columns: repeat(3, 1fr);
  }
}

.motion h2 {
  opacity: 0;
}
</style>
