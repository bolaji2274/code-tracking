<script setup>
import HeroPage from '@/components/HeroPage.vue';
import HeroCarousel from '@/components/Home/HeroCarousel.vue';
import AboutUsPage from '@/components/Home/AboutUsPage.vue';
import Product from '@/components/Home/Product.vue';
import About from '@/components/Home/About.vue';
import Services from '@/components/Home/Services.vue';
import Testimonials from '@/components/Home/Testimonials.vue';
</script>

<template>
  <main>
    <HeroPage />
    <HeroCarousel />
    <AboutUsPage />
    <Product />
    <About />
    <services />
    <Testimonials />
  </main>
</template>
