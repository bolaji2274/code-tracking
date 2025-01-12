<template>
  <div class="relative h-[80vh] overflow-hidden bg-gray-800 text-white">
    <!-- Slides -->
    <transition-group name="fade" tag="div">
      <div
        v-for="(slide, index) in slides"
        :key="index"
        v-show="currentSlide === index"
        class="absolute inset-0 flex items-center justify-center bg-cover bg-center transition-opacity duration-500"
        :style="{ backgroundImage: `url(${slide.image})` }"
      >
        <div class="bg-black bg-opacity-50 w-full h-full absolute top-0 left-0"></div>
        <div class="relative z-10 text-center px-6 max-w-3xl">
          <h1 class="text-5xl font-bold mb-4">{{ slide.title }}</h1>
          <p class="text-lg mb-6">{{ slide.description }}</p>
          <router-link :to="slide.link">
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
      class="absolute left-4 top-1/2 transform -translate-y-1/2 text-white bg-black bg-opacity-50 p-2 rounded-full hover:bg-opacity-70 transition"
    >
      <MdChevronLeft class="w-6 h-6" />
    </button>
    <button
      @click="nextSlide"
      class="absolute right-4 top-1/2 transform -translate-y-1/2 text-white bg-black bg-opacity-50 p-2 rounded-full hover:bg-opacity-70 transition"
    >
      <MdChevronRight class="w-6 h-6" />
    </button>

    <!-- Indicators -->
    <div
      class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex gap-2"
      @mouseenter="pauseAutoplay"
      @mouseleave="startAutoplay"
    >
      <span
        v-for="(slide, index) in slides"
        :key="index"
        @click="setCurrentSlide(index)"
        :class="[
          'cursor-pointer w-3 h-3 rounded-full',
          currentSlide === index ? 'bg-blue-600 scale-125' : 'bg-white'
        ]"
        class="transition transform duration-200"
      ></span>
    </div>
  </div>
</template>

<script>
import MdChevronLeft from "vue-material-design-icons/ChevronLeft.vue";
import MdChevronRight from "vue-material-design-icons/ChevronRight.vue";

import slide1 from "@/assets/images/chicken-3.jpg";
import slide2 from "@/assets/images/chicken-coop.jpg";
import slide3 from "@/assets/images/chicken-4.jpg";

export default {
  components: {
    MdChevronLeft,
    MdChevronRight,
  },
  data() {
    return {
      currentSlide: 0,
      autoplayInterval: null,
      slides: [
        {
          image: slide1,
          title: "Welcome to NASFARM",
          description:
            "Your trusted partner in livestock farming and agro-allied ventures. Empowering farmers with high-quality livestock, expert advice, and sustainable profit-sharing.",
          link: "#about",
        },
        {
          image: slide2,
          title: "Farming Consultation",
          description:
            "Providing expert advice for better farming practices. Join our consultation and grow with confidence.",
          link: "#services",
        },
        {
          image: slide3,
          title: "Profit-Sharing Programs",
          description:
            "Grow with us without financial risk. Join our profit-sharing programs and start growing with confidence.",
          link: "#contact",
        },
      ],
    };
  },
  created() {
    this.startAutoplay();
    window.addEventListener("keydown", this.handleKeyNavigation);
  },
  beforeDestroy() {
    this.stopAutoplay();
    window.removeEventListener("keydown", this.handleKeyNavigation);
  },
  methods: {
    nextSlide() {
      this.currentSlide = (this.currentSlide + 1) % this.slides.length;
    },
    prevSlide() {
      this.currentSlide =
        (this.currentSlide - 1 + this.slides.length) % this.slides.length;
    },
    setCurrentSlide(index) {
      this.currentSlide = index;
    },
    startAutoplay() {
      this.stopAutoplay();
      this.autoplayInterval = setInterval(this.nextSlide, 5000);
    },
    pauseAutoplay() {
      this.stopAutoplay();
    },
    stopAutoplay() {
      clearInterval(this.autoplayInterval);
    },
    handleKeyNavigation(event) {
      if (event.key === "ArrowRight") {
        this.nextSlide();
      } else if (event.key === "ArrowLeft") {
        this.prevSlide();
      }
    },
  },
};
</script>

<style scoped>
/* Fade Transition */
.fade-enter-active,
.fade-leave-active {
  transition: opacity 1s;
}
.fade-enter, 
.fade-leave-to {
  opacity: 0;
}

/* Advanced Styles */
button:focus {
  outline: none;
}
</style>
