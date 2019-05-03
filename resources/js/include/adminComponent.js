import Vue from 'vue'

// product components
Vue.component('product-page', require('@/components/backend/product/Product.vue').default);

// config components
Vue.component('setting-page', require('@/components/backend/config/Setting').default);
Vue.component('loan-purpose-page', require('@/components/backend/config/LoanPurpose').default);