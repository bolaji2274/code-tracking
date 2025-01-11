<template>
  <div class="product-list-container">
    <!-- Animated Title -->
    <h2
      ref="titleRef"
      class="text-2xl font-semibold font-serif text-gray-700 mb-6 mt-6 text-center"
    >
      Check Out Our Best Quality Products Below
    </h2>

    <div class="product-grid">
      <!-- Product Cards -->
      <div v-for="product in limitedProducts" :key="product.id" class="product-card">
        <router-link :to="`/product/${product.id}`">
          <img
            :src="product.image"
            :alt="product.name"
            class="product-image"
          />
        </router-link>
        <div class="product-details">
          <router-link :to="`/product/${product.id}`">
            <div>
              <h3>{{ product.name }}</h3>
              <p>Category: {{ product.category }}</p>
              <p>Price: ₦{{ product.price.toFixed(2) }}</p>
              <p>Stock: {{ product.stock }} available</p>
            </div>
          </router-link>
          <!-- <input
            type="number"
            v-model="quantities[product.id]"
            :max="product.stock"
            placeholder="Enter Quantity"
            class="quantity-input"
          /> -->
          <!-- <button
            :disabled="!isQuantityValid(product.id)"
            @click="addToCart(product)"
            class="add-to-cart-button"
          >
            Add to Cart
          </button> -->
        </div>
      </div>
    </div>

    <!-- See More Button -->
    <div class="see-more-container mt-8" style="text-align: center">
      <router-link to="/store">
        <button class="see-more-button mt-6 mb-5 bg-blue-500 text-white px-6 py-2 rounded-md font-semibold hover:bg-blue-400 transition">See More Products</button>
      </router-link>
    </div>
  </div>
</template>

<script>
import { ref, computed } from "vue";
import { useProductStore } from "@/stores/product";
import { useMotion } from "@vueuse/motion";

export default {
  setup() {
    const productStore = useProductStore();
    const titleRef = ref(null);
    const quantities = ref({});

    // Limit products to the first 4
    const limitedProducts = computed(() => productStore.products.slice(0, 4));

    // Add animation to the title
    useMotion(titleRef, {
      initial: { opacity: 0, y: -20 },
      enter: { opacity: 1, y: 0, transition: { delay: 0.3 } },
    });

    // Add to cart
    const addToCart = (product) => {
      const quantity = quantities.value[product.id];
      if (quantity > 0 && quantity <= product.stock) {
        alert(
          `Added ${quantity} of ${product.name} to the cart!` // Placeholder cart action
        );
        quantities.value[product.id] = 0; // Reset quantity
      }
    };

    // Validate quantity
    const isQuantityValid = (id) => {
      const quantity = quantities.value[id];
      return quantity && quantity > 0;
    };

    return {
      titleRef,
      limitedProducts,
      quantities,
      addToCart,
      isQuantityValid,
    };
  },
};
</script>

<style scoped>
/* Same styles as provided earlier */
.product-list-container {
  padding: 20px;
  max-width: 1200px;
  margin: 0 auto;
}

.product-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
  gap: 20px;
}

.product-card {
  background-color: #fff;
  border: 1px solid #ddd;
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease;
}

.product-card:hover {
  transform: scale(1.05);
}

.product-image {
  width: 100%;
  height: 150px;
  object-fit: cover;
}

.product-details {
  padding: 15px;
}

.product-details h3 {
  margin: 0;
  font-size: 1.2em;
}

.product-details p {
  margin: 8px 0;
  color: #666;
}

.buy-button {
  background-color: #28a745;
  color: white;
  padding: 10px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 1em;
  width: 100%;
}

.buy-button:hover {
  background-color: #218838;
}

/* Responsive Styles */
@media screen and (max-width: 768px) {
  .product-grid {
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
  }

  .product-card {
    margin: 10px;
  }
}

@media screen and (max-width: 480px) {
  .product-grid {
    grid-template-columns: 1fr;
  }
}

</style>
