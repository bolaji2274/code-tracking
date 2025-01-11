<template>
  <div class="bg-gray-50">
    <!-- Mission & Vision -->
    <section class="py-16 px-8 md:px-16 text-center">
      <MotionDiv
        :initial="{ opacity: 0 }"
        whileInView="{ opacity: 1 }"
        :transition="{ delay: 0.3 }"
        class="text-4xl font-semibold text-gray-800 mb-4"
      >
        Our Mission & Vision
      </MotionDiv>
      <p class="text-gray-600 max-w-2xl mx-auto">
        At NASFARM, we are committed to providing farmers with access to the resources and knowledge they need to succeed. Our mission is to foster growth and stability in the agricultural industry by offering livestock, support, and innovative profit-sharing.
      </p>
      <MotionDiv
        :initial="{ opacity: 0, scale: 0.9 }"
        whileHover="{ scale: 1.1 }"
        class="mt-6"
      >
        <button
          @click="toggleFullDescription"
          class="mt-6 mb-5 bg-blue-600 text-white px-6 py-2 rounded-md font-semibold hover:bg-blue-700 transition"
        >
          {{ showFullDescription ? "Read Less" : "Read More" }}
        </button>
      </MotionDiv>

      <MotionDiv
        v-if="showFullDescription"
        :initial="{ opacity: 0, y: 10 }"
        :animate="{ opacity: 1, y: 0 }"
        :transition="{ duration: 0.5 }"
        class="mt-8 text-gray-600 max-w-2xl mx-auto text-center"
      >
        <p class="mb-4">
          NASFARM was founded on the belief that every farmer should have access to quality livestock, expert guidance, and risk-free financial models. We prioritize the health and well-being of all animals under our care, ensuring that farmers receive only the best.
        </p>
        <p class="mb-4">
          Our approach is to provide tailored support to each farmer, understanding that every farm is unique. Whether through our high-quality livestock, dedicated consultation services, or unique profit-sharing programs, we help farmers thrive with confidence.
        </p>
        <p class="mb-4">
          Additionally, our ethical farming commitments mean that farmers take oaths to ensure livestock welfare, and we require guarantors and next-of-kin information to maintain accountability. Our inventory tracking keeps all parties informed of livestock availability and progress, fostering transparency and trust.
        </p>
      </MotionDiv>
    </section>

    <!-- Call-to-Action Section -->
    <section class="py-16 bg-blue-600 text-white">
      <div class="container mx-auto px-8 md:px-16 text-center">
        <MotionDiv
          :initial="{ opacity: 0 }"
          whileInView="{ opacity: 1 }"
          :transition="{ delay: 0.3 }"
          class="text-4xl font-semibold mb-4"
        >
          Partner with NASFARM Today
        </MotionDiv>
        <p class="text-lg mb-6">
          Ready to grow your farm? Connect with us and start your journey to success.
        </p>
        <MotionButton
          :whileHover="{ scale: 1.1 }"
          class="px-6 py-3 rounded-md bg-white text-blue-600 font-bold"
        >
          <router-link to="/contact" class="text-blue-600">
            Contact Us
          </router-link>
        </MotionButton>
      </div>
    </section>
  </div>
</template>

<script>
import { ref } from "vue";

export default {
  name: "AboutUsPage",
  setup() {
    const showFullDescription = ref(false);

    const toggleFullDescription = () => {
      showFullDescription.value = !showFullDescription.value;
    };

    return {
      showFullDescription,
      toggleFullDescription,
    };
  },
};
</script>

<style scoped>
.container {
  max-width: 1200px;
}
</style>
