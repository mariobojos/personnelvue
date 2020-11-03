require('./bootstrap');
// window.moment = require('moment');
window.Vue = require('vue');

import VueRouter from 'vue-router';
import { MdApp, MdButton, MdCard, MdContent, MdDatepicker, MdDrawer, MdField, MdIcon, MdList, MdMenu, MdSnackbar, MdToolbar }
  from 'vue-material/dist/components';
import 'vue-material/dist/vue-material.min.css'
import 'vue-material/dist/theme/default.css'

Vue.use(VueRouter);

Vue.use(MdApp);
Vue.use(MdButton);
Vue.use(MdCard);
Vue.use(MdContent);
Vue.use(MdDatepicker);
Vue.use(MdDrawer);
Vue.use(MdField);
Vue.use(MdIcon);
Vue.use(MdList);
Vue.use(MdMenu);
Vue.use(MdSnackbar);
Vue.use(MdToolbar);

import FormValidation from './components/FormValidation.vue';
import ExampleComponent from './components/ExampleComponent.vue';
import BaseLayout from './components/BaseLayout.vue';
import MainLayout from './components/MainLayout.vue';
import PersonnelForm from './components/personnel/PersonnelForm.vue';
import NotFound from './components/NotFound.vue';

// Vue.component('BaseLayout', require('./components/BaseLayout.vue').default);
// Vue.component('NotFound', require('./components/NotFound.vue'));
// Vue.component('example-component', require('./components/ExampleComponent.vue'));
// Vue.component('FormValidation', require('./components/FormValidation.vue'));

const router = new VueRouter({
    routes: [
        // { path: '/', component: ExampleComponent },
        // { path: '/', component: MainLayout },
        { path: '/', component: BaseLayout },
        { path: '/add', component: PersonnelForm },
        { path: '/example', component: FormValidation },
        { path: '*', component: NotFound },
    ],

    mode: 'history',

});

const app = new Vue({
    router,

    el: '#app',

    components: {
        FormValidation,
        ExampleComponent,
        BaseLayout,
        MainLayout,
        PersonnelForm,
        NotFound
    },

    data: {
        title: ''
    },

    methods: {

    }
}).$mount('#app');
