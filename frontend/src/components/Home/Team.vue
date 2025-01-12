<template>
  <section class="py-16 px-8 bg-gray-100 text-center">
    <h2 class="text-4xl font-semibold text-gray-800 mb-6">Meet Our Team</h2>
    <div class="flex flex-col md:flex-row justify-center gap-8 mt-8 max-w-4xl mx-auto">
      <!-- Team Member 1 -->
      <div 
        class="bg-white p-6 rounded-lg shadow-lg" 
        @mouseover="hover = true" 
        @mouseleave="hover = false"
        :class="{ 'transform scale-105': hover }"
      >
        <img 
          :src="teamImage" 
          alt="Team Member" 
          class="rounded-full h-32 w-32 mx-auto mb-4" 
        />
        <h3 class="text-xl font-bold text-gray-700">Bala Rasheed</h3>
        <p class="text-gray-600">CEO & Founder</p>
      </div>

      <!-- Team Member 2 -->
      <div 
        class="bg-white p-6 rounded-lg shadow-lg" 
        @mouseover="hover = true" 
        @mouseleave="hover = false"
        :class="{ 'transform scale-105': hover }"
      >
        <img 
          :src="teamImage" 
          alt="Team Member" 
          class="rounded-full h-32 w-32 mx-auto mb-4" 
        />
        <h3 class="text-xl font-bold text-gray-700">Bala Rasheed</h3>
        <p class="text-gray-600">Agriculture Specialist</p>
      </div>
    </div>
  </section>
</template>

<script>
import teamImage from '@/assets/tabs/2.png';

export default {
  data() {
    return {
      hover: false
    };
  }
};
</script>

<style scoped>
.transform {
  transition: transform 0.3s ease-in-out;
}
.scale-105 {
  transform: scale(1.05);
}
</style>
