<template>
  <section class="py-16 px-8 bg-gray-50 text-center">
    <h2 class="text-4xl font-bold mb-8">What Our Farmers Say</h2>
    
    <div class="relative max-w-xl mx-auto">
      <transition :name="transitionName">
        <div
          v-for="(testimonial, index) in testimonialsData"
          v-show="current === index"
          :key="testimonial.id"
          class="flex flex-col items-center p-8 bg-white rounded-lg shadow-md"
        >
          <img
            :src="testimonial.image"
            :alt="testimonial.name"
            class="w-24 h-24 rounded-full mb-4"
          />
          <p class="text-lg italic mb-4">"{{ testimonial.message }}"</p>
          <h3 class="text-xl font-semibold">{{ testimonial.name }}</h3>
          <span class="text-gray-500">{{ testimonial.location }}</span>
        </div>
      </transition>
      
      <!-- Navigation Buttons -->
      <div class="flex justify-center mt-6 space-x-4">
        <button
          @click="handlePrev"
          class="px-4 py-2 rounded-md bg-blue-600 text-white font-semibold hover:bg-blue-700 transition"
        >
          Prev
        </button>
        <button
          @click="handleNext"
          class="px-4 py-2 rounded-md bg-blue-600 text-white font-semibold hover:bg-blue-700 transition"
        >
          Next
        </button>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  data() {
    return {
      current: 0,
      testimonialsData: [
        {
          id: 1,
          name: "Olateju Saheed",
          location: "Lagos, Nigeria",
          message: "Nasradamuff Farm has completely transformed my farming business. The profit-sharing model allowed me to scale without upfront costs. I am grateful for their support!",
          image: "https://via.placeholder.com/150" // Replace with actual image URL
        },
        {
          id: 2,
          name: "Mary Oladejo",
          location: "Osogbo, Osun State Nigeria",
          message: "Their expert farming consultations have helped me improve my yield significantly. Nasradamuff Farm's team genuinely cares about our success.",
          image: "https://via.placeholder.com/150" // Replace with actual image URL
        },
        {
          id: 3,
          name: "Kolade Abdullah",
          location: "Kano, Nigeria",
          message: "The risk-mitigation and support they offer are unmatched. I feel more confident in my farming ventures thanks to Nasradamuff Farm.",
          image: "https://via.placeholder.com/150"
        }
      ]
    };
  },
  computed: {
    transitionName() {
      return this.current === 0 ? 'fade' : 'slide';
    }
  },
  methods: {
    handleNext() {
      this.current = (this.current + 1) % this.testimonialsData.length;
    },
    handlePrev() {
      this.current = (this.current - 1 + this.testimonialsData.length) % this.testimonialsData.length;
    }
  }
};
</script>

<style scoped>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active in <2.1.8 */ {
  opacity: 0;
}

.slide-enter-active, .slide-leave-active {
  transition: transform 0.5s;
}

.slide-enter, .slide-leave-to {
  transform: translateX(100%);
}
</style>
