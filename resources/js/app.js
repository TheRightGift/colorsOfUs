/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Vuex from 'vuex';
import VueCompositionAPI from '@vue/composition-api';
import Toasted from 'vue-toasted';
import ElementUI from 'element-ui';
import VueMeta from 'vue-meta';
import 'element-ui/lib/theme-chalk/index.css';
import store from './store.js';
import Vue from 'vue';

window.Vue = require('vue').default;

window.Vuex = Vuex;

window.VueCompositionAPI = VueCompositionAPI;
window.Toasted = Toasted;
window.ElementUI = ElementUI;
window.VueMeta = VueMeta;


Vue.use(VueCompositionAPI)
Vue.use(Vuex);
Vue.use(Toasted);
Vue.use(ElementUI);
Vue.use(VueMeta, {
    keyName: 'head'
})
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('singleproduct-component', require('./components/General/Product.vue').default);
Vue.component('blogs-component', require('./components/General/Blogs.vue').default);
Vue.component('blog-component', require('./components/General/Blog.vue').default);
Vue.component('categories-component', require('./components/General/Categories.vue').default);
Vue.component('checkout-component', require('./components/General/Checkout.vue').default);

Vue.component('welcome-component', require('./components/General/Welcome.vue').default);
Vue.component('accountivate-component', require('./components/General/MailVerifier.vue').default);
Vue.component('auth-component', require('./components/General/Auth.vue').default);
Vue.component('dashboard-component', require('./components/General/Dashboard.vue').default);
Vue.component('cart-component', require('./components/General/Cart.vue').default);
Vue.component('collection-component', require('./components/General/Products.vue').default);
Vue.component('contact-component', require('./components/General/Contact.vue').default);
Vue.component('aboutus-component', require('./components/General/AboutUs.vue').default);


Vue.component('admin-component', require('./components/Admin/AdminComponent.vue').default);
Vue.component('product-component', require('./components/Admin/Product.vue').default);
Vue.component('order-component', require('./components/Admin/Order.vue').default);
Vue.component('customer-component', require('./components/Admin/Customer.vue').default);

Vue.component('profile-component', require('./components/Admin/Profile.vue').default);


Vue.component('promotions-component', require('./components/Super/Promotions.vue').default);
Vue.component('superadmin-component', require('./components/Super/SuperAdminComponent.vue').default);
Vue.component('adminview-component', require('./components/Super/AdminView.vue').default);

Vue.component('techadmin-component', require('./components/AdminTech/TechAdmin.vue').default);
Vue.component('message-component', require('./components/AdminTech/Message.vue').default);
Vue.component('color-component', require('./components/Admin/Color.vue').default);
Vue.component('size-component', require('./components/Admin/Size.vue').default);
Vue.component('blogpost-component', require('./components/Admin/BlogPost.vue').default);
Vue.component('category-component', require('./components/Admin/CategoryComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// export default new Vue({
//     store: new Vuex.Store(store),
//     render: h => h(Product),
// });
const app = new Vue({
    el: '#app',
    store: new Vuex.Store(store),
});
// export default app;
