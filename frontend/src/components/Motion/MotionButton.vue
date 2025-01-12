<template>
  <motion.button
    v-bind="$attrs"
    class="motion-button"
  >
    <slot />
  </motion.button>
</template>

<script>
import { motion } from "@vueuse/motion";

export default {
  name: "MotionButton",
  props: {
    whileHover: { type: Object, default: () => ({}) },
    whileTap: { type: Object, default: () => ({}) },
  },
};
</script>

<style scoped>
.motion-button {
  display: inline-block;
}
</style>
