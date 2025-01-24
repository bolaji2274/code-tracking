// src/store/index.js
import { createStore } from 'vuex';

const store = createStore({
  state: {
    products: [], 
  },
  mutations: {
    setProducts(state, products) {
      state.products = products;
    },
  },
  actions: {
    addToCart({ commit }, product) {
      console.log('Adding to cart:', product); 
    },
  },
  getters: {
    selectProducts(state) {
      return state.products;
    },
  },
});

export default store;
