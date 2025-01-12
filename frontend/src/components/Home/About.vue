<template>
  <div>
    <!-- About Section -->
    <section class="about_section layout_padding bg-gray-100 py-12">
      <div class="container mx-auto">
        <div class="flex flex-col md:flex-row">
          <div class="md:w-5/12">
            <div class="img-box">
              <img
                :src="broilersImage"
                class="w-full h-auto object-cover rounded-lg shadow-md"
                alt="about img"
              />
            </div>
          </div>
          <div class="md:w-7/12 md:pl-8">
            <div class="detail-box">
              <h2 class="text-4xl font-bold text-gray-800 mb-4">About Us</h2>
              <p class="text-gray-700 text-lg mb-4">
                At Nasradamuff Farm and Agro-Allied Ventures, we specialize in livestock farming, inventory management, and providing farmers with the resources they need to succeed. With decades of experience in the agro-industry, we ensure that our clients get the best livestock, feed, and farming support.
              </p>
              <p class="text-gray-700 mb-4">
                Our mission is to empower farmers through sustainable practices, quality livestock, and transparent profit-sharing models. We believe in making a positive impact on the agricultural industry by supporting every farmer's unique needs.
              </p>
              <router-link
                to="/about#full-description"
                class="text-blue-600 hover:underline font-semibold"
              >
                Read More
              </router-link>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Sliding Image Carousel Section -->
    <section class="carousel_section py-16 bg-white">
      <div class="container mx-auto">
        <h2 class="text-4xl font-semibold text-gray-800 mb-6 text-center">Our Livestock Services</h2>
        <div class="livestock-slider">
          <div
            v-for="(image, index) in images"
            :key="index"
            class="px-4"
            @mouseover="hoverImage(index)"
            @mouseleave="leaveImage(index)"
          >
            <transition :name="'scale' + index">
              <img
                :src="image"
                class="w-full h-64 object-cover rounded-lg shadow-md transition-transform duration-500"
                :style="{
                  transform: isHovered[index] ? 'scale(1.1)' : 'scale(1)',
                }"
                alt="Livestock Image"
              />
            </transition>
          </div>
        </div>
      </div>
    </section>

    <!-- Mission & Vision Section -->
    <section id="full-description" class="mission_vision_section py-16 px-8 md:px-16 text-center bg-white">
      <h2 class="text-4xl font-semibold text-gray-800 mb-6">Our Mission & Vision</h2>
      <p class="text-gray-600 max-w-3xl mx-auto mb-8">
        Nasradamuff Farm is dedicated to driving growth and sustainability in the agricultural sector. We aim to bridge the gap between modern farming techniques and traditional practices, making high-quality livestock and resources accessible to all.
      </p>
      <p class="text-gray-600 max-w-3xl mx-auto mb-8">
        We envision a future where every farmer, big or small, can rely on our support to overcome challenges, improve yields, and participate in profit-sharing that benefits their livelihoods and communities.
      </p>
    </section>

    <!-- Call-to-Action Section -->
    <section class="py-16 bg-blue-600 text-white text-center">
      <h2 class="text-4xl font-semibold mb-4">Partner with NASFARM Today</h2>
      <p class="text-lg mb-6">Ready to grow your farm? Connect with us and start your journey to success.</p>
      <router-link to="/contact" class="inline-block">
        <button
          class="px-6 py-3 rounded-md bg-white text-blue-600 font-bold transform transition-all duration-300 hover:scale-105"
        >
          Contact Us
        </button>
      </router-link>
    </section>
  </div>
</template>

<script>
import broilersImage from "@/assets/nasImages/broilers_bg.jpg";
import chicksImage from "@/assets/nasImages/chicks_farm.jpg";
import broilerMultipleImage from "@/assets/nasImages/broiler_multiple.jpg";
import chickenBgImage from "@/assets/nasImages/chicken_bg.jpg";

export default {
  data() {
    return {
      images: [chicksImage, broilersImage, broilerMultipleImage, chickenBgImage],
      broilersImage,
      isHovered: [false, false, false, false],
    };
  },
  methods: {
    hoverImage(index) {
      this.$set(this.isHovered, index, true);
    },
    leaveImage(index) {
      this.$set(this.isHovered, index, false);
    },
  },
};
</script>

<style scoped>
.livestock-slider {
  display: flex;
  gap: 20px;
  overflow-x: scroll;
  justify-content: center;
}

.scale0,
.scale1,
.scale2,
.scale3 {
  transition: transform 0.3s ease;
}

.scale0-enter-active,
.scale1-enter-active,
.scale2-enter-active,
.scale3-enter-active {
  transition: transform 0.3s ease;
}

.scale0-leave-active,
.scale1-leave-active,
.scale2-leave-active,
.scale3-leave-active {
  transition: transform 0.3s ease;
}

.layout_padding {
  padding: 90px 0;
}

.layout_padding2 {
  padding: 75px 0;
}

.layout_padding2-top {
  padding-top: 75px;
}

.layout_padding2-bottom {
  padding-bottom: 75px;
}

.layout_padding-top {
  padding-top: 90px;
}

.layout_padding-bottom {
  padding-bottom: 90px;
}
.about_section .row {
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
}

.about_section .img-box {
  position: relative;
  overflow: hidden;
  height: 100%;
}

.about_section .img-box img {
  width: 100%;
  margin-right: 40px;
  border-radius: 10px;
}

.about_section .detail-box p {
  color: #1f1f1f;
  margin-top: 15px;
}

.about_section .detail-box a {
  display: inline-block;
  padding: 10px 35px;
  background-color: #2c7873;
  color: #ffffff;
  border-radius: 0px;
  -webkit-transition: all .3s;
  transition: all .3s;
  border: 1px solid #2c7873;
  margin-top: 15px;
}

.about_section .detail-box a:hover {
  background-color: transparent;
  color: #2c7873;
}

.carousel_section {
  padding: 4rem 0;
}

.container {
  width: 100%;
  max-width: 1200px;
  margin: 0 auto;
  padding-left: 20px;
  padding-right: 20px;
}
</style>
