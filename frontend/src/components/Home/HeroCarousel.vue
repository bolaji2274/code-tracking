<template>
  <div class="relative h-[80vh] overflow-hidden bg-gray-800 text-white">
    <transition-group name="fade" tag="div">
      <div
        v-for="(slide, index) in slides"
        v-if="index === currentSlide"
        :key="index"
        class="absolute inset-0 flex items-center justify-center bg-cover bg-center"
        :style="{ backgroundImage: `url(${slide.image})` }"
        :class="['fade', { 'opacity-0': fadeOut, 'opacity-100': !fadeOut }]"
      >
        <div class="bg-black bg-opacity-50 w-full h-full absolute top-0 left-0"></div>
        <div class="relative z-10 text-center px-6 max-w-3xl">
          <h1 class="text-5xl font-bold mb-4">{{ slide.title }}</h1>
          <p class="text-lg mb-6">{{ slide.description }}</p>
          <router-link to="#services">
            <button class="px-6 py-3 bg-blue-600 text-white rounded-md font-semibold hover:bg-blue-700 transition">
              Learn More
            </button>
          </router-link>
        </div>
      </div>
    </transition-group>

    <!-- Navigation Buttons -->
    <button
      @click="prevSlide"
      class="absolute left-4 top-1/2 transform -translate-y-1/2 text-white bg-black bg-opacity-50 p-2 rounded-full"
    >
      <MdArrowBackIos size="24" />
    </button>
    <button
      @click="nextSlide"
      class="absolute right-4 top-1/2 transform -translate-y-1/2 text-white bg-black bg-opacity-50 p-2 rounded-full"
    >
      <MdArrowForwardIos size="24" />
    </button>

    <!-- Indicators -->
    <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex gap-2">
      <span
        v-for="(slide, index) in slides"
        :key="index"
        @click="setCurrentSlide(index)"
        :class="[
          'cursor-pointer w-3 h-3 rounded-full',
          currentSlide === index ? 'bg-blue-600' : 'bg-white'
        ]"
      ></span>
    </div>
  </div>
</template>

<script>
import { MdArrowBackIos, MdArrowForwardIos } from 'vue-icons/md'; // Ensure you have a Vue icon package installed

import slide1 from '@/assets/images/chicken-3.jpg';
import slide2 from '@/assets/images/chicken-coop.jpg';
import slide3 from '@/assets/images/chicken-4.jpg';

export default {
  data() {
    return {
      currentSlide: 0,
      fadeOut: false,
      slides: [
        {
          image: slide1,
          title: 'Welcome to NASFARM',
          description:
            'Your Trusted Partner in Livestock Farming and Agro-Allied Ventures. Empowering Farmers with High-Quality Livestock, Expert Advice, and Sustainable Profit-Sharing. Whether you’re into fish farming, broilers, layers, or other livestock. We make it easy for you to apply for the resources you need, from birds or fish to feed and drugs. Join our Farming Consultation and Start Growing with Confidence.',
        },
        {
          image: slide2,
          title: 'Farming Consultation',
          description:
            'Providing Expert Advice for Better Farming Practices. And we make it easy for you to apply for the resources you need, from birds or fish to feed and drugs. Join our Farming Consultation and Start Growing with Confidence.',
        },
        {
          image: slide3,
          title: 'Profit-Sharing Programs',
          description:
            'Grow with Us Without Financial Risk. We are empowering Farmers, Growing Livestock, and with our Profit-Sharing Programs. Join our Profit-Sharing Programs and Start Growing with Confidence.',
        },
      ],
    };
  },
  created() {
    // Auto slide functionality
    setInterval(() => {
      this.fadeOut = true;
      setTimeout(() => {
        this.currentSlide = (this.currentSlide + 1) % this.slides.length;
        this.fadeOut = false;
      }, 500);
    }, 5000);
  },
  methods: {
    prevSlide() {
      this.fadeOut = true;
      setTimeout(() => {
        this.currentSlide = (this.currentSlide - 1 + this.slides.length) % this.slides.length;
        this.fadeOut = false;
      }, 500);
    },
    nextSlide() {
      this.fadeOut = true;
      setTimeout(() => {
        this.currentSlide = (this.currentSlide + 1) % this.slides.length;
        this.fadeOut = false;
      }, 500);
    },
    setCurrentSlide(index) {
      this.currentSlide = index;
    },
  },
};
</script>

<style scoped>
.fade-enter-active, .fade-leave-active {
  transition: opacity 1s;
}

.fade-enter, .fade-leave-to {
  opacity: 0;
}
</style>
