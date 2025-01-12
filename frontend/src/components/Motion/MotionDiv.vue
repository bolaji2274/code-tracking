<template>
  <motion.div
    v-bind="$attrs"
    class="motion-div"
  >
    <slot />
  </motion.div>
</template>

<script>
import { motion } from "@vueuse/motion";

export default {
  name: "MotionDiv",
  props: {
    initial: { type: Object, default: () => ({}) },
    animate: { type: Object, default: () => ({}) },
    whileInView: { type: Object, default: () => ({}) },
    transition: { type: Object, default: () => ({}) },
  },
};
</script>

<style scoped>
.motion-div {
  display: inherit;
}
</style>
