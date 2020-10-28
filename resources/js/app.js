require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
// import { MdButton, MdCard, MdField, MdMenu, MdList, MdSnackbar } from 'vue-material/dist/components';
// import 'vue-material/dist/vue-material.min.css'
// import 'vue-material/dist/theme/default.css'

Vue.use(VueRouter);

// Vue.use(MdButton);
// Vue.use(MdCard);
// Vue.use(MdField);
// Vue.use(MdList);
// Vue.use(MdMenu);
// Vue.use(MdSnackbar);

import ExampleComponent from './components/ExampleComponent.vue';
import MainLayout from './components/MainLayout.vue';
import NotFound from './components/NotFound.vue';

// Vue.component('BaseLayout', require('./components/BaseLayout.vue').default);
// Vue.component('NotFound', require('./components/NotFound.vue'));
// Vue.component('example-component', require('./components/ExampleComponent.vue'));
// Vue.component('FormValidation', require('./components/FormValidation.vue'));

const router = new VueRouter({
    routes: [
        { path: '/', component: ExampleComponent },
        { path: '/main', component: MainLayout },
        { path: '*', component: NotFound },
    ],

    mode: 'history',

});

const app = new Vue({
    el: '#app',

    components: {
        ExampleComponent,
        MainLayout,
        NotFound
    },

    data: {
        title: ''
    },

    methods: {

    }
}).$mount('#app');
